<?php
    /**
     * Created by PhpStorm.
     * User: Chaos
     * Date: 2018/6/15
     * Time: 16:17
     */

    class MessageController extends Star_Controller_Action
    {
        public function init()
        {
            $this->messageService    = new MessageService();
            $this->utilsHelper       = new UtilsHelper();
            $this->verifyCodeService = new VerifyCodeService();
        }


        /**发送验证码
         * @return type
         */
        public function message_codeAction()
        {
            $request = $this->getRequest();
            $mobile  = $request->getParam('mobile');

            if (empty($mobile)) {
                return $this->showJson(110, "手机号不能为空！");
            }
            //判断号码格式是否正确
            if (!preg_match("/^1[345678]{1}\d{9}$/", $mobile)) {
                return $this->showJson(111, "手机号格式有误");
            }

            //获取随机数作为验证码
            $rand_num = $this->utilsHelper->get_rand_number(1, 9, 6);
            //            $rand_num = 123456;

            //短信接口
            $mess_status = $this->messageService->send_code($mobile, $rand_num);
            if ($mess_status['status'] != 'OK') {
                return $this->showJson(202, "短信验证码未能成功发送，请稍后再试！");
            }
            $status      = 1;
            $re = $this->verifyCodeService->setUserVerifyCode($mobile, $rand_num, $status);

            if ($re) {
                //测试环境
                $data = array(
                    'code' => (int)$rand_num,
                );
                $data = array();
                return $this->showJson(200, $data);
            }
            return $this->showJson(201, "短信验证码未能成功发送，请稍后再试！");
        }

    }