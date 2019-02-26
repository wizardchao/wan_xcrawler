<?php

/**
 * Class IndexController
 * @author Chris_Chiang
 */
require APPLICATION_PATH . '/modules/www/controllers/BaseController.php';
class IndexController extends BaseController
{

    public $menu;
    public $about;
    public $news;

    public function init()
    {
        parent::init();
        $this->menu=new FrontMenuService();
        $this->about=new AboutService();
        $this->news=new NewsService();


    }


    public function indexAction()
    {
       $res=$this->about->getAboutByName('如火如荼');
       print_r($res);
        // $this->view->assign($data);
        // $this->render('index');
    }


    /**
     * 通过get请求中cate_name或是about_id字段的值来获取cate中about的list信息
     * @return mixed
     */
    public function about_listsAction(){
        $req = $this->getRequest();
        if($req->isGet()){
            $cate_name = $req->getParam('cate_name');
            $cate_id=$req->getParam('cate_id');
            if(!empty($cate_name)){
                $res=$this->about->getAboutByCateName($cate_name);
            }
            if(!empty($cate_id)){
                $res=$this->about->getAboutByCateId($cate_id);
            }



            //方法暂时未完成，这里需要渲染前端模板,
            if($res){
                print_r($res);exit;
            }
        }

    }


    /**
     * 通过get中about字段值获取about_name或者about_id的详情，通过name获取
     * @return mixed
     */
    public function about_detailAction(){

        $req = $this->getRequest();
        if($req->isGet()){
            $about_name = $req->getParam('about_name');
            $about_id = $req->getParam('about_id');
            //需要增加通过id取about逻辑
            if(!empty($about_name)){
                $res =$this->about->getAboutByName($about_name);
            }
            if(!empty($about_id)){
                $res =$this->about->getAboutById($about_id);
            }
            //如果type值==2,跳转外部链接
            if($res['type']==2){
                return $this->redirect($res['link']);
            }


            //未完成，需要渲染前端模板
            if($res['type']==1){
                return $res;
            }
        }
    }


    /**
     * 获取新闻列表
     * @return mixed
     */
    public function news_listsAction(){
        $req = $this->getRequest();
        if($req->isGet()){
            $cate_name = $req->getParam('cate_name');
            $cate_id=$req->getParam('cate_id');
            //预留通过id取字段的逻辑
            if(!empty($cate_name)){
                $res=$this->news->getNewsListsByCateName($cate_name);
            }
            if(!empty($cate_name)){
                $res=$this->news->getNewsListsByCateId($cate_id);
            }

            //方法暂时未完成，这里需要渲染前端模板,
            if($res){
                return $res;
            }
        }

    }


    /**
     * 通过get中的字段news_name获取新闻详情
     * @return mixed
     */
    public function news_detailAction(){

        $req = $this->getRequest();
        if($req->isGet()){
            $news_name = $req->getParam('news_name');
            $news_id=$req->getParam('news_id');
            //需要增加通过id取about逻辑
            if(!empty($news_name)){
             $res =$this->news->getNewsInfoByname($news_name);
            }
            if(!empty($news_id)){
               $res =$this->news->getNewsInfoById($news_id);
            }

            //未完成，需要渲染前端模板
            if($res){
                return $res;
            }
        }
    }

}