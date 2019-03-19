<?php

/**
 * [PostService 博客]
 */
  class PostService{
    protected $postModel;
    public function __construct(){
      $this->postModel=new PostModel();
    }


/**
 * 添加博客
 * @param  [type] $param [数组]
 * @return [bool]        [成功1 失败 0]
 */
    public function insertPost($param){
      return $this->postModel->insert($param)?:0;
    }
  }
