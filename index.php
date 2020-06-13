<?php 

$title = "Attendance login";
$page_topic = "Login";
require_once './inc/header.php';
require_once './db/conn.php';

$results = $crud->getSpecialties();

?>

    <h1>
        <?php
        echo $page_topic;
        ?>
    </h1>

    <form method="post" action="success.php">
  <div class="form-group">
    <label for="firstname">First name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" required='required' placeholder="Enter your firstname here.">
  </div>
  <div class="form-group">
    <label for="lastname">Last name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" required='required' placeholder="Enter your lastname here.">
  </div>
  <div class="form-group">
    <label for="dob">Date of birth</label>
    <input type="date" class="form-control" id="dob" name="dob" required='required' placeholder="Choose your date of birth">
  </div>
  <div class="form-group">
    <label for="specialty">Area of expertise</label>
    <select multiple class="form-control" id="specialty" required='required' name="specialty">
      <?php
      while($r = $results->fetch(PDO::FETCH_ASSOC))
      {?>
      <option value="<?php echo $r['specialty_id'] ?>">
        <?php
        echo $r['specialty_name'];
        ?>
      </option>
      <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="dob">email</label>
    <input type="email" class="form-control" id="email" name="email" required='required' placeholder="Type in your email">
  </div>
  <div class="form-group">
    <label for="contact">Contact</label>
    <input type="text" class="form-control" id="contact" name="contact" required='required' placeholder="Type in your contact details">
  </div>
  <button class="btn btn-primary" type="submit" name="submit">Sign up</button>
</form>

<?php
require_once './inc/footer.php'
?>