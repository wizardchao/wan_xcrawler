<?php
    /**
     * Created by PhpStorm.
     * User: Chaos
     * Date: 2018/6/4
     * Time: 16:42
     */

    require APPLICATION_PATH . '/modules/manage/controllers/CommonController.php';

    class AboutController extends CommonController
    {
        protected $page_size;

        public function init()
        {
            parent::init();
            $this->page_size    = 20;
            $this->aboutService = new AboutService();
        }


        /**
         * 相关栏目列表
         */
        public function about_listAction()
        {
            $request           = $this->getRequest();
            $page              = (int)$request->getParam('page');
            $about_category_id = $request->getParam('about_category_id');
            $about_category_title=$request->getParam('about_category_title');

            $param        = array(
                'about_category_id' => $about_category_id,
                'about_category_title' => $about_category_title,
            );
            $aboutService = new AboutService();
            $about_info   = $aboutService->getAboutInfoByPage($page, $this->page_size, $param);
            $about_list   = $about_info['list'];

            $about_cate_info = $aboutService->getCateAll();
            foreach ($about_list as &$list) {
                $result             = $aboutService->getAboutCateInfoById($list['about_category_id']);
                $list['cate_title'] = $result['about_category_title'];
                unset($result);
            }

            $page_info = $about_info['page'];

            $this->view->assign(
                array(
                    'cate_list' => $about_cate_info,
                    'param' => $param,
                    'about_list' => $about_list,
                    'page' => $page_info,
                ));
            $this->render('list');
        }


        /**
         *添加相关栏目
         */
        public function about_addAction()
        {
            $aboutService = new AboutService();
            $request      = $this->getRequest();
            if ($request->isPost()) {
                $about_category_id = Star_String::escape($request->getParam('about_category_id'));
                $about_title       = Star_String::escape($request->getParam('about_title'));
                $about_content     = Star_String::escape($request->getParam('content'));
                $page_keywords     = Star_String::escape($request->getParam('page_keywords'));
                $page_description  = Star_String::escape($request->getParam('page_description'));
                $sort_id          = Star_String::escape($request->getParam('sort_id'));
                $link_type         = (int)$request->getParam('type');
                $link              = $request->getParam('link');
                if (empty($about_title)) {
                    return $this->showWarning('栏目标题不能为空。');
                }

                if (!in_array($link_type, array( 1, 2 ))) {
                    return $this->showWarning('链接类型不符合条件。');
                }
                $param = array(
                    'about_category_id' => $about_category_id,
                    'about_title' => $about_title,
                    'about_content' => $about_content,
                    'page_keywords' => $page_keywords,
                    'page_description' => $page_description,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'type' => $link_type,
                    'link' => ($link_type == 2) ? $link : '',
                    'time_create' => time(),
                    'time_update' => time(),
                );

                $about_info = $aboutService->insertAbout($param);
                if ($about_info) {
                    return $this->showMessage('恭喜您，添加栏目成功。', '/manage/about/about_list');
                } else {
                    return $this->showWarning('对不起，添加栏目失败。');
                }
            }
            $about_cate_info = $aboutService->getCateAll();
            $param           = array(
                'type' => 1,
            );
            $this->view->assign(
                array(
                    'cate_list' => $about_cate_info,
                    'param' => $param,
                ));
            $this->render('info');
        }


        /**
         * 编辑相关栏目
         */
        public function about_editAction()
        {
            $aboutService = new AboutService();
            $request      = $this->getRequest();
            $about_id     = (int)$request->getParam('about_id');
            if ($request->isPost()) {
                $about_category_id = Star_String::escape($request->getParam('about_category_id'));
                $about_title       = Star_String::escape($request->getParam('about_title'));
                $about_content     = Star_String::escape($request->getParam('content'));
                $page_keywords     = Star_String::escape($request->getParam('page_keywords'));
                $page_description  = Star_String::escape($request->getParam('page_description'));
                $sort_id          = Star_String::escape($request->getParam('sort_id'));
                $link_type         = (int)$request->getParam('type');
                $link              = $request->getParam('link');
                if (!in_array($link_type, array( 1, 2 ))) {
                    return $this->showWarning('链接类型不符合条件。');
                }
                $param = array(
                    'about_category_id' => $about_category_id,
                    'about_title' => $about_title,
                    'about_content' => $about_content,
                    'page_keywords' => $page_keywords,
                    'page_description' => $page_description,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'type' => $link_type,
                    'link' => ($link_type == 2) ? $link : '',
                    'time_update' => time(),
                );
                $arr   = array(
                    'about_id' => $about_id,
                );

                $about_update_info = $aboutService->updateAbout($arr, $param);
                if (isset($about_update_info) && is_numeric($about_update_info)) {
                    return $this->showMessage('恭喜您,修改栏目成功。', '/manage/about/about_list');
                } else {
                    return $this->showWarning('对不起，修改栏目失败。');
                }
            }

            $about_cate_info = $aboutService->getCateAll();
            $about_info      = $aboutService->getAboutById($about_id);
            $this->view->assign(
                array(
                    'cate_list' => $about_cate_info,
                    'param' => $about_info,
                ));
            $this->render('info');
        }


        /**
         * 删除相关栏目
         */
        public function about_delAction()
        {
            $request    = $this->getRequest();

            $about_id          = (int)$request->getParam('about_id');
            $aboutService      = new AboutService();
            $arr               = array(
                'about_id' => $about_id,
            );
            $about_update_info = $aboutService->delAbout($arr);
            if ($about_update_info) {
                return $this->showMessage('恭喜您，删除成功。', '/manage/about/about_list');
            } else {
                return $this->showWarning('很遗憾，删除失败。', '/manage/about/about_list');
            }
        }


        /**
         * 相关栏目分类列表
         */
        public function cate_listAction()
        {
            $request = $this->getRequest();
            $page = (int)$request->getParam('page');
            $about_category_id = $request->getParam('about_category_id');
            $about_category_title=$request->getParam('about_category_title');

            $param        = array(
                'about_category_id' => $about_category_id,
                'about_category_title' => $about_category_title,
            );
            $page_size = 20; //每页显示数

            $aboutService = new AboutService();
            $about_info = $aboutService->getAboutCateInfoByPage($page, $page_size, $param);
            $cate_list = $about_info['list'];

            $page_info = $about_info['page'];
            $this->view->assign(
                array(
                    'param' => $param,
                    'cate_list' => $cate_list,
                    'page' => $page_info,
                ));

            $this->render('cate_list');
        }


        /**
         * 添加相关栏目分类
         */
        public function cate_addAction()
        {
            $request = $this->getRequest();
            if ($request->isPost()) {
                $about_cate_title = Star_String::escape($request->getParam('about_category_title'));
                $sort_id = Star_String::escape($request->getParam('sort_id'));
                $param = array(
                    'about_category_title' => $about_cate_title,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'time_create' => time(),
                    'time_update' => time(),
                );
                $aboutService = new AboutService();
                $about_info = $aboutService->insertAboutCate($param);
                if ($about_info) {
                    return $this->showMessage('恭喜您，添加栏目成功。', '/manage/about/cate_list');
                } else {
                    return $this->showWarning('对不起，添加栏目失败。');
                }
            }
            $this->view->assign(
                array(
                    'param' => array(),
                ));
            $this->render('cate_info');
        }


        /**
         * 编辑相关栏目分类
         */
        public function cate_editAction()
        {
            $aboutService = new AboutService();
            $request = $this->getRequest();
            $about_cate_id = (int)$request->getParam('about_category_id');
            if ($request->isPost()) {
                $about_title = Star_String::escape($request->getParam('about_category_title'));
                $sort_id = Star_String::escape($request->getParam('sort_id'));
                $param = array(
                    'about_category_title' => $about_title,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'time_update' => time(),
                );
                $arr = array(
                    'about_category_id' => $about_cate_id,
                );

                $about_update_info = $aboutService->updateAboutCate($arr, $param);
                if (isset($about_update_info) && is_numeric($about_update_info)) {
                    return $this->showMessage('恭喜您,修改栏目分类成功。', '/manage/about/cate_list');
                } else {
                    return $this->showWarning('对不起，修改栏目分类失败。');
                }
            }

            $about_info = $aboutService->getAboutCateInfoById($about_cate_id);
            $this->view->assign(
                array(
                    'param' => $about_info,
                ));
            $this->render('cate_info');
        }


        /**
         * 删除相关栏目分类
         */
        public function cate_delAction()
        {
            $request = $this->getRequest();
            $about_cate_id = (int)$request->getParam('about_category_id');
            $aboutService = new AboutService();
            $arr = array(
                'about_category_id' => $about_cate_id,
            );
            $about_update_info = $aboutService->delAboutCate($arr);
            if ($about_update_info) {
                return $this->showMessage('恭喜您，删除成功。', '/manage/about/cate_list');
            } else {
                return $this->showWarning('很遗憾，删除失败。', '/manage/about/about_cate');
            }
        }


        public function about_sec_listAction(){
            $aboutService = new AboutService();
            $request      = $this->getRequest();
            if ($request->isPost()) {
                $about_category_id = Star_String::escape($request->getParam('about_category_id'));
                $about_title       = Star_String::escape($request->getParam('about_title'));
                $about_content     = Star_String::escape($request->getParam('content'));
                $page_keywords     = Star_String::escape($request->getParam('page_keywords'));
                $page_description  = Star_String::escape($request->getParam('page_description'));
                $sort_id          = Star_String::escape($request->getParam('sort_id'));
                $link_type         = (int)$request->getParam('type');
                $link              = $request->getParam('link');
                if (empty($about_title)) {
                    return $this->showWarning('栏目标题不能为空。');
                }

                if (!in_array($link_type, array( 1, 2 ))) {
                    return $this->showWarning('链接类型不符合条件。');
                }
                $param = array(
                    'about_category_id' => $about_category_id,
                    'about_title' => $about_title,
                    'about_content' => $about_content,
                    'page_keywords' => $page_keywords,
                    'page_description' => $page_description,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'type' => $link_type,
                    'link' => ($link_type == 2) ? $link : '',
                    'time_create' => time(),
                    'time_update' => time(),
                );

                $about_info = $aboutService->insertAbout($param);
                if ($about_info) {
                    return $this->showMessage('恭喜您，添加栏目成功。', '/manage/about/about_list');
                } else {
                    return $this->showWarning('对不起，添加栏目失败。');
                }
            }
            $about_cate_info = $aboutService->getCateAll();
            $param           = array(
                'type' => 1,
            );
            $this->view->assign(
                array(
                    'cate_list' => $about_cate_info,
                    'param' => $param,
                ));
            $this->render('info');
        }


        public function about_first_addAction(){
            $aboutService = new AboutService();
            $request      = $this->getRequest();
            if ($request->isPost()) {
                $about_category_id = Star_String::escape($request->getParam('about_category_id'));
                $about_title       = Star_String::escape($request->getParam('about_title'));
                $about_content     = Star_String::escape($request->getParam('content'));
                $page_keywords     = Star_String::escape($request->getParam('page_keywords'));
                $page_description  = Star_String::escape($request->getParam('page_description'));
                $sort_id          = Star_String::escape($request->getParam('sort_id'));
                $link_type         = (int)$request->getParam('type');
                $link              = $request->getParam('link');
                if (empty($about_title)) {
                    return $this->showWarning('栏目标题不能为空。');
                }

                if (!in_array($link_type, array( 1, 2 ))) {
                    return $this->showWarning('链接类型不符合条件。');
                }
                $param = array(
                    'about_category_id' => $about_category_id,
                    'about_title' => $about_title,
                    'about_content' => $about_content,
                    'page_keywords' => $page_keywords,
                    'page_description' => $page_description,
                    'sort_id' => ($sort_id) ? $sort_id : 255,
                    'type' => $link_type,
                    'link' => ($link_type == 2) ? $link : '',
                    'time_create' => time(),
                    'time_update' => time(),
                );

                $about_info = $aboutService->insertAbout($param);
                if ($about_info) {
                    return $this->showMessage('恭喜您，添加栏目成功。', '/manage/about/about_list');
                } else {
                    return $this->showWarning('对不起，添加栏目失败。');
                }
            }
            $about_cate_info = $aboutService->getCateAll();
            $param           = array(
                'type' => 1,
            );
            $this->view->assign(
                array(
                    'cate_list' => $about_cate_info,
                    'param' => $param,
                ));
            $this->render('info');
        }
    }