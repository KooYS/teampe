<?php

require_once __DIR__ . "/Base.php";

class Login extends Base
{

    private $usrModel;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usrmodel');
        $this->usrModel = new Usrmodel();
    }

    public function index()
    {
        $data["roomNum"] = $this->input->get('roomNum');
        if(!isset($data["roomNum"]))
            if($this->session->has_userdata(SESSION_USR_ID))
                redirect('Main');

        $this->load_view('login',$data);
    }
    public function kakao_login()
    {
        $returnCode = $_GET["code"]; // 서버로 부터 토큰을 발급받을 수 있는 코드를 받아옵니다
        $restAPIKey = "c47884e2681e2a2a01b8e140dbc21ffb"; // 본인의 REST API KEY를 입력해주세요
        $callbacURI = urlencode(base_url()."index.php/Login/kakao_login"); // 본인의 Call Back URL을 입력해주세요
        $getTokenUrl = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$restAPIKey."&redirect_uri=".$callbacURI."&code=".$returnCode;
         
        $isPost = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $getTokenUrl);
        curl_setopt($ch, CURLOPT_POST, $isPost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array();
        $loginResponse = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
         
        $accessToken= json_decode($loginResponse)->access_token; //Access Token만 따로 뺌
        $header = "Bearer ".$accessToken; // Bearer 다음에 공백 추가
        $getProfileUrl = "https://kapi.kakao.com/v2/user/me";

        $opts = array( 
            CURLOPT_URL => $getProfileUrl, 
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_SSLVERSION => 1, 
            CURLOPT_POST => true, 
            CURLOPT_POSTFIELDS => array( "property_keys=['kakao_account.email']" ) , 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => array( "Authorization: " . $header ) 
        );

        $curlSession = curl_init(); 
        curl_setopt_array($curlSession, $opts); 
        $accessUserJson = curl_exec($curlSession); 
        curl_close($curlSession);


        $me_responseArr = json_decode($accessUserJson, true);

        $id = $me_responseArr['id'];

        $header = "Bearer ".$accessToken; // Bearer 다음에 공백 추가
         $getProfileUrl = "https://kapi.kakao.com/v1/api/talk/profile";

         $opts = array( 
            CURLOPT_URL => $getProfileUrl, 
            CURLOPT_SSL_VERIFYPEER => false, 
            CURLOPT_SSLVERSION => 1, 
            CURLOPT_POST => true, 
            CURLOPT_POSTFIELDS => array( "property_keys=['kakao_account.email']" ) , 
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_HTTPHEADER => array( "Authorization: " . $header ) 
        );

        $curlSession = curl_init(); 
        curl_setopt_array($curlSession, $opts); 
        $accessUserJson = curl_exec($curlSession); 
        curl_close($curlSession);


        $me_responseArr = json_decode($accessUserJson, true);
        $name = $me_responseArr['nickName'];
        $img = $me_responseArr['thumbnailURL'];

        if($img  == "")
            $img = base_url()."assets/images/login/empty.jpg";



    	$session_array = array(
            SESSION_USR_ID => $id,
            SESSION_USR_NAME => $name,
            SESSION_USR_IMG => $img
        );
        $this->session->set_userdata($session_array);

        if(!$this->session->has_userdata('token'))
            $usrdata = array(
                'id' => $id,
                'name' => $name,
                'image' => $img,
            );
        else
            $usrdata = array(
                'id' => $id,
                'name' => $name,
                'image' => $img,
                'token' => $this->session->userdata('token'),
            );
        // var_dump($this->usrModel->get_where(array('id' => $id)));
        // var_dump("test");
        $usr = $this->usrModel->get_where(array('id' => $id))->row();
        if($usr == null)
            $this->usrModel->save($usrdata);
        else
            $this->usrModel->save($usrdata,$usr->uid);

        $type = $this->input->get('state');

        if($type == "" || $type == "0")
            redirect('Main');
        else
            redirect('Room/index/'.$type);

    }
}
