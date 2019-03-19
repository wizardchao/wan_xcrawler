<?php

use XCrawler\XCrawler;
use Symfony\Component\DomCrawler\Crawler;

class CrontabController extends Star_Controller_Action
{
    protected $header;
    protected $dd;
    protected $postService;
    private $queue_name;
    private $queue_db_name;
    public function init()
    {
        parent::init();
        $this->queue_name='cnbeta:comic:detail_queue';
        $this->queue_db_name='cnbeta:comic:detail_db_queue';
        $this->dd=new Dd();
        $this->postService=new PostService();
        $this->header = [
                   "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
                   "Accept-Encoding: gzip, deflate",
                   "Accept-Language: zh-CN,zh;q=0.9",
                   "Cache-Control:no-cache",
                   "Connection:keep-alive",
                   "Host: static.cnbetacdn.com",
                   "Referer: https://www.cnbeta.com/category/comic.htm",
                   "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36",
               ];
    }


    /**
     * 读取列表
     * @return [type] [description]
     */
    public function indexAction()
    {
        $xcrawler = new XCrawler([
              'name' => 'cnbeta:index',
              'requests' => function () {
                  $request = [
                    'method' => 'get',
                    'uri' => 'https://www.cnbeta.com/category/comic.htm',
                    'headers' => [
                        'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36',
                    ],
                ];
                  yield $request;
              },
              'success' => function ($result, $request, $xcrawler) {
                  // 把html的编码从gbk转为utf-8
                  // $result = iconv('GBK', 'UTF-8', $result);
                  $crawler = new Crawler();
                  $crawler->addHtmlContent($result);

                  $list = [];
                  // 通过css选择器遍历影片列表
                  $tr_selector = 'body > .main-wrap > .cnbeta-update > .w1200 > .cnbeta-update-list > .items-area > .item';
                  $arr=$crawler->filter($tr_selector);

                  // $tr_selector = 'body > .main >  div:nth-child(1) > div:nth-child(2) > ul > li';
                  $crawler->filter($tr_selector)->each(function (Crawler $node, $i) use (&$list) {
                      $name = dom_filter($node, 'dl > dt > a:nth-child(1)', 'html');
                      $detailUrl=dom_filter($node, 'dl > dt > a:nth-child(1)', 'attr', 'href');
                      $subtitle=dom_filter($node, 'dl >dd > p', 'html');

                      if (empty($name)) {
                          return;
                      }
                      $url = dom_filter($node, 'dl > a:nth-child(3) > img', 'attr', 'src');
                      $curTime=dom_filter($node, '.meta-data > ul > li:nth-child(1)', 'html');

                      // $url = dom_filter($node, 'a:nth-child(3)', 'attr', 'src');
                      $url=$this->dd->download($url, $this->header);
                      $curTime=$this->dd->getTime($curTime);
                      $data = [
                          'name' => $name,
                          'url' => $url,
                          'subtitle' => $subtitle,
                          'time' => $curTime,
                          'detailUrl' => $detailUrl,
                      ];
                      // 把影片url、name推送到redis队列，以便进一步爬取影片下载链接
                      redis()->lpush($this->queue_name, json_encode($data));
                      $list[] = $data;
                  });
                  var_dump($list);
              }
          ]);
        $xcrawler->run();
        exit;
        // print_r($xcrawler);exit;
    }


    /**
     * 遍历详情
     */
    public function detailAction()
    {
        $xcrawler = new XCrawler([
          'name' => 'cnbeta:detail',
          'concurrency' => 3,
          'requests' => function () {
              while ($data = redis()->rpop($this->queue_name)) {
                  $data = json_decode($data, true);
                  // $data = array(
                  //   'detailUrl' => '//hot.cnbeta.com/articles/comic/826533',
                  // );
                  $request = [
                      'uri' => $data['detailUrl'],
                      'callback_data' => $data,
                  ];
                  yield $request;
                  // break;
              }
          },
          'success' => function ($result, $request, $xcrawler) {
              // $result = iconv('GBK', 'UTF-8', $result);
              $crawler = new Crawler();
              $crawler->addHtmlContent($result);

              $data = $request['callback_data'];
              $crawler->filter('body > .main-wrap > .cnbeta-article-wrapper > .cnbeta-update > .w1200 > .cnbeta-article')->each(function (Crawler $node, $i) use (&$data) {
                  $subtitle=dom_filter($node, '.cnbeta-article-body > .article-content', 'html');
                  $re=dom_filter($node, '.cnbeta-article-body > .article-content', 'html');
                  $imgpreg = "/<img src=\"(.+?)\".*?>/";
                  preg_match_all($imgpreg, $re, $img);
                  $this->dd->dealImgArr($img[1]);
                  $res=str_replace('https://static.cnbetacdn.com', DOMAIN_IMG, $re);
                  $curTime=date('Y-m-d H:i:s',time());
                  $param=array(
                      'slug' => uniqid(),
                      'subtitle' => $data['subtitle'],
                      'title' => $data['name'],
                      'content_html' => $res,
                      'content_raw' => $data['subtitle'],
                      'page_image' => DOMAIN_FILE.'/'.$data['url'],
                      'is_draft' => 0,
                      'meta_description' => $data['name'],
                      'published_at' => $curTime,
                      'created_at' => $curTime,
                      'updated_at' => $curTime,
                    );
                  // print_r($param);
                  // exit;
                  redis()->lpush($this->queue_db_name, json_encode($param));
              });
              // var_dump($data);
              // exit;
          }
      ]);
        $xcrawler->run();
        exit;
    }


    public function save_dataAction(){
      while ($data = redis()->rpop($this->queue_db_name)) {
          $data = json_decode($data, true);
          $this->postService->insertPost($data);
      }
      if(empty($data)){
        echo json_encode(array(
          'status' => 200,
          'message' => 'success!',
        ));
      } else{
        echo json_encode(array(
          'status' => 201,
          'message' => 'Failed!',
        ));
      }
      exit;
    }
}
