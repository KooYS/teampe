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
        $this->load_view('splash');
    }
}
