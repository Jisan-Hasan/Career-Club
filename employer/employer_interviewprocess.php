<?php 
session_start();
require '../database.php';

if(isset($_POST['interviewcall']) && isset($_POST['jobpostid']) && isset($_POST['jobapplyid']) && isset($_POST['userid']) && isset($_POST['employerid'])){

$jobpostid=$_POST['jobpostid'];
$jobapplyid=$_POST['jobapplyid'];
$userid=$_POST['userid'];
$employerid=$_POST['employerid'];


$time= $_POST['interviewcall'];

$meetingtime=date('Y-m-d H:i:s', strtotime($time));

include_once 'Zoom_Api.php';

$zoom_meeting = new Zoom_Api();

$data = array();
$data['topic'] 		= 'Interview Meeting';
$data['start_date'] =$meetingtime;

$data['duration'] 	= 30;
$data['type'] 		= 2;
$data['password'] 	= "12345";


try {
	$response = $zoom_meeting->createMeeting($data);
	
	// $meeting_time= $response->start_time;
	$id=uniqid();
    $meeting_id= $response->id;

    $meeting_time=$meetingtime;

    $meeting_duration= $response->duration;
    $meeting_topic= $response->topic;
    $meeting_url= $response->join_url;
    // $url_len= urlencode($url);
    // $meeting_link = mysqli_real_escape_string($connection,$url_len ); 
    $meeting_password= $response->password;

    $meetingsql="INSERT into interview Values(?,?,?,?,?,?,?,?,?)";
    $stmt=$connection->prepare($meetingsql);
    if($stmt){ 
        $stmt->bind_param("sssssssss", $id, $userid, $employerid,$jobpostid,$jobapplyid,$meeting_id,$meeting_time,$meeting_url,$meeting_password);
        if($stmt->execute()){
            $updatesql="UPDATE jobapply set status='called for interview' where id='$jobapplyid'";
            if(mysqli_query($connection,$updatesql)){
                header("Location: employer_interviewmail.php?applyid=".$jobapplyid."&id=".$meeting_id."&link=".$meeting_url."&password=".$meeting_password."&time=".$meeting_time."&duration=".$meeting_duration." ");
                exit();
            }
        }else{
            echo $connection->error;
        }
    }else{
        echo $connection->error;
    }

} catch (Exception $ex) {
    echo $ex;
}
 }


?>