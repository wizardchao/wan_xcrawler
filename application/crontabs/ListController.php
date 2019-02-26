<?php
require 'vendor/autoload.php';

use XCrawler\XCrawler;
use Symfony\Component\DomCrawler\Crawler;

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
        // print_r($arr);exit;
        // $tr_selector = 'body > .main >  div:nth-child(1) > div:nth-child(2) > ul > li';
        $crawler->filter($tr_selector)->each(function (Crawler $node, $i) use (&$list) {
            $name = dom_filter($node, 'dl > dt > a:nth-child(1)', 'html');
            $subtitle=dom_filter($node, 'dl >dd > p', 'html');

            if (empty($name)) {
                return;
            }
            $url = dom_filter($node, 'dl > a:nth-child(3) > img', 'attr','src');
            $curTime=dom_filter($node, '.meta-data > ul > li:nth-child(1)', 'html');
            print_r($curTime);exit;
            // $url = dom_filter($node, 'a:nth-child(3)', 'attr', 'src');
            $data = [
                'name' => $name,
                'url' => $url,
                'subtitle' => $subtitle,
                'time' => dom_filter($node, '.inddline font', 'html'),
            ];
            // 把影片url、name推送到redis队列，以便进一步爬取影片下载链接
            // redis()->lpush('cnbeta:detail_queue', json_encode($data));
            $list[] = $data;
            var_dump($list);
            exit;
        });
    }
]);


$xcrawler->run();


$xcrawler = new XCrawler([
    'name' => 'dytt8:detail',
    'concurrency' => 3,
    'requests' => function() {
        while ($data = redis()->rpop('dytt8:detail_queue')) {
            $data = json_decode($data, true);
            $request = [
                'uri' => $data['url'],
                'callback_data' => $data,
            ];
            yield $request;
        }
    },
    'success' => function($result, $request, $xcrawler) {
        $result = iconv('GBK', 'UTF-8', $result);
        $crawler = new Crawler();
        $crawler->addHtmlContent($result);

        $data = $request['callback_data'];
        $crawler->filter('td[style="WORD-WRAP: break-word"] a')->each(function (Crawler $node, $i) use (&$data) {
            $data['download_links'][] = $node->attr('href');
        });
        var_dump($data);
    }
]);
$xcrawler->run();
