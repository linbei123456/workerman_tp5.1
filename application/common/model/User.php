<?php
// +----------------------------------------------------------------------
// | Author: itarvin <chnitarvin@gmail.com>
// +----------------------------------------------------------------------
namespace app\admin\model;
use app\common\model\Common;
/**
 * 后台用户模型
 * @package app\admin\model
 */
class User extends Common{

    protected $autoWriteTimestamp = 'datetime';
    protected $createTime         = 'create_time';
    protected $updateTime         = 'update_time';

    /**
     * 获取所有信息
     * @param $where 查询条件
     * @param $field 输出字段
     * @param $sort  排序
     * @param $len   输出条数
     * @return $data 数据集
     */
    // public function lists($where = [], $field = "*",$sort = "id desc", $len = '15')
    // {
    //     $data =$this->field($field)->where($where)
    //     ->order($sort)->limit($len)->select();
    //     return $data ? $data : [];
    // }

    /**
     * 获取所有信息分页
     * @param $param 返回参数
     * @param $field 输出字段
     * @param $sort  排序
     * @param $len   输出条数
     * @return $data 数据集
     */
    public function pages($param = [], $field = "*",$sort = "id desc", $len = '15')
    {
        $data = $this->field($field)->where($where)
        ->order($sort)->paginate($len, false, ['query' => $param]);
        return $data ? $data : [];
    }

    /**
     * 应用场景：新增，修改数据时的数据验证与处理
     * @param string $data    所有数据
     * @return array
     */
    public function store($data)
    {
        if($this->allowField(true)->save($data)){
            return apiReturn('',1,'操作成功');
        }
        return apiReturn('',0,'操作失败！');
    }
}
