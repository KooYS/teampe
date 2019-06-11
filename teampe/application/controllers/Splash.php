<?php

require_once __DIR__ . "/Base.php";

class Splash extends Base
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->set_userdata(array(
            "token" => $this->input->get('token'),
        ));
        $this->load_view('splash');
    }
    
}
