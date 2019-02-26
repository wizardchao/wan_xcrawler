<?php


    class NewsController extends Star_Controller_Action
    {

        private $VoteCommentService;
        private $newsService;
        public function init()
        {
            parent::init();
            $this->newsService = new NewsService();
            $this->VoteCommentService=new VoteCommentService();
        }


        /**
         * @return type
         * 新闻列表接口
         */
        public function news_listAction()
        {
            $request = $this->getRequest();
            $page = (int)$request->getParam('page');
            $page_size = 10; //每页显示数
            if ($request->isGet()) {

                $comms = $request->getParams();
                foreach ($comms as $key => &$value) {
                    $value = Star_String::escape($value);
                }
            }
            $news_info = $this->newsService->getNewsInfoByPage($page, $page_size, $comms);
            if ($news_info) {
                unset($news_info['page']);
                $news_info['page_size'] = $page_size;
                $news_info['page_total'] = count($news_info['list']);
                return $this->showJson(200, $news_info);
            } else {
                return $this->showJson(201, "请求信息错误");
            }

        }


        /**
         * @return type
         * 新闻详情
         */
        public function news_detailAction()
        {
            $request = $this->getRequest();
            if ($request->isGet()) {



                $ids = $request->getParams();
                foreach ($ids as $key => &$value) {
                    $value = Star_String::escape($value);
                }
            }
            if (!isset($ids['id']) || empty($ids['id'])) {
                return $this->showJson(201, "没有传入有效的ID");
            }
            $news_detail = $this->newsService->getNewsInfoById(intval($ids['id']));
            if ($news_detail) {
                $res = array(
                    'id' => $news_detail['news_id'],
                    'img' => $news_detail['img'],
                    'title' => $news_detail['news_title'],
                    'datetime' => $news_detail['time_create'],
                    'desc' => $news_detail['news_content']
                );
                return $this->showJson(200, $res);
            } else {
                return $this->showJson(201, "文章不存在，请尝试新的id");
            }


        }


        /**
         * @return type
         * 文章评论，回复评论接口
         * 如果传入cid，就是为评论回复，如果不传cid或者cid为0，就是为文章评论
         */
        public function news_commentAction(){
            $request = $this->getRequest();
            if ($request->isGet()) {

                $comms = $request->getParams();
                foreach ($comms as $key => &$value) {
                    $value = Star_String::escape($value);
                }

                if(!isset($comms['nid'])||!isset($comms['content'])){
                    return $this->showJson(202,'请求参数错误，请重新配置相应的参数');
                }
            }
           if(!isset($comms['cid'])||empty($comms['cid'])||$comms['cid']==0){
                $comment=array(
                   'reply_id'=>$comms['cid'],
                    'news_id'=>$comms['nid'],
                    'content'=>$comms['content']
                );
               $res=$this->VoteCommentService->addNewsComment($comment);
               if($res){
                   return $this->showJson(200,'','文章评论已经添加成功');
               }

           }else{
               $comment=array(
                   'reply_id'=>$comms['cid'],
                   'news_id'=>$comms['nid'],
                   'content'=>$comms['content']
               );
               $res=$this->VoteCommentService->addCommentReply($comment);
               if($res){
                   return $this->showJson(200,'','评论回复已经添加成功');
               }
           }

        }


        /**
         * @return type
         * 点赞接口，如果传入cid，就是为评论点赞，如果不传cid或者cid为0，就是为文章点赞
         */
        public function news_zanAction(){
            $request = $this->getRequest();
            if ($request->isGet()) {

                    $comms = $request->getParams();
                    foreach ($comms as $key => &$value) {
                        $value = Star_String::escape($value);
                    }

                    if(!isset($comms['nid'])){
                        return $this->showJson(202,'请求参数错误，请重新配置相应的参数');
                    }


                if(!isset($comms['cid'])||$comms['cid']==0||empty($comms['cid'])){
                    $comment=array(
                        'comment_id'=>(intval($comms['cid']))?:0,
                        'news_id'=>intval($comms['nid']),

                    );
                    $res=$this->VoteCommentService->addVote($comment);
                    if($res){
                        return $this->showJson(200,'','文章点赞成功');
                    }

                }else{
                    $comment=array(
                        'comment_id'=>intval($comms['cid']),
                        'news_id'=>intval($comms['nid']),
                    );
                    $res=$this->VoteCommentService->addVote($comment);
                    if($res){
                        return $this->showJson(200,'','评论点赞成功');
                    }
                }
            }else{
                return $this->showJson(202,'非法的请求');
            }
        }
    }