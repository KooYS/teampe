<?php

require_once __DIR__ . "/Base.php";

class MyFunction extends Base
{

	private $roomModel;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Roommodel');
        $this->roomModel = new Roommodel();
    }

    public function index($index)
    {
        var_dump($index);

    	// $data["room"] = $this->roomModel->get_where(array('owner' => $this->session->userdata(SESSION_USR_ID)))->result();
        // $this->load_view('main',$data);
    }
    // public function ajax_make_room()
    // {

    // 	$title = $this->input->post("title");

    // 	$roomdata = array(
    //         'name' => $title,
    //         'owner' => $this->session->userdata(SESSION_USR_ID),
    //     );

    //     if($this->roomModel->get_where(array('name' => $title,'owner' => $this->session->userdata(SESSION_USR_ID)))->row() == null){
    //         $this->roomModel->save($roomdata);
    // 		die(json_encode($this->roomModel->get_where(array('name' => $title,'owner' => $this->session->userdata(SESSION_USR_ID)))->row()));
    // 	}
    // 	else{
    // 		die("fail_already_reg");
    // 	}
    // }
}
