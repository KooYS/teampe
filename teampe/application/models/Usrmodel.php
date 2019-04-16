<?php



require_once __DIR__ . "/Basemodel.php";

class Usrmodel extends Basemodel
{
    public function __construct()
    {
        parent::__construct();
        $this->tbl_name = "";
    }

    public function getRowById($usrid)
    {
        return $this->db->get_where($this->tbl_name, array('id' => $id))->row();
    }


}
