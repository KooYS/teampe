<?php


class Base extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->helper('file');
        $this->load->database();
        date_default_timezone_set('Asia/Seoul');
    }

    public function load_view($main_v_path, $main_v_param = array(), $include_header_footer = true)
    {
        if ($this->session->has_userdata(SESSION_USR_UID))
            $main_v_param['me'] = $this->session->userdata(SESSION_USR_UID);
        else
            $main_v_param['me'] = '';

        if ($include_header_footer) {
            $this->load->view('layout/header');
            $this->load->view($main_v_path, $main_v_param);
            $this->load->view('layout/footer');
        } else {
            $this->load->view($main_v_path, $main_v_param);
        }
    }

    public function load_ajaxview($main_v_path, $main_v_param = array())
    {
        $this->load->view($main_v_path, $main_v_param);
    }

    public function getMe()
    {
        if (!$this->session->has_userdata(SESSION_USR_UID))
            return false;
        return $this->session->userdata(SESSION_USR_UID);
    }

    public function getMyId()
    {
        if (!$this->session->has_userdata(SESSION_USR_ID))
            return "";
        return $this->session->userdata(SESSION_USR_ID);
    }


    public function removeSessionData()
    {
        $this->session->unset_userdata(SESSION_USR_UID);
        $this->session->unset_userdata(SESSION_USR_ID);
    }

    public function make_directory($path)
    {
        $dirs = explode('/', $path);
        $mkpath = UPLOAD_PATH;
        if (!file_exists($mkpath)) {
            mkdir($mkpath, 0777);
        }

        foreach ($dirs as $dirname) {
            if ($dirname !== '') {
                $mkpath .= "/" . $dirname;
                if (!file_exists($mkpath)) {
                    mkdir($mkpath, 0777);
                }
            } else
                break;
        }
        return $mkpath;
    }

    public function ajax_img_upload()
    {

        $ret_msg = "error";
        if (!empty($_FILES["uploadfile"])) {
            

            $uploaddir = Base::make_directory("temp");
            $file_array = array();
            for ($i = 0; $i < count($_FILES['uploadfile']['name']); $i++) {
                $filename = Base::getUniqueString(pathinfo($_FILES['uploadfile']['name'][$i], PATHINFO_EXTENSION));
                $file = $uploaddir . "/" . $filename;
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $file)) {
                    if (file_exists($file)) {
                        // $this->file_move($filename, "temp", "board/" . 1);
                        array_push($file_array, array('result' => 'ok','filename' => $filename, 'fileurl' => base_url() . '../upload/temp'));
                    } else {
                        $ret_msg = "error";
                    }
                }
            }

            die(json_encode(array("files"=>$file_array)));
        }
        die ($ret_msg);
    }

    public function ajax_multi_img_upload()
    {

        if (isset($_FILES['uploadfile'])) {
            $uploaddir = Base::make_directory("temp");
            $filename_array = array();
            for ($i = 0; $i < count($_FILES['uploadfile']['name']); $i++) {
                $filename = Base::getUniqueString(pathinfo($_FILES['uploadfile']['name'][$i], PATHINFO_EXTENSION));
                $file = $uploaddir . "/" . $filename;
                if (!move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $file)) {
                    die ("error");
                }
                array_push($filename_array, $filename);
            }
            die (json_encode($filename_array));
        } else
            echo "nofile";
    }


    public function getUniqueString($ext = '')
    {
        $returnVar = "" . round(microtime(true) * 1000) . rand(1000, 9999);
        if (!empty($ext)) {
            $returnVar .= "." . $ext;
        }
        return $returnVar;
    }

    public function file_move($src_filename, $src_path, $dest_path)
    {
        if ($src_filename != "" && $src_filename != null) {
            $src_file = UPLOAD_PATH . $src_path . '/' . $src_filename;
            if (file_exists($src_file)) {
                $dest_file = ($this->make_directory($dest_path)) . '/' . $src_filename;
                rename($src_file, $dest_file);
            }
        }
    }


    public function get_url_metadata(){
        $url = $this->input->post("url");
        libxml_use_internal_errors(true);
        $c = file_get_contents($url);
        $d = new DomDocument();
        $d->loadHTML($c);
        $xp = new domxpath($d);
        $title = "";
        $description = "";
        $image = "";
        foreach ($xp->query("//meta[@property='og:title']") as $el) {
           $title = $title.$el->getAttribute("content");
        }
        foreach ($xp->query("//meta[@property='og:description']") as $el) {
            $description = $description.$el->getAttribute("content");
        }
        foreach ($xp->query("//meta[@property='og:image']") as $el) {
            $image = $image.$el->getAttribute("content");
        }
        // print_r($title);
        die (json_encode(array('title' => $title , 'description' => $description, 'image' => $image)));
    }


}
