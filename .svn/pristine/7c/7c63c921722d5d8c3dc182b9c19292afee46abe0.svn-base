<?php

/**
 * Created by zhou.
 * User: zhou
 * Date: 2015/11/16
 * Time: 14:00
 */

namespace Home\Model;


class City extends \Common\Model\Model
{
    protected $tableName = 'city';
    

    public function getProvinces()
    {
        return $this->where(["parent_id" => 1]);
    }

    public function getCitys($provinceId)
    {
        return $this->where(["parent_id" => $provinceId]);
    }

    public function getColById($id){
    	$data = $this->where(["id" => $id])->find();
    	return isset($data['name']) ? $data['name'] : "";
    }
}