<?php
/**
 * Created by PhpStorm.
 * User: Chris_Chiang
 * Date: 2018/7/30
 * Time: 10:36
 */

/**
 * Class BrochureService
 * 异步Http请求方法，主要用于非阻塞请求
 */
class AsynHttpService{
    private $sp = "\r\n"; //这里必须要写成双引号
    private $protocol = 'HTTP/1.1';
    private $requestLine = "";
    private $requestHeader = "";
    private $asyn = "";
    private $requestInfo = "";
    private $fp = null;
    private $urlinfo = null;
    private $header = array();
    private $body = "";
    private $responseInfo = "";
    private static $http = null; //Http对象单例

    private function __construct() {}

    public static function create() {
        if ( self::$http === null ) {
            self::$http = new AsynHttpService();
        }
        return self::$http;
    }

    public function init($url,$asyn=true) {
        $this->parseurl($url);
        $this->header['Host'] = $this->urlinfo['host'];
        $this->asyn=$asyn;
        return $this;
    }

    public function get($header = array()) {
        $this->header = array_merge($this->header, $header);
        return $this->request('GET');
    }

    public function post($header = array(), $body = array()) {
        $this->header = array_merge($this->header, $header);
        if ( !empty($body) ) {
            $this->body = http_build_query($body);
            $this->header['Content-Type'] = 'application/x-www-form-urlencoded';
            $this->header['Content-Length'] = strlen($this->body);
        }
        return $this->request('POST');
    }

    private function request($method) {
        $header = "";
        $this->requestLine = $method.' '.$this->urlinfo['path'].'?'.$this->urlinfo['query'].' '.$this->protocol;
        foreach ( $this->header as $key => $value ) {
            $header .= $header == "" ? $key.':'.$value : $this->sp.$key.':'.$value;
        }
        $this->requestHeader = $header.$this->sp.$this->sp;
        $this->requestInfo = $this->requestLine.$this->sp.$this->requestHeader;
        if ( $this->body != "" ) {
            $this->requestInfo .= $this->body;
        }
        /*
         * 注意：这里的fsockopen中的url参数形式为"www.xxx.com"
         * 不能够带"http://"这种
         */
        $port = isset($this->urlinfo['port']) ? isset($this->urlinfo['port']) : '80';
        $this->fp = fsockopen($this->urlinfo['host'], $port, $errno, $errstr);
        if ( !$this->fp ) {
            echo $errstr.'('.$errno.')';
            return false;
        }
        if ( fwrite($this->fp, $this->requestInfo) ) {
            if(!($this->asyn)){
                $str = "";
                while ( !feof($this->fp) ) {
                    $str .= fread($this->fp, 1024);
                }
                $this->responseInfo = $str;
            }
        }
        fclose($this->fp);
        return $this->responseInfo;
    }

    private function parseurl($url) {
        $this->urlinfo = parse_url($url);
    }
}
// $url = "http://news.163.com/14/1102/01/AA0PFA7Q00014AED.html";
//$url = "http://localhost/httppro/post.php";
//$http = Http::create()->init($url);
/* 发送get请求
echo $http->get(array(
  'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36',
));
*/

/* 发送post请求 */
//echo $http->post(array(
//    'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36',
//), array('username'=>'发一个中文', 'age'=>22));



