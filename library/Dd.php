<?php

class Dd
{
    public function download($url, $header=array(), $path = __DIR__.'/../file/cnbeta/')
    {
        if (!is_dir($path)) {
            mkdir($path, 0777,true);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        //  $header = [
        //     "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
        //     "Accept-Encoding: gzip, deflate",
        //     "Accept-Language: zh-CN,zh;q=0.9",
        //     "Cache-Control:no-cache",
        //     "Connection:keep-alive",
        //     //            "Cookie:UM_distinctid=1615a0d9fd2166-06355844e9b39b-1571466f-1fa400-1615a0d9fd316c; CNZZDATA1255487232=1958726030-1517653567-%7C1517653567; CNZZDATA1255357127=605834772-1517631364-https%253A%252F%252Fwww.baidu.com%252F%7C1517671118; Hm_lvt_1e2b00875d672f10b4eee3965366013f=1517634298; Hm_lpvt_1e2b00875d672f10b4eee3965366013f=1517672911",
        //    // "Cookie: Hm_lvt_dbc355aef238b6c32b43eacbbf161c3c=1542114088; Hm_lpvt_dbc355aef238b6c32b43eacbbf161c3c=1542116605",
        //    // "Cookie: Hm_lvt_dbc355aef238b6c32b43eacbbf161c3c=1551677878; Hm_lpvt_dbc355aef238b6c32b43eacbbf161c3c=1551677940",
        //     "Host: i.meizitu.net",
        //     "Referer: https://www.cnbeta.com/category/comic.htm",
        //     "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36",
        // ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $file = curl_exec($ch);
        curl_close($ch);
        $filename = pathinfo($url, PATHINFO_BASENAME);
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
        return $filename;
    }


    public function getTime($str){
      $arr=explode('|',$str);
      return preg_replace('/[\x{4e00}-\x{9fa5}]+/u','',$arr[0]);
    }


    public function dealImgArr($imgArr){
      if(!is_array($imgArr)){
        $imgArr=[$imgArr];
      }
      foreach($imgArr as $el){
        $img=parse_url($el);
        $path=__DIR__.'/../file/cnbeta_detail'.substr($img['path'],0,strripos($img['path'], '/')).'/';
        $this->download($el,array(),$path);
      }
    }
}
