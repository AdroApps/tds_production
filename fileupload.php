<?php
include_once 'conn.php';
$dir = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/fileuploads/";

if($_POST['type']=='delete'){
	$values=explode(',',$_POST['id']);
$sql3 = "DELETE FROM fileuploads WHERE id=".$values[0];
			$data3 = mysqli_query($conn, $sql3);
			 unlink($dir.$values[1]);
}

	$date = date("Y/m/d h:i:s");

    //$email = $_POST['email'];
    if(!empty($_FILES['file_url']['name'])) {
		$filename = $_FILES['file_url']['name'];
		$fileTmpLoc = $_FILES['file_url']['tmp_name'];
		$fileType = $_FILES['file_url']['type'];
		$filesize = $_FILES['file_url']['size'];
		$fileErrorMsg = $_FILES['file_url']['error'];
		$store = "fileuploads/" . $filename;
		//$time = date("Y-m-d")."-".time();
		//$created = $time;
		if ($_FILES['file_url']['error'] !== UPLOAD_ERR_OK) {
			die("upload failedwith error code" . $_FILES['file_url']['error']);
			echo "error";
		}
		if (move_uploaded_file($fileTmpLoc, $store)) {

			$sql3 = "INSERT into `fileuploads`(`file` , `date` , `userid`,`qid`) VALUES ('".$filename."' , '".$date."','".$_SESSION['user_id']."','".$_SESSION['qid']."')";
			echo $sql3;$data3 = mysqli_query($conn, $sql3);
			if($data3) {
				$txt = "success";
			}
			else {
				 $txt= "not".mysqli_error($conn);
			 }
		}
	} else {
		$path = "";
		
	}

   echo json_encode([$txt]);
?>