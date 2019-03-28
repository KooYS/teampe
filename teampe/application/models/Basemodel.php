<?php
/**
 * Created by PhpStorm.
 * User: Hrs
 * Date: 2018-09-05
 * Time: 04:17 PM
 */

class Basemodel extends CI_Model
{
    protected $tbl_name;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save($data, $uid = 0)
    {
        if ($uid == 0) {
            return $this->db->insert($this->tbl_name, $data);
        }
        return $this->db->update($this->tbl_name, $data, array('uid' => $uid));
    }

    public function delete($uid)
    {
        return $this->db->delete($this->tbl_name, array('uid' => $uid));
    }

    public function get_where($where)
    {
        return $this->db->get_where($this->tbl_name, $where);
    }

    public function getRow($uid, $field_name = "")
    {
        if ($field_name == "")
            return $this->db->get_where($this->tbl_name, array('uid' => $uid))->row();
        return $this->db->get_where($this->tbl_name, array('uid' => $uid))->row($field_name);
    }

    public function getTotalList()
    {
        return $this->db->get_where($this->tbl_name)->result();
    }

    public function getTotalListArray()
    {
        return $this->db->get_where($this->tbl_name)->result_array();
    }
    

}
