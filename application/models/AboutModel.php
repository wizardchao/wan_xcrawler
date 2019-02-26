<?php
/**
 * Created by PhpStorm.
 * User: Chaos
 * Date: 2018/1/25
 * Time: 15:38
 */

class AboutModel extends Star_Model_Abstract
{

    protected $_name = 'about';

    protected $_primary = 'about_id';


    /**
     * 通过id获取about信息
     * @param $about_id
     * @return type
     */
    public function getAboutById($about_id)
    {
        $select = $this->select();
        $select->from($this->getTableName())
            ->where('about_id =?', $about_id)
            ->where('status >=?', 1);
        return $this->fetchRow($select);
    }


    /**
     * 通过about_title获取about信息
     * @param $name
     * @return type
     */
    public function  getAboutByName($name){
        $select = $this->select();
        $select->from($this->getTableName())
            ->where('about_title =?', $name)
            ->where('status >=?', 0);
        return $this->fetchRow($select);
    }


    /**
     * 通过cateID获取about详情
     * @param $about_category_id
     * @return type
     */
    public function getAboutByCateId($about_category_id)
    {
        $select = $this->select();
        $select->from($this->getTableName() ." AS a")
            ->where('a.status >=?', 0)
            ->joinInner($this->getTableName('about_category') ." AS c","c.about_category_id = a.about_category_id")
            ->where('c.about_category_id =?', $about_category_id)
            ->where('c.status >=?', 0);
        return $this->fetchAll($select);

    }


    /**
     * 通过cate的title获取about的信息
     * @param $about_category_title
     * @return type
     */
    public function getAboutByCateName($about_category_title)
    {
        $select = $this->select();
        $select->from($this->getTableName() ." AS a")
            ->where('a.status >=?', 0)
            ->joinInner($this->getTableName('about_category') ." AS c","c.about_category_id = a.about_category_id")
            ->where('c.about_category_title =?', $about_category_title)
            ->where('c.status >=?', 1);
        return $this->fetchAll($select);

    }


    /**
     * 返回有关信息
     *
     * @param type $page
     * @param type $page_size
     * @param type $params
     * @return type
     */
    public function getAboutInfo($page, $page_size, Array $params)
    {
        $select = $this->select();
        $select->from($this->getTableName())
            ->limitPage($page, $page_size)->order('about_id DESC');
        return $this->fetchAll($select);
    }

    /**
     * 返回有关信息
     *
     * @param type $page
     * @param type $page_size
     * @param type $params
     * @return type
     */
    public function getAboutInfoByPage($page, $page_size, Array $params)
    {
        $select = $this->select();
        $select->from($this->getTableName())
            ->where('status >=?', 1);
        if ($params) {
            if (isset($params['about_category_id']) && $params['about_category_id']) {
                $select->where('about_category_id =?', $params['about_category_id']);
            }
        }

        $select->limitPage($page, $page_size)->order(array('sort_id ASC', 'time_create ASC'));
        return $this->fetchAll($select);
    }


    /*
    * 取出总数
    */
    public function getAllCounts($params = NULL)
    {
        $select = $this->select();
        $select->from($this->getTableName(), "COUNT(1)")
            ->where('status >=?', 1);
        if ($params) {
            if (isset($params['about_category_id']) && $params['about_category_id']) {
                $select->where('about_category_id =?', $params['about_category_id']);
            }
        }
        return $this->fetchOne($select);
    }


    /*
    * 取出总数
     */
    public function getAboutAllInfo($param = NULL)
    {
        $select = $this->select();
        $select->from($this->getTableName())
            ->where('status >=?', 1);
        return $this->fetchAll($select);
    }


    /*
     *获取相同cate下面的about的内容
     */



}

?>
