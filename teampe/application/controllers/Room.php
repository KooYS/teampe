<?php

require_once __DIR__ . "/Base.php";

class Room extends Base
{
    private $roomModel;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Roommodel');
        $this->roomModel = new Roommodel();
    }

    public function index($id)
    {
        $data["현재방"] = $this->roomModel->getRow($id);
        if(!$this->session->has_userdata(SESSION_USR_ID))
        {
            redirect("Login?roomNum=".$id);
        }
        else{
            $participant = explode(",", $data["현재방"]->participant);
            if(!in_array($this->session->userdata(SESSION_USR_ID), $participant)){

                if($data["현재방"]->participant == "")
                    $this->roomModel->save(array('participant' => $this->session->userdata(SESSION_USR_ID)),$id);
                else
                    $this->roomModel->save(array('participant' => $data["현재방"]->participant.",".$this->session->userdata(SESSION_USR_ID)),$id);
            }
        }
        $data["현재방"] = $this->roomModel->getRow($id);
        $this->load_view('room', $data);
    }

}