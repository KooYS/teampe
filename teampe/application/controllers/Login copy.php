<?php

require_once __DIR__ . "/Base.php";

class Login extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usrmodel');
    }

    public function index()
    {
        $data["roomNum"] = $this->input->get('roomNum');
        $this->load_view('login',$data);
    }

    public function kakao_login($type)
    {
    	$id = $this->input->post('id');
        $name = $this->input->post('name');
        $img = $this->input->post('img');

    	$session_array = array(
            SESSION_USR_ID => $id,
            SESSION_USR_NAME => $name,
            SESSION_USR_IMG => $img
        );
        $this->session->set_userdata($session_array);
        $usrdata = array(
            'id' => $id,
            'name' => $name,
        );
        $usrModel = (new Usrmodel());
        if($usrModel->get_where(array('id' => $id))->row() == null)
            $usrModel->save($usrdata);

        if($type == "" || $type == "0")
            redirect('Main');
        else
            redirect('Room/index/'.$type);

    }
}
