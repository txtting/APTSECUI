<?php
/**
 * Created by zhou.
 * User: zhou
 * Date: 2015/11/16
 * Time: 16:21
 */

namespace Home\Model;


use Common\Model\Model;

class Room extends Model
{
    protected $tableName = 'room';

    protected $_validate = array(
        array('province', 'require', '请选择省区', "1"),
        array('city', 'require', '请选择城市', "1"),
        array('room_name', "require", '机房名称不能重复', 0, "unique"),
    );

    public function withCityNameSelect()
    {
        $subQuery = clone $this;
        $model    = clone $this;
        $subQuery->field("
        room.room_id,room.room_name,
        city.`name` AS province_name,
        room.province AS province,
        room.city AS city"
        )->join("LEFT JOIN city ON room.province = city.id");

        return $model
            ->field("city.`name` AS city_name,
            room.room_name,
            room.province_name,
            room.province,
            room.city,
            room.room_id")
            ->table($subQuery->buildSql() . ' as room')
            ->join("LEFT JOIN city ON room.city = city.id")
            ->select();
    }

    public static function getNegroups($room_id)
    {
        $negroupRooms = NegroupRoom::q()->field("negroup_id")->where(["room_id" => $room_id])->select();
        $negroupRooms = array_column($negroupRooms,"negroup_id");
        return Negroup::q()->where(["id" => ['in', implode(",", $negroupRooms)]])->select();
    }
}