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

        $this->koo_init();

    }

    private function koo_init(){
        $url = "https://library.cau.ac.kr/pyxis-api/sso-login2?memberNo=5508cc21e01dbe783e228142e35e89a3&branch=null&lang=null";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $response = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $token = substr($response, 0, $header_size);
        curl_close($ch);
        $get_url = explode("Content-Length:",explode("Location: ",$token)[1]);
        $this->token = explode("/",$get_url[0])[5];
    }

    public function index($index)
    {
        // var_dump($index);

        // if($index == 3)
        // {
        //     $this->load_view('test');
        // }

        if($index == 2){
            $data["teampleRoomData"] = $this->get_teample_room_info(0);
            $data["room_summary"] = $this->room_summary;
            $this->load_view('menu/reserve', $data);
            //$this->load_view('menu/reserve');
        }
        if($index == 3){

            $this->load_view('menu/place');
        }



    	// $data["room"] = $this->roomModel->get_where(array('owner' => $this->session->userdata(SESSION_USR_ID)))->result();
        // $this->load_view('main',$data);
    }
    private function get_teample_room_info($j){
        $headers = [
        'Cookie: WMONID=j5oFV0OBYx1; _ga=GA1.3.1538320326.1556620055; _gid=GA1.3.640778938.1556620055; NG_TRANSLATE_LANG_KEY=%22ko%22; _gat=1; NCAUPOLICYNUM=175; ncautoken=04703284016839e9808a43a3b74c007a2761bc8fe9a4cec383a7944074f8464f8e78a47f1493ee4ee860292d3840fe29cf102318e9c15e01cf236fbdbc57ff87358892d53ad5a9a5db27fcaf621d6c73fc564c7d94e5cb19ccbe6388; ncaucookie=c7b62f44750d3a64987143ea78768982d523e54ccc13d9fc22f0f45d6804f93bced2f14ac9d0e6b2fa513bf51922acdb724482bac5c4c855de595b5ff268c680d8d0266782152aab81355bf55194202c3c600b0071f71bd2a223c836263c4a523add578cd4eb29d233be741c219f3d86ea3f7f8b1053878cd10405545391d1a776e00c34327f7a34292b0a1183c97771e63b9cd322af45d9425c1c574cf336fdee51adbd0b395d1d9be6f84686323cc023a5ed5346bdb1fe1c764d1b1910de2d58f63e21e199fcc0e0fd80ea3afecd7be1cf4aeb2120e466eda8dfdf6a9a076e34f978ae461b020628838611c13ac8883c6b4d8f9c4ebc2ca343528ec30cd3a4709b67b35177559999ea5dd931ab3a500a290d88c6d42a4dfa49dc6383df31d66a921128be5b52304bd46fc1dbac3eac9111a7dc99b17bfa5a7d66385c511d9b968042fb4d041c1ad93e72c5aec4f9b3c0d3cc28b73c9e884c8dda74cbde0d9e2a5ffca1ad72d54d9b840e7b449bd31d77a95129cbf112d31b7687df91a4d2f4b9f5b242c4065727fe4a23962c377f9cf8887b7e852c80cd69ed326147e1a57297cf55eca06c0083974b98751613d0f54ff63efc5dd9b552ba3dfee31385bf872879c72090f09549be2dcef544d1c52cd78925b0e63a2acc0c13797a5a59b29100817904d1b0a49990c03a09714a2ffe; ACSLOG=ba8b70431506bf02e2d411a2cd56c30752bd9046e0e71a3d8624fe7d87bd6bfc; LIB3PRX_SESSID=65080136; LP1121SID=65080136; LOPEPYXIS2CAU=%7B%22id%22%3A127917%2C%22accessToken%22%3A%2298lu2sto0ngjou6470t7tr0o82djtf7i%22%2C%22name%22%3A%22%EA%B5%AC%EC%98%81%EC%84%9C%22%2C%22availableHomepages%22%3A%5B1%2C10%2C8%2C2%2C4%2C6%2C7%2C9%2C3%2C5%5D%2C%22disableServices%22%3A%5B%5D%2C%22alternativeId%22%3A%227a41ef38-02ff-428f-95f8-63a28ded707d%22%2C%22branch%22%3A%7B%22id%22%3A1%2C%22name%22%3A%22%EC%84%9C%EC%9A%B8%ED%95%99%EC%88%A0%EC%A0%95%EB%B3%B4%EC%9B%90%22%2C%22alias%22%3A%22%EC%84%9C%EC%9A%B8%22%2C%22libraryCode%22%3A%22211052%22%7D%2C%22memberNo%22%3A%2220130398%22%2C%22expireDate%22%3A%222019-05-04T15%3A54%3A19%2B09%3A00%22%2C%22patronType%22%3A%7B%22id%22%3A101%2C%22name%22%3A%22%EC%84%9C%EC%9A%B8%3A%20%ED%95%99%EB%B6%80%EC%83%9D%22%7D%2C%22checkSum%22%3A85%2C%22printMemberNo%22%3A%2220130398%22%2C%22isPortalLogin%22%3Atrue%7D',
        'Accept-Encoding: gzip, deflate, br',
        'Accept-Language: ko',
        'User-Agent: Mozilla/5.0 (Linux; Android 6.0.1; Nexus 10 Build/MOB31T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36',
        'Accept: application/json, text/plain, */*',
        sprintf('pyxis-auth-token: %s',$this->token),
        'Referer: https://library.cau.ac.kr/',
        'Connection: keep-alive'
        ];


        $date = date("Y-m-d");
        $date = strtotime(date("Y-m-d", strtotime($date)) . sprintf(" +%d days",$j));
        $date = date("Y-m-d",$date);

        // 기본 팀플룸에 대한 요약 정보
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,sprintf("https://library.cau.ac.kr/smufu-api/api/pc/1/rooms?buildingId=1&hopeDate=%s&includeReserve=false",$date));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $this->room_summary = json_decode($server_output, true);
        // 이 데이터를 기반으로 팀플룸 info를 세부적으로 받아와야함

        ob_start();
         
        for ($i=1; $i < 18; $i++) { 
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL,sprintf("https://library.cau.ac.kr/smufu-api/api/pc/rooms/%d/reservations?date=%s",$i , $date));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $server_output = curl_exec ($ch);
            curl_close ($ch);

            $server_output = json_decode($server_output, true);
            if($this->room_summary['data']['list'][$i - 1]["unusablePeriod"] != null){
                continue;
            }
            $time = array();
            if($server_output['code'] != "success.noRecord"){
                foreach ($server_output['data']['list'] as $key => $value) {
                    array_push($time,$value['beginTime']);
                    array_push($time,$value['endTime']);
                }
                $duplicate = array_unique( array_diff_assoc( $time, array_unique( $time ) ) );
                $teampleRoomData[$i] = array_diff($time, $duplicate );
                sort($teampleRoomData[$i]);
            }
            else
                $teampleRoomData[$i] = null;
            
        }
    
        ob_end_flush();
        $this->get_cau_logout();

        return $teampleRoomData;
    }
    private function get_cau_logout(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://library.cau.ac.kr/pyxis-api/api/logout');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Cookie: JSESSIONID=8FDA16961D6BB0369CF07E9A13E63A61.pyxis-api1; WMONID=j5oFV0OBYx1; NG_TRANSLATE_LANG_KEY=%22ko%22; NCAUPOLICYNUM=176; _ga=GA1.3.21330003.1557231855; _gid=GA1.3.2129033847.1557231855; _gat=1; ncautoken=1a924875c6a136d9d46db4136d78b9060cf02b322142cbf4e3187479c1eec18ff9b91fa61bd328e25e35a703670bc5ab8ee931a8133e04f2bb6afff4dfcacf90aa0ad49eeeb7e1deaab032c33615378420af417fa9028eab3250cd7b; ncaucookie=c7b62f44750d3a64987143ea78768982d523e54ccc13d9fc22f0f45d6804f93bced2f14ac9d0e6b2fa513bf51922acdb724482bac5c4c855de595b5ff268c680d8d0266782152aab81355bf55194202c3c600b0071f71bd2a223c836263c4a523add578cd4eb29d233be741c219f3d86ea3f7f8b1053878cd10405545391d1a776e00c34327f7a34292b0a1183c97771e63b9cd322af45d9425c1c574cf336fdee51adbd0b395d1d9be6f84686323cc023a5ed5346bdb1fe1c764d1b1910de2d58f63e21e199fcc0e0fd80ea3afecd7be1cf4aeb2120e466eda8dfdf6a9a076e34f978ae461b020628838611c13ac8883c6b4d8f9c4ebc2ca343528ec30cd3a4709b67b35177559999ea5dd931ab3a500a290d88c6d42a4dfa49dc6383df31d66a921128be5b52304bd46fc1dbac3eac9111a7dc99b17bfa5a7d66385c511d9b968042fb4d041c1ad93e72c5aec4f9b3c0d3cc28b73c9e884c8dda74cbde0d9e2a5ffca1ad72d54d9b840e7b449bd31d77a95129cbf112d31b7687df91a4d2f4b9f5b242c4065727fe4a23962c377f9cf8887b7e852c80cd69ed326147e1a57297cf55eca06c0083974b98751613d0f54ff63efc5dd9b552ba3dfee31385bf872879c72090f09549be2dcef544d1c52cd78925b0e63a2acc0c13797a5a59b29100817904d1b0a49990c03a09714a2ffe; ACSLOG=0b1eb20abd5b1346f6d1b4f0f514dd275881669d669aafc5a272b6b14409f902; LIB3PRX_SESSID=240898256; LP1121SID=240898256; LOPEPYXIS2CAU=%7B%22id%22%3A127917%2C%22accessToken%22%3A%22m8r57aopq5vvmjnfnrrilf62k3tuu6e2%22%2C%22name%22%3A%22%EA%B5%AC%EC%98%81%EC%84%9C%22%2C%22availableHomepages%22%3A%5B1%2C10%2C8%2C2%2C4%2C6%2C7%2C9%2C3%2C5%5D%2C%22disableServices%22%3A%5B%5D%2C%22alternativeId%22%3A%227a41ef38-02ff-428f-95f8-63a28ded707d%22%2C%22branch%22%3A%7B%22id%22%3A1%2C%22name%22%3A%22%EC%84%9C%EC%9A%B8%ED%95%99%EC%88%A0%EC%A0%95%EB%B3%B4%EC%9B%90%22%2C%22alias%22%3A%22%EC%84%9C%EC%9A%B8%22%2C%22libraryCode%22%3A%22211052%22%7D%2C%22memberNo%22%3A%2220130398%22%2C%22expireDate%22%3A%222019-05-07T21%3A51%3A27%2B09%3A00%22%2C%22patronType%22%3A%7B%22id%22%3A101%2C%22name%22%3A%22%EC%84%9C%EC%9A%B8%3A%20%ED%95%99%EB%B6%80%EC%83%9D%22%7D%2C%22checkSum%22%3A250%2C%22printMemberNo%22%3A%2220130398%22%2C%22isPortalLogin%22%3Atrue%7D';
        $headers[] = 'Origin: https://library.cau.ac.kr';
        $headers[] = 'Accept-Encoding: gzip, deflate, br';
        $headers[] = 'Accept-Language: ko';
        $headers[] = 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1';
        $headers[] = 'Accept: application/json, text/plain, */*';
        $headers[] = sprintf('Pyxis-Auth-Token: %s', $this->token);
        $headers[] = 'Referer: https://library.cau.ac.kr/';
        $headers[] = 'Connection: keep-alive';
        $headers[] = 'Content-Length: 0';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
    }
    public function ajax_reserve_state_by_day(){

        $day = $this->input->post("day");
        $date = date("Y-m-d");
        $date = strtotime(date("Y-m-d", strtotime($date)) . sprintf(" +%d days",$day));
        $date = date("Y-m-d",$date);

        die(json_encode(array("day" => $date , "data" => $this->get_teample_room_info($day) , "summary" => $this->room_summary)));
    }
}
