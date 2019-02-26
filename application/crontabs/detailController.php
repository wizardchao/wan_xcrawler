<?php
require 'vendor/autoload.php';

use XCrawler\XCrawler;
use Symfony\Component\DomCrawler\Crawler;

$xcrawler = new XCrawler([
    'name' => 'cnbeta:detail',
    'concurrency' => 3,
    'requests' => function() {
        // while ($data = redis()->rpop('dytt8:detail_queue')) {
            // $data = json_decode($data, true);
            // $data = json_decode($data, true);
            $data=array(
              'url' => 'https://hot.cnbeta.com/articles/comic/820893',
            );
            $request = [
                'uri' => $data['url'],
                'callback_data' => $data,
            ];
            yield $request;
        // }
    },
    'success' => function($result, $request, $xcrawler) {
        // $result = iconv('GBK', 'UTF-8', $result);
        $crawler = new Crawler();
        $crawler->addHtmlContent($result);

        $data = $request['callback_data'];
        $crawler->filter('body > .main-wrap > .cnbeta-article-wrapper > .cnbeta-update > .w1200 > .cnbeta-article')->each(function (Crawler $node, $i) use (&$data) {
              $subtitle=dom_filter($node, '.cnbeta-article-body > .article-content', 'html');
              $re=dom_filter($node,'.cnbeta-article-body > .article-content','html');
              print_r($re);exit;
        });
        var_dump($data);
    }
]);
$xcrawler->run();
