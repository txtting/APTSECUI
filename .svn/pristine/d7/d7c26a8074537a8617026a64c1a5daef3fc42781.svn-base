<?php


namespace Home\Model;

use Home\Model\Negroup;
use Home\Model\Room;

class Util
{
    public static function buildNetTree($arrayfor2 = false)
    {
        $rooms = Room::q()->withCityNameSelect();
        $_data = [];
        foreach ($rooms as $key => &$room) {
            $room["id"]    = "r" . $room["room_id"];
            $room["name"]  = $room["room_name"];
            $room["child"] = Room::getNegroups($room["room_id"]);
            foreach ($room["child"] as &$d) {
                $d["group_id"] = $d["id"];
                $d["id"]       = "g" . $d["id"];
                $d["child"]    = Negroup::getNeRegisters($d["group_id"]);
                foreach ($d["child"] as &$nd) {
                    $nd["net_id"] = $nd["id"];
                    $nd["id"]     = "n" . $nd["id"];
                }
            }
            if (!isset($_data[$room["province"]])) {
                $_data[$room["province"]] = [
                    "name"  => $room['province_name'],
                    "id"    => "p" . $room['province'],
                    "child" => []
                ];
            }
            if (!isset($_data[$room["province"]]["child"][$room["city"]])) {
                $_data[$room["province"]]["child"][$room["city"]] = [
                    "name"  => $room['city_name'],
                    "id"    => "c" . $room['city'],
                    "child" => []
                ];
            }
            $_data[$room["province"]]["child"][$room["city"]]["child"][] = $room;
        }
        if ($arrayfor2) {
            $data = [];

            function build($_data, &$data, $pid)
            {
                foreach ($_data as &$d) {
                    if (isset($d["child"])) {
                        build($d["child"], $data, $d["id"]);
                    }
                    $var = [
                        "name" => $d["name"],
                        "pId"  => $pid,
                        "id"   => $d["id"]
                    ];
                    if (isset($d["serial_number"])){
                        $var["serial_number"] = $d["serial_number"];
                    }
                    $data[] = $var;
                }

            }

            build($_data, $data, 0);
            // print_r($data);die;

            return $data;
        }

        return $_data;
    }
    public static function checked($value)
    { 
        return $value === "1" ? 'checked value="1"' : 'value="0"';
    }
}