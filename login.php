<?php 

$title = "Login to user";
$page_topic = "Login";
require_once './inc/header.php';
require_once './db/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password.$username);

    $result = $user->getUser($username,$password);
    if(!$result){
        echo '<div class ="text-danger">Sorry you entered the wrong password.</div>';
    }
    else{
        $_SESSION['username'] = $username;
        $_SESSIONID = $result['id'];
        header("Location: viewrecords.php");
    }
}

?>

<h1 class = "text-center"><?php echo $page_topic ?></h1>
<form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "post">
<table classs= "table table-sm">
<tr>
<td><label for "username">Username: *</label>
</td>
<td><input type="text" name="username" class="form-control" id="username" 
value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"></td>
</tr>
<tr>
<td><label for ="password">Password:* </label></td>
<td><input type ="password" name="password" class="form-control" id="password"></td>
<?php if(empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>"; ?>
</td>
</tr>
</table>
<br/><br/>
<input type="submit" value"Login" class="btn btn-primary btn-block"><br/>
<a href="#">Forgot password</a>
</form><br/><br/><br/><br/>

<?php include_once 'inc/footer.php'; ?>
