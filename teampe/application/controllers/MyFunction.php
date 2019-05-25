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

    public function updateschedule(){
        $userid = $this->input->post('userid');
        $data = json_decode($this->input->post('schedule'));

        $this->db->query("DELETE FROM schedule WHERE userid=$userid");


        try {
            $this->db->trans_start();
            foreach($data as $ij){
                $this->db->query("INSERT INTO schedule (`userid`, `day`, `time`) VALUES ($userid, $ij[0], $ij[1]);");
            }
            $this->db->trans_complete();
            $this->db->trans_commit();
        }
        catch (Exception $e) {
            $this->db->trans_rollback();
            echo "NOTOK";
            return;
        }

        echo "OK";
    }

    function mb_strrev($str){


          $ret = array();

          for ($i=0; $i<mb_strlen($str, "utf-8"); $i++){

             array_unshift($ret, mb_substr($str, $i, 1, "utf-8"));

          }
          return join($ret);

      }

    public function updateTodolist(){


        $content = $this->input->post('content');
        $description = $this->input->post('description');
        $date1 = $this->input->post('date1');
        $date1 = date('y-m-d', strtotime($date1));

        $this->db->query("INSERT INTO todolist (content, description, date1) VALUES('$content', '$description', '$date1')");
  

    }

    public function deleteTodolist(){

        $this->db->query("DELETE FROM todolist");

    }


    public function index($index)
    {
        //var_dump($index);

        if($index==1){
            $timetable['data']=array(
                    array(0,0,0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0,0,0)
                ,array(0,0,0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0,0,0,0));
            $timetable['usernum']=0;
            $this->load->database();
            ///방 아이디를 1 대신 넣기
            $roomquery = $this->db->query("SELECT participant FROM room WHERE uid=3;");

            $row=$roomquery->row();

            $participant=$row->participant;
            $tok=explode(',',$participant);

            $timetable['usernum']=count($tok);

            for($i=0;$i<count($tok);$i++){
                $ui=(int)$tok[$i];

                $query = $this->db->query("SELECT * FROM schedule WHERE userid=$ui;");


                foreach ($query->result() as $row)
                {
                    $timetable['data'][$row->day][$row->time]=$timetable['data'][$row->day][$row->time]+1;
                }

            }

            #빈강의실
            $everytimequery = $this->db->query("SELECT data FROM everytime WHERE uid=1;");
            $row=$everytimequery->row();
            $everytimedata=$row->data;
            $tok=explode('?',$everytimedata);
            for($i=0;$i<count($tok);$i++){
                $tok[$i]=explode(',',$tok[$i]);
            }

            for($i=0;$i<count($tok);$i++){
                usort($tok[$i],'strcasecmp');
                for($j=0;$j<count($tok[$i]);$j++){
                    $tok[$i][$j]=explode(':',$tok[$i][$j]);
                    $tok[$i][$j][1]=explode(' ',$tok[$i][$j][1]);
                    usort($tok[$i][$j][1],'strcasecmp');
                }
            }

            $timetable['tok']=$tok;

            $this->load_view('scheduler', $timetable);
        }
        elseif($index==2){
            $this->load_view('classroom');
        }

        elseif($index==3){
            $this->load_view('place');
        }

        elseif($index==4){
            $this->load->database();
            $todolist['todolist'] = array();
            $result = $this->db->query("SELECT * FROM todolist;");

            foreach ($result->result() as $row)
            {
                $a='';
                $a=$a.'할일 : '.$row->content.'^'.'내용 : '.$row->description.'^'.$row->date1;
                array_push($todolist['todolist'],$a);
            }

            

            $this->load_view('todolist',$todolist);

        }

        elseif($index==5){
            $this->load_view('meetinglog');
        }

        else if ($index==100){
            $session_array = array(SESSION_USR_ID => 1064377830);
            $this->session->set_userdata($session_array);
            $this->load_view('schedulerinput');
        }
        else if ($index==200){

            $this->load_view('todolist_input');
        }

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
