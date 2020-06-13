<?php 
$title = "Registration-success";
$page_topic = "Success";
require_once './inc/header.php';
require_once './db/conn.php';

if(isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $dob = $_POST['dob'];
  $specialty = $_POST['specialty'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];

  $issuccess = $crud->insert($fname,$lname,$dob,$specialty,$email,$contact);

  if($issuccess){
    echo '<h1 class="text-center text-primary">You have successfully registered for the conference</h1>';
  }
  else{
    echo '<h1 class="text-center text-danger">Sorry something went wrong please try again</h1>';
  }

}

$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$dob = $_POST['dob'];
$specialty = $_POST['specialty'];
$email = $_POST['email'];
$contact = $_POST['contact'];

?>

<h1>
        <?php
        echo $page_topic;
        ?>
    </h1>

    <div class="card" style="width: 18rem;">
  <div class="card-body">
      Your details are as follows: 
    <h5 class="card-title">Name: 
        <?php
        echo $firstname . ' ' . $lastname;
        ?></h5>
            <h5 class="card-title">Date of birth: 
        <?php
        echo $dob ?>
        </h5>
        <h5 class="card-title">Specialty: 
        <?php
        echo $specialty ?>
        </h5>
        <h5 class="card-title">Email: 
        <?php
        echo $email?>
        </h5>
        <h5 class="card-title">Contact: 
        <?php
        echo $contact?>
        </h5>
  </div>
</div>

<?php
require_once './inc/footer.php'
?>