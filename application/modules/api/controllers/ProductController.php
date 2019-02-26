<?php


    class ProductController extends Star_Controller_Action
    {

        private $product_service;
        private $order_service;
        public function init()
        {
            parent::init();
            $this->product_service = new ProductService();
            $this->order_service=new OrderService();
        }

        public function placeAction(){

            $uid=5;
            $products=array(
                array('product_id'=>1,'count'=>3),
                array('product_id'=>2,'count'=>3),
                array('product_id'=>3,'count'=>2),
            );
            $res=$this->order_service->place($uid,$products);
            print_r($res);
        }
    }