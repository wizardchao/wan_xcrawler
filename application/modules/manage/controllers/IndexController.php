<?php
require APPLICATION_PATH.'/modules/manage/controllers/CommonController.php';

class IndexController extends CommonController
{


    public function init()
    {
        parent::init();

        $this->manageService = new ManageService();
    }


    public function loginAction()
    {
       $res= $this->manageService->loginCheck();
        if(!$res){
            $this->render('login');
        }else{
            header('Location:/');
        }

    }


    /*
    * 检验登录
    */
    public function logincheckAction()
    {
        $req = $this->getRequest();
        $username = $req->getParam('login_username');
        $password = $req->getParam('login_password');
        if( $req->isPost() ){
            $result = $this->manageService->loginAdmin($username, $password);

            switch($result){
                case 200:
                    header('Location: /');
                    break;

                case 501:
                    return $this->showWarning('该用户名不存在！');
                    break;

                case 502:
                    return $this->showWarning('该账户异常！');
                    break;

                case 503:
                    return $this->showWarning('密码错误！');
                    break;
            }
        }
    }


    /*
    * 退出
    */
    public function logoutAction()
    {
        $this->manageService->logout();
        header('Location: /');
    }



    protected static $bl1;
    protected $bl2;
    /*
     * 后台首页
     */
    public function indexAction()
    {
//        echo time();
//        $ret=(new EmailService)->asyn_send('4545',456464,'2501170033@qq.com');
//        print_r($ret);
//        echo time();
//        (new CaptchaService())->set();
//        $re=(new Captcha()) ->getCode();
//        echo($re);
        $this->render('index');


    }


    public function testAction()
    {

//        $res=(new CaptchaService())->get();
//        echo($res);

//        //$request=$this->getRequest();
//        $par=(new Qiniu())->upload('fdfd');
//
//        print_r($par);


    }


}