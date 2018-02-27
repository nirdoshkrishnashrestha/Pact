<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
//$targetFolderx = 'codeRepository/uploads/'; // Relative to the root
$targetFolder = $_POST['targetFolder']; // Relative to the root
$unik =$_POST['timestamp'];

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] ."/" . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/'.$unik.'_'.$_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','pdf','doc','docx'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) { //echo "/uploads/".$_FILES['Filedata']['name'];die; 
		move_uploaded_file($tempFile,$targetFile);
		echo $unik.'_'.$_FILES['Filedata']['name'];
	} else {
		echo 'Invalid file type. Upload Failed';
	}
}
?>