<?php
    /**
     * Created by PhpStorm.
     * User: Chaos
     * Date: 2018/7/2
     * Time: 15:18
     */

    class PassportController extends Star_Controller_Action
    {
        public function init()
        {
            $this->messageService    = new MessageService();
            $this->utilsHelper       = new UtilsHelper();
            $this->verifyCodeService = new VerifyCodeService();
            $this->member_id         = 123;  //假数据
        }


        /**
         * 注册（身份验证）
         */
        public function verifyAction()
        {
            $request   = $this->getRequest();
            $mobile    = $request->getParam('mobile');
            $name      = $request->getParam('name');
            $code      = (int)$request->getParam('code');
            $member_id = $this->member_id;

            if (empty($mobile)) {
                return $this->showJson(111, "手机号不能为空");
            }


            if (empty($name)) {
                return $this->showJson(113, "联系人不能为空");
            }

            if (empty($code)) {
                return $this->showJson(114, "验证码不能为空");
            }

            //判断号码格式是否正确
            if (!preg_match("/^1[345678]{1}\d{9}$/", $mobile)) {
                return $this->showJson(121, "手机号格式有误");
            }

            if (empty($member_id)) {
                return $this->showJson(300, "你尚未登陆");
            }

            $member_info = $this->memberService->getMemberInfo($member_id);
            if (empty($member_info)) {
                return $this->showJson(300, '您尚未登录！');
            }

            if ($member_info['mobile']) {
                return $this->showJson(301, '您已认证成功！');
            }

            if (!preg_match("/^1[345678]{1}\d{9}$/", $mobile)) {
                return $this->showJson(111, "手机号格式有误");
            }

            if (!$this->verifyCodeService->checkVerifyCode($mobile, $code)) {
                return $this->showJson(115, "验证码错误！");
            }

            //判断手机号码唯一性
            $ck_mobile_info = $this->memberService->ck_mobile($mobile);
            if ($ck_mobile_info) {
                return $this->showJson(116, "手机号已重复！");
            }
            $param = array(
                'mobile' => $mobile,
                'username' => $name,
                'identify' => 2,
                'identify_time' => time(),
            );

            //            $re = $this->memberService->editMember($member_id, $param);
            if (isset($re)) {
                return $this->showJson(200);
            }
        }

    }