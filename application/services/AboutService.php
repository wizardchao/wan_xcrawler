<?php
/**
 * Created by PhpStorm.
 * User: Chaos
 * Date: 2018/1/25
 * Time: 15:48
 */

class AboutService
{
    protected $about_model;
    protected $aboutCateModel;


    /*
    * 构造函数
    */
    public function __construct()
    {
        $this->about_model = new AboutModel();
        $this->aboutCateModel = new AboutCategoryModel();
    }


    /**
     * 返回分页数据
     *
     * @return type
     */
    public function getAboutInfoByPage($page, $page_size, $param)
    {
        $total = $this->about_model->getAllCounts($param);
        $page = Star_Page::setPage($page, $page_size, $total);
        $list = $this->about_model->getAboutInfoByPage($page, $page_size, $param);
        $page_info = compact('page', 'page_size', 'total');
        $page_data = Star_Page::show($page_info);
        return array('page' => $page_data, 'total' => $total, 'list' => $list);
    }


    /*
     * 添加数据
     */
    public function insertAbout($param)
    {
        return $this->about_model->insert($param);
    }


    /*
     * 编辑信息
     */
    public function updateAbout($arr, $param)
    {
        return $this->about_model->update($arr, $param);
    }


    /*
     * 通过id获取about
     */


    /*
     * 删除
     */
    public function delAbout($arr)
    {
        $data = array(
            'status' => -1,
        );
        return $this->about_model->update($arr, $data);
    }


    /*
     * 查找栏目 所有信息
     */
    public function getAboutAllInfo()
    {
//        return $this->about_model->getAboutAllInfo();
        $about_info = $this->about_model->getAboutAllInfo();
        foreach ($about_info as &$item) {
            $link = "/about/index?id=" . $item['about_id'];
            $item['link'] = ($item['type'] == 1) ? $link : $item['link'];
        }
        return $about_info;
    }


    public function getAboutCate()
    {
        return $this->aboutCateModel->getAboutAll();
    }


    public function getAboutCateInfoByPage($page, $page_size, $param)
    {
        $total = $this->aboutCateModel->getAllCounts($param);
        $page = Star_Page::setPage($page, $page_size, $total);
        $list = $this->aboutCateModel->getAboutInfoByPage($page, $page_size, $param);
        $page_info = compact('page', 'page_size', 'total');
        $page_data = Star_Page::show($page_info);
        return array('page' => $page_data, 'total' => $total, 'list' => $list);
    }


    //增加广告分类
    public function insertAboutCate($param)
    {
        return $this->aboutCateModel->insert($param);
    }


    //查找广告分类
    public function getAboutCateInfoById($about_category_id)
    {
        return $this->aboutCateModel->getAboutCateInfoById($about_category_id);

    }


    //编辑广告分类
    public function updateAboutCate($arr, $param)
    {
        return $this->aboutCateModel->update($arr, $param);
    }


    //删除广告分类
    public function delAboutCate($arr)
    {
        $param = array(
            'status' => -1,
        );
        return $this->aboutCateModel->update($arr, $param);
    }


    //获取全部分类内容
    public function getCateAll()
    {
        return $this->aboutCateModel->getAboutAll();
    }

    /**
     * 通过id获取about信息
     * @param $about_id
     * @return type
     */
    public function getAboutById($about_id)
    {

        return $this->about_model->getAboutById($about_id);
    }


    /**
     * 通过about_title获取about信息
     * @param $name
     * @return type
     */
    public function  getAboutByName($name){
        return $this->about_model->getAboutByName($name);
    }


    /**
     * 通过cateID获取about详情
     * @param $about_category_id
     * @return type
     */
    public function getAboutByCateId($about_category_id)
    {
        return $this->about_model->getAboutByCateId($about_category_id);
    }


    /**
     * 通过cate的title获取about的信息
     * @param $about_category_title
     * @return type
     */
    public function getAboutByCateName($about_category_title)
    {
        return $this->about_model->getAboutByCateName($about_category_title);

    }



}