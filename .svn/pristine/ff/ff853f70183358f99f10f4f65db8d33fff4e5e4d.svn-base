<?php
/**
 * Created by PhpStorm.
 * User: byzoro
 * Date: 2015/7/27
 * Time: 10:05
 */

namespace Home\Controller;


use Home\Common\Auth;
use Home\Common\Util;
use Think\Controller;

class AuthController extends Controller
{
    public function index()
    {

    }

    /************************************
     * group start
     */
    public function group()
    {
        $this->display();
    }

    public function groups()
    {
        $groups = Auth::group()->select();
        $result = array();
        foreach ($groups as $group) {
            $result[] = array(
                'text' => $group['title'],
                'id'   => $group['id']
            );
        }
        $this->ajaxReturn($result);
    }

    public function groupFind()
    {
        $id = I("post.id", null);
        if ($id == null) {
            return false;
        }
        $this->ajaxReturn(Auth::group()->find($id));
    }

    public function groupRules()
    {
        $id = I("get.id", null);
        if ($id == null) $this->ajaxReturn(array());
        $group = Auth::group()->find($id);

        $rules  = Auth::rule()->where(array('in' => $group['rules']))->select();
        $result = array();
        array_walk($rules, function ($value) use (&$result) {
            $result[$value['id']] = array(
                'id'    => $value['id'],
                'group' => $value['pid'],
                'text'  => $value['title'],
            );
        });

        array_walk($result, function (&$value) use (&$result) {
            if ($value['group'] != '0') {
                $value['group'] = (isset($result[$value['group']]['text'])) ?
                    $result[$value['group']]['text'] :
                    '';
            }
        });
        array_walk($result, function (&$value, $key) use (&$result) {
            if ($value['group'] == '0') {
                unset($result[$key]);
            }
        });
        $ajaxResult = array();
        $groupRules = explode(',', $group['rules']);
        array_walk($result, function (&$value, $key) use (&$ajaxResult, $groupRules) {
            $value['check'] = (in_array($value['id'], $groupRules) ? true : false);
            $ajaxResult[]   = $value;
        });
        $this->ajaxReturn($ajaxResult);

    }

    public function groupRulesUpdata()
    {
        $data = I("post.data", null);
        $id   = I("post.id", null);
        if ($data == null || $id == null) {
            return false;
        }
        $data = implode(",", $data);
        Auth::group()->where(array('id' => $id))->save(array('rules' => $data));
    }

    public function groupAction()
    {
        $acton = I("post.action", null);
        $id    = I("post.id", null);
        $data  = I("post.data", null);

        if (is_null($acton) || is_null($id) || is_null($data)) {
            $this->ajaxReturn(false);
        }

        if ($acton == 'add') {
            Auth::group()->add($data);
        }
        if ($id !== 0) {
            if ($acton == "save") {
                Auth::group()->where(array("id" => $id))->save($data);
            }
            if ($acton == "del") {
                Auth::group()->where(array("id" => $id))->delete();
            }
        }
        $this->ajaxReturn(true);
    }

    /************************************************************************
     * group end
     */

    public function rule()
    {
        $this->display();
    }

    public function rules()
    {
        $data   = Auth::rule()->select();
        $total  = count($data);
        $result = array(
            'rows'  => $data,
            'total' => $total
        );
        $this->ajaxReturn($result);
    }

    public function rulesPost()
    {
        $post = $_POST['data']['rows'];

        $rules       = Auth::rule()->field('id')->select();
        $rules       = array_column($rules, 'id');
        $postRulesID = array_column($post, 'id');
        $delPost     = array_diff($rules, $postRulesID);
        foreach ($post as $key => $data) {
            if (isset($data["id"])) {
                Auth::rule()->where(array("id" => $data["id"]))->save($data);
            } else {
                if (($data['pid'] != 0)) {
                    if (Auth::rule()->where(array("id" => $data["pid"]))->count() <= 0) {
                        continue;
                    }
                }
                Auth::rule()->add($data);
            }
        }


        foreach ($delPost as $key => $data) {
            Auth::rule()->where(array("id" => $data))->delete();
        }
        $this->ajaxReturn(true);
    }

    /**************************************************************************
     * 权限管理
     */

    public function usergroup()
    {
        $this->display();
    }


    public function usergroups()
    {
        $data   = Auth::group()->select();
        $result = array();
        array_walk($data, function ($value) use (&$result) {
            $result[] = array(
                'text' => $value['title'],
                'id'   => $value['id']
            );
        });
        $this->ajaxReturn($result);
    }


    public function groupUsers()
    {
        $id = I("get.id", null);
        if (!$this->_checkNull([$id])) {
            return false;
        }
        $data   = Auth::groupAccess()->where(array("group_id" => $id))->field('uid')->select();
        $data   = array_column($data, 'uid');
        $result = Auth::user()->field(array('user', 'id'))->select();
        array_walk($result, function (&$value) use (&$data) {
            $value['text'] = $value['user'];
            if (in_array($value['id'], $data)) {
                $value['check'] = true;
            } else {
                $value['check'] = false;
            }
        });
        $this->ajaxReturn($result);
    }

    private function _groupUserUpdata($userId, $roleId)
    {
        $data = Auth::groupAccess()->where(array("uid" => $userId))->count();
        if ($data > 0) {
            return Auth::groupAccess()->where(array("uid" => $userId))->save(array("uid" => $userId, 'group_id' => $roleId));
        } else {
            return Auth::groupAccess()->add(array("uid" => $userId, 'group_id' => $roleId));
        }
    }

    /**********************************************************
     * 用户管理
     */

    public function user()
    {
        $data   = Auth::group()->select();
        $result = array();
        array_walk($data, function ($value) use (&$result) {
            $result[] = array(
                'text' => $value['title'],
                'id'   => $value['id']
            );
        });
        $this->groups = $result;
        $this->display();
    }

    public function users()
    {
        $sql  = "SELECT
	u.*,g.id AS `group`,g.title AS g_title
FROM
	auth_group_access AS a
LEFT JOIN sys_user AS u ON a.uid = u.id
LEFT JOIN auth_group AS g ON a.group_id = g.id";
        $data = M()->query($sql);
        foreach ($data as &$d) {
            $d['status'] = $d['status'] == 1 ? "开启" : "关闭";
        }
        $this->ajaxReturn($data);
    }


    public function userAction()
    {
        $action = I("post.action", null);

        $data = $_POST;
        unset($data['action']);
//        print_r($data);die;
        !$this->_checkNull($data) && $this->ajaxReturn("请填写所有数据");
        if ($action == "add") {

            $data['password'] = md5($data['password']);
            unset($data['id']);
            $userId = Auth::user()->add($data);
            $this->_groupUserUpdata($userId, $data['group']);
        } elseif ($action == "del") {
            Auth::user()->where(array("id" => $data['id']))->delete();
            Auth::groupAccess()->where(array("uid" => $data['id']))->delete();
        } elseif ($action == "save") {
            $user = Auth::user()->find($data['id']);
            if ($data['password'] != $user['password']) $data['password'] = md5($data['password']);
            Auth::user()->where(array("id" => $data['id']))->save($data);
            $this->_groupUserUpdata($data['id'], $data['group']);
        } else {
            $this->ajaxReturn(false);
        }
        $this->ajaxReturn(true);

    }

    public function menuInit()
    {
        Auth::menuInit();
    }

    private function _checkNull($array)
    {
        return Util::checkNull($array);
    }
}