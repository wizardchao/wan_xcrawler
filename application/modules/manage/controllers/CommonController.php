<?php

    class CommonController extends Star_Controller_Action
    {


        public function init()
        {
            $session_key     = 'session_id';
            $session_content = Star_Cookie::get($session_key);
            if (empty($session_content)) {
                session_start();
                $session_content = session_id();
                Star_Cookie::set($session_key, $session_content);
            }
            unset($session_key);
            unset($session_content);

            $this->manageService = new ManageService();

            // 校验登录态
            $this->loginCheck();
            // Set common config
            $this->setCommon();


        }


        /*
        * 校验登录态
        */
        protected function loginCheck()
        {
            $result     = $this->manageService->loginCheck();
            $module     = $this->request->getModuleName();
            $controller = $this->request->getControllerName();
            $action     = $this->request->getActionName();

            if ($module == 'manage' && $controller == 'index' && ($action == 'login' || $action == 'logincheck' || $action == 'logout')) {
                return;
            } else {
                if (empty($result)) {
                    header('Location: /manage/index/login');
                }
            }

            //设置菜单
            $this->setMenu($module, $controller, $action);
        }


        /**
         * 设置菜单
         */
        public function setMenu($module, $controller, $action)
        {
            $controller_info = $this->manageService->getAdminInfoByController($controller, $action);
            $info_arr        = explode(",", $controller_info['menu_relation']);
            array_pop($info_arr);
            $clist = array();
            if (count($info_arr)) {
                foreach ($info_arr as $el) {
                    $el_info = $this->manageService->getMenuInfoById($el);
                    $clist[] = array(
                        'menu_name' => $el_info['menu_name'],
                        'link' => ($el_info['controller']) ? "/" . $this->request->getModuleName() . "/" . $el_info['controller'] . "/" . $el_info['action'] : "javascript:;",
                    );
                }
            }

            $this->view->assign(array(
                'clist' => $clist,
            ));

        }


        /*
         * Set common config
         */
        protected function setCommon()
        {
            $getAllList      = $this->manageService->getMenuByList(); // Navigation list

            foreach($getAllList as &$item){
                foreach ($item['child'] as &$child){
                    if(empty($child['controller']) || empty($child['action'])){
                        $info=$this->manageService->getMenuChild($child['id']);
                        $child['controller']=$info['controller'];
                        $child['action']=$info['action'];
                    }
                }
            }
            $module          = $this->request->getModuleName();
            $controller      = $this->request->getControllerName();
            $action         = $this->request->getActionName();
            $controller_info = $this->manageService->getAdminInfoByController($controller, $action);
            $cur_url         = '/' . $module . '/' . $controller . '/' . $action . '/';

            if ($controller_info['menu_level'] <= 2) {
                $cur = '/' . $module . '/' . $controller . '/' . $action . '/'; // Current location path

            } else {
                $relation_arr = explode(",", $controller_info['menu_relation']);
                $pid          = $relation_arr[1];
                unset($relation_arr);
                $info = $this->manageService->getMenuInfoById($pid);
                if($info['controller'] && $info['action']){
                    $cur  = '/' . $module . '/' . $info['controller'] . '/' . $info['action'] . '/'; // Current location path
                }else{
                    $cur  = '/' . $module . '/' . $controller . '/' . $action . '/'; // Current location path
                }
            }

            $param = array(
                'menu' => $getAllList,
                'menu_cur' => $cur,
                'module' => $module,
            );


            if ($controller_info['menu_level'] >= 2) {
                $secong_menu_arr      = explode(",", ($controller_info['menu_relation']));
                $seond_id             = $secong_menu_arr[0];
                $param['menu_id']     = $secong_menu_arr[1];
                $param['p_menu_id']     = $secong_menu_arr[2];
                $second_menu_list     = $this->manageService->getSecondMenu($module, $seond_id);
                $param['second_menu'] = $second_menu_list['list'];
                $param['flag']        = $second_menu_list['flag'];
            }
            
            $param['cur_menu_id']=$controller_info['id'];
            $this->view->assign($param);
        }


    }
