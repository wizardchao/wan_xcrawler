<?php
require 'Star/Application/Bootstrap/Bootstrap.php';
class Entrance extends Star_Application_Bootstrap_Bootstrap
{

    // 初始化 view
    protected function _initView()
    {
        $image_server = Star_Config::get('resources.upload.serverName');
        $this->view->assign('upload_image_server', $image_server);
    }


    // 常量配置
    protected function _initConst()
    {
        require APPLICATION_PATH.'/configs/constants.php';
        require APPLICATION_PATH . '/configs/constants.php';

        $ip     = $_SERVER['SERVER_ADDR'];
        $ip_arr = array( '106.14.93.16' );
        if (in_array($ip, $ip_arr)) {
            require APPLICATION_PATH . '/configs/development.php';
        } else {
            if (Star_Config::get('resources.frontController.de') == 1) {
                require APPLICATION_PATH . '/configs/development.php';
            } else {
                require APPLICATION_PATH . '/configs/production.php';
            }
            unset($file);
        }
    }

    
}

