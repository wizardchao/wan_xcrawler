<?php
    /**
     * Created by PhpStorm.
     * User: Chaos
     * Date: 2018/6/25
     * Time: 17:51
     */

    class AboutController extends Star_Controller_Action
    {
        public function init()
        {
            $this->aboutService = new AboutService();
        }


        /**
         * 栏目详情
         */
        public function about_detailAction()
        {
            $request  = $this->getRequest();
            $about_id = (int)$request->getParam('id');
            if (empty($about_id)) {
                return $this->showJson(201, '编号不能为空！');
            }

            $about_info = $this->aboutService->getAboutInfoById($about_id);
            if (empty($about_info)) {
                return $this->showJson(202, '栏目信息为空！');
            }

            $data = array(
                'id' => $about_id,
                'title' => $about_info['about_title'],
                'content' => htmlspecialchars_decode($about_info['about_content']),
                'keywords' => $about_info['page_keywords'],
                'desc' => $about_info['page_description'],
            );

            return $this->showJson(200, $data);
        }
    }