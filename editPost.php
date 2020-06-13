<?php 
$title = "Registration-success";
$page_topic = "Success";
require_once './inc/header.php';
require_once './db/conn.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $specialty = $_POST['specialty'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];

  $result = $crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty);

  if($result){
      header("Location: index.php");
  }
  else{
      echo "error";
  }
}

else{
    echo "error";
}

?>



<?php
require_once './inc/footer.php'
?>