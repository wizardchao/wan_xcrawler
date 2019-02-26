<?php


    class CrontabController extends Star_Controller_Action
    {
        public function init()
        {
            parent::init();
        }


        public function indexAction()
        {
            $array=[1,2,3];
            $collect = collect($array);
            dd($collect);
            exit;
            return $this->showJson(200);
        }
    }
