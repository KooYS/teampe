<?php

require_once __DIR__ . "/Base.php";

class Main extends Base
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_view('main');
    }
}
