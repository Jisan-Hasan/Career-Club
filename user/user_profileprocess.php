<?php
session_start();
require '../database.php';

if(isset($_POST['profileupdate'])){
    $userid=$_SESSION['userid'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $location=$_POST['location'];
    $education=$_POST['education'];
    $skill=$_POST['skill'];
    $experience=$_POST['experience'];
    $additional=$_POST['additional'];

    if(isset($_FILES['image']) && $_FILES['image']['error']==0 ){
        $imagename=$_FILES['image']['name'];
        $image_tempath=$_FILES['image']['tmp_name'];
        $imagesize=$_FILES['image']['size'];
        $imagetype=$_FILES['image']['type'];
    
        $imagenamecamps=explode(".",$imagename);
        $image_extension=strtolower(end($imagenamecamps));
        $allowed_imageextensions=array('jpg','png','jpeg');

        if(in_array($image_extension,$allowed_imageextensions)){
            $newimagename = $userid.$imagename;

            $uploadimage_dir = '../images/';
            $dest_path = $uploadimage_dir.$newimagename;
            $image=$newimagename;
            if($imagesize < 5242880){
                if(move_uploaded_file($image_tempath, $dest_path)){
                    $sql="UPDATE user set name='$name', mobile='$mobile',location='$location',education='$education',skill='$skill',experience='$experience',additional='$additional', image='$image' where id='$userid' ";
                    if(mysqli_query($connection,$sql)){
                        header("Location:user_profile.php?userid=".$userid."&profile_update=Profile successfully updated");
                        exit();
                    }
                }else{
                    header("Location:user_profile.php?userid=".$userid."&profile_update=There was some external error. Please Check later");
                    exit();
                }
            }else{
                header("Location:user_profile.php?userid=".$userid."&profile_update=Filed size is too large. Max 5MB supported");
                exit();
            }

        }else{            
            header("Location:user_profile.php?userid=".$userid."&profile_update=File type not allowed. Only jpg,png,jpeg files are supported");
            exit();
        }
    }else{
        $sql="UPDATE user set name='$name', mobile='$mobile',location='$location',education='$education',skill='$skill',experience='$experience',additional='$additional' where id='$userid' ";
        if(mysqli_query($connection,$sql)){
            header("Location:user_profile.php?userid=".$userid."&profile_update=Profile successfully updated");
            exit();
        }
    }

}



// if(isset($_FILES["cvfile"]) && $_FILES["cvfile"]["error"] == 0){
//     $filename = $_FILES['cvfile']['name'];              //file name
//     $file_tmppath = $_FILES['cvfile']['tmp_name'];      // temp_path
//     $filesize = $_FILES['cvfile']['size'];          // file size
//     $filetype = $_FILES['cvfile']['type'];

//     $filenameCmps = explode(".", $filename); // breaks a string into an array.
//     $file_extension = strtolower(end($filenameCmps));        // end point the last element in the array // strtlower  converts a string to lowercase.
        
//     $allowed_fileextensions = array('pdf', 'txt',  'docx');

//     if (in_array($file_extension, $allowed_fileextensions)) {
//         $newfilename = $jobid.$filename;

//         $uploadFile_dir = '../cv/';
//         $dest_path = $uploadFile_dir.$newfilename;
//             if($filesize < 5242880){
//                 if(move_uploaded_file($file_tmppath, $dest_path)){
                        
//                     $jobsql="SELECT * from jobpost where id='$jobid' ";
//                     $jobsqlresult=mysqli_query($connection,$jobsql);
//                     $job_row=mysqli_fetch_assoc($jobsqlresult);
//                     $id=uniqid();
//                     $cv=$newfilename;
//                     $categoryid=$job_row['categoryid'];
                    
//                     $applytime=date("Y-m-d");
//                     $status="applied";

//                     $applysql="INSERT into jobapply Values('$id','$cv','$categoryid','$jobid','$userid','$applytime','$status')";
//                     if(mysqli_query($connection,$applysql)){
//                         header("Location:user_applyemail.php?jobid=".$jobid."&userid=".$userid." ");
//                         exit();
//                     }
//                     }else{
//                         header("Location:user_cvupload.php?jobid=".$jobid."&apply_msg=There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.");
//                         exit();
//                     }
//                 }else{
//                     header("Location:user_cvupload.php?jobid=".$jobid."&apply_msg=Filed size is too large. Max 5MB supported");
//                     exit();
//                 }
//         }else{
            
//             header("Location:user_cvupload.php?jobid=".$jobid."&apply_msg=File type not allowed. Only pdf,txt,docx files are supported");
//             exit();
//         }
//     }else{
//         header("Location:user_cvupload.php?jobid=".$jobid."&apply_msg=File error. Please check and Reupload the file.");
//         exit();
//     }

// }
// }else{
// header("location: user_login.php");
// exit();
// }
?>