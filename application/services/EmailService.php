<?php
/**
 * Created by PhpStorm.
 * User: Chris_Chiang
 * Date: 2018/7/30
 * Time: 11:40
 */
class EmailService{


    /**
     *异步发送邮件服务，防止阻塞
     * @param $title
     * @param $content
     * @param $to
     * @return bool|string
     */
    public function asyn_send($title, $content,$to){
        $url = "http://localhost/email/send";
        $http =AsynHttpService::create()->init($url);
        $ret=$http->post(array(),array('title'=>$title,'content'=>$content,'to'=>$to));
        return $ret;
    }
}
