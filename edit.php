<?php 

$title = "Edit records";
$page_topic = "Edit records";
require_once './inc/header.php';
require_once './db/conn.php';

$results = $crud->getSpecialties();
if(!isset($_GET['id']))
{
    echo "error";
}
else 
{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

?>

    <h1>
        <?php
        echo $page_topic;
        ?>
    </h1>

    <form method="post" action="editPost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['user_id'] ?>" />
  <div class="form-group">
    <label for="firstname">First name</label>
    <input type="text" class="form-control" value="<?php echo $attendee['first_name'] ?>" id="firstname" name="firstname" required='required' placeholder="Enter your firstname here.">
  </div>
  <div class="form-group">
    <label for="lastname">Last name</label>
    <input type="text" class="form-control" id="lastname" value="<?php echo $attendee['last_name']; ?>" name="lastname" required='required' placeholder="Enter your lastname here.">
  </div>
  <div class="form-group">
    <label for="dob">Date of birth</label>
    <input type="date" class="form-control" id="dob" value="<?php echo $attendee['date_of_birth']; ?>" name="dob" required='required' placeholder="Choose your date of birth">
  </div>
  <div class="form-group">
    <label for="specialty">Area of expertise</label>
    <select multiple class="form-control" id="specialty" value="<?php echo $attendee['specialty_name'] ?>" required='required' name="specialty">
      <?php
      while($r = $results->fetch(PDO::FETCH_ASSOC))
      {?>
      <option value="<?php echo $r['specialty_id'] ?>" <?php
      if($r['specialty_id'] == $attendee['specialty_id']){
          echo "selected";
      }
      ?>> 
        <?php
        echo $r['specialty_name'];
        ?>
      </option>
      <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="dob">email</label>
    <input type="email" class="form-control" id="email" value="<?php echo $attendee['email']; ?>" name="email" required='required' placeholder="Type in your email">
  </div>
  <div class="form-group">
    <label for="contact">Contact</label>
    <input type="text" class="form-control" id="contact" value="<?php echo $attendee['contact'] ?>" name="contact" required='required' placeholder="Type in your contact details">
  </div>
  <button class="btn btn-success" type="submit" name="submit">Submit changes</button>
</form>

      <?php  } ?>

<?php
require_once './inc/footer.php'
?>