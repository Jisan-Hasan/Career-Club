<?php
session_start();
require '../database.php';


// echo $_GET['packageid'];
// echo $_GET['numberofpost'];
// // echo $_SESSION['packagename'];

$packageid=$_GET['packageid'];
$numberofpost=$_GET['numberofpost'];
$employerid=$_GET['employerid'];

// $packagename=$_SESSION['packagename'];
// $employerid=$_SESSION['employerid'];
// $numberofpost=$_SESSION['numberofpost'];



$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("demop630c1c7e553ec");
$store_passwd=urlencode("demop630c1c7e553ec@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

    
	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

   // echo $status."<br>";
   // echo $tran_id."<br>";
   // echo $tran_date."<br>";
   // echo $card_type."<br>";
   // echo $amount."<br>";
    
    
    

    $paymentsql="INSERT INTO payment (status,transid,cardtype,employerid,packageid,transtime,amount) values ('$status','$tran_id','$card_type','$employerid','$packageid','$tran_date','$amount')";
    $paymentsqlresult=mysqli_query($connection,$paymentsql);

    

    $checksql="SELECT * from buypackage where employerid='$employerid' ";
    $checksqlresult=mysqli_query($connection,$checksql);
    
    if(mysqli_num_rows($checksqlresult)>=1){
         $row=mysqli_fetch_assoc($checksqlresult);

         $newnumberofpost=$row['numberofpost']+$numberofpost;
         $newamount=$row['amount']+$amount;

         $buypackagesql="UPDATE buypackage set numberofpost='$newnumberofpost' ,amount='$newamount' where employerid='$employerid' ";   
         $buypackagesqlresult=mysqli_query($connection,$buypackagesql);
         
         if($paymentsqlresult==1 && $buypackagesqlresult==1)
        {
            header("Location:http://localhost/Career-Club/employer/employer_buypackage.php?success_msg=Package successfully purchased & employerid=".$employerid."  ");
            exit();
            
        }else{
        echo $connection->error;
        }
    }else{
        $buysql="INSERT into buypackage (numberofpost,amount,employerid) values('$numberofpost','$amount','$employerid')";
        $buysqlresult=mysqli_query($connection,$buysql);
        if($paymentsqlresult==1 && $buysqlresult==1)
        {
            header("Location:http://localhost/Career-Club/employer/employer_buypackage.php?success_msg=Package successfully purchased & employerid=".$employerid." ");
            exit();
            
        }else{
        echo $connection->error;
        }
    }
    

} else {

	echo "Failed to connect with SSLCOMMERZ";
}

?>