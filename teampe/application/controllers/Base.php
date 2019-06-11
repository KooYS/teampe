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


function uploadFile($access_token, $file, $mime_type, $name) {

    $User_Agent = 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31';

        $request_headers = array();
        $request_headers[] = 'User-Agent: '. $User_Agent;
        $request_headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $file);
        curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $output = curl_exec($ch);
        curl_close($ch);


   $GAPIS = 'https://www.googleapis.com/';

    $ch1 = curl_init();

    // don't do ssl checks
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);

    // do other curl stuff
    curl_setopt($ch1, CURLOPT_URL, $GAPIS . 'upload/drive/v3/files?uploadType=media');
    curl_setopt($ch1, CURLOPT_BINARYTRANSFER, 1);
    curl_setopt($ch1, CURLOPT_POST, 1);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $output);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

    // set authorization header
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: '.$mime_type, 'Authorization: Bearer ' . $access_token) );

    // execute cURL request
    $response=curl_exec($ch1);
    if($response === false){
        $output = 'ERROR: '.curl_error($ch1);
    } else{
        $output = $response;
    }

    // close first request handler
    curl_close($ch1);

    // now let's get the ID of the file we just created
    // and submit the file metadata
    $this_response_arr = json_decode($response, true);

    if(isset($this_response_arr['id'])){
        $this_file_id = $this_response_arr['id'];

        $ch2 = curl_init();

        // don't do ssl checks
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);

        // do other curl stuff
        curl_setopt($ch2, CURLOPT_URL, $GAPIS . 'drive/v3/files/'.$this_file_id);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'PATCH');

        // initialize fields to submit
        $post_fields = array();

        // remove extension
        // $this_file_name = explode('.', $name);

        // submit name field
        // $post_fields['name']=$this_file_name[0];
        $post_fields['name']=$name;

        curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($post_fields));

        // return response as a string
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        // set authorization header
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token) );

        // execute cURL request
        $response=curl_exec($ch2);
        if($response === false){
            $output = 'ERROR: '.curl_error($ch2);
        } else{
            $output = $response;
        }

        // close second request handler
        curl_close($ch2);
    }

    return $output;
}


    public function ajax_img_upload()
    {
        $token = $this->input->post("token");
        if($token == null){
            die("token_error");
        }
        else{
            if (isset($_FILES['uploadfile'])) {

            $uploaddir = Base::make_directory("temp");
            $filename = Base::getUniqueString(pathinfo($_FILES['uploadfile']['name'], PATHINFO_EXTENSION));
            $file = $uploaddir ."/". $filename;
            if (!move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
                die ("error");
            }
                $mime_type = $_FILES['uploadfile']['type'];
                $filepath = base_url()."../../upload/temp/".$filename;
                $result = Base::uploadFile($token,  $filepath, $mime_type, $filename);
                die ($result);
            } 
            else
                echo "nofile";
        }   
    }

    public function ajax_multi_img_upload()
    {
         $ret_msg = "error";
        if (!empty($_FILES["uploadfile"])) {
            var_dump($_FILES["uploadfile"]);
            
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

    public function get_participant($uid = 0){
        if($uid == 0){
            $me = $this->session->userdata(SESSION_USR_ID);
            $sql = "SELECT * FROM room WHERE participant LIKE '%{$me}%' OR owner=$me";
            $query = $this->db->query($sql);
            $roomParticipant = $query->result();
            $room_usrData = [];
            foreach ($roomParticipant as $key => $val) {
                $usrData = [$val->uid];
                $temp = $val->participant;
                $temp = explode(',', $temp);
                $temp = array_filter($temp);
                foreach ($temp as $key => $val2) {
                    array_push($usrData,  $this->db->get_where('usr', array('id' => $val2))->row());
                }
                array_push($room_usrData,  $usrData);
            }

            return $room_usrData;

        }
        else{
            $roomParticipant = $this->db->get_where('room', array('uid' => $uid))->row();
            $roomParticipant = $roomParticipant->participant;
            $roomParticipant = explode(',', $roomParticipant);
            $roomParticipant =  array_filter($roomParticipant);
            $usrData = [];
            foreach ($roomParticipant as $key => $val) {
                array_push($usrData,  $this->db->get_where('usr', array('id' => $val))->row());
            }
            // $participantData = 
            return $usrData;
        }
    }
    public function get_url_metadata(){
        $url = $this->input->post("url");

        libxml_use_internal_errors(true);
        $d = new DomDocument();
        $c = file_get_contents($url);

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
