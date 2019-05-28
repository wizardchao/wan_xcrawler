<?php

use XCrawler\XCrawler;
use Symfony\Component\DomCrawler\Crawler;

class IndexController extends Star_Controller_Action
{
    protected $funName;  //缓存key

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->funName = 'fun:name';
    }


    /**
     * 入口程序
     */
    public function indexAction()
    {
        $xcrawler = new XCrawler([
            'name' => 'fun:index',
            'requests' => function () {
                $request = [
                    'method' => 'get',
                    'uri' => 'http://www.nows.fun',
                ];
                yield $request;
            },
            'success' => function ($result, $request, $xcrawler) {
                $crawler = new Crawler();
                $crawler->addHtmlContent($result);

                // 通过css选择器选取毒鸡汤
                $tr_selector = 'html > body > .main-wrapper > .container > span';
                $arr = $crawler->filter($tr_selector)->html();
                redis()->lpush($this->funName, $arr);
            }
        ]);
        $xcrawler->run();
        exit;
    }


    /**
     * 保存毒鸡汤
     */
    public function save_wordAction()
    {
        $wordModel = new WordModel();
        $tm_create = $tm_update = time();
        while ($el = redis()->rpop($this->funName)) {
            $el_param = array(
                'title' => trim($el),
                'tm_create' => $tm_create,
                'tm_update' => $tm_update,
            );
            $re = $wordModel->insert($el_param);
            if ($re) {
                continue;
            } else {
                break;
            }
        }

        $list = redis()->lrange($this->funName, 0, -1);
        if (empty($list)) {
            return $this->showJson(200);
        }
        return $this->showJson(201, '保存失败！');
    }
}