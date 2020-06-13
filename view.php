<?php 

$title = "view records";
$page_topic = "View Record";
require_once './inc/header.php';
require_once './db/conn.php';

if(!isset($_GET['id'])){
    echo '<h1 class="text-danger">Please check details and try again</h1>';
}
else{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);

?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
      Your details are as follows: 
    <h5 class="card-title">Name: 
        <?php
        echo $result['first_name'] . ' ' . $result ['last_name'];
        ?></h5>
            <h5 class="card-title">Date of birth: 
        <?php
        echo $result['date_of_birth']; ?>
        </h5>
        <h5 class="card-title">Specialty: 
        <?php
        echo $result['specialty_name']; ?>
        </h5>
        <h5 class="card-title">Email: 
        <?php
        echo $result['email']; ?>
        </h5>
        <h5 class="card-title">Contact: 
        <?php
        echo $result['contact']; ?>
        </h5>
  </div>
</div>

<?php } ?>
<br>
<br>



<?php
require_once './inc/footer.php'
?>