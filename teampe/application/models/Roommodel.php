<?php



require_once __DIR__ . "/Basemodel.php";

class Roommodel extends Basemodel
{
    public function __construct()
    {
        parent::__construct();
        $this->tbl_name = "room";
    }

    public function getRowByName($name)
    {
        return $this->db->get_where($this->tbl_name, array('name' => $name))->row();
    }

}
