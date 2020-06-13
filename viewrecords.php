<?php 

$title = "All Records";
$page_topic = "All records";
require_once './inc/header.php';
require_once './db/conn.php';

$results = $crud->getAttendees();

?>

<table class="table">
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Specialty ID</th>
        <th>Actions</th>
    </tr>
    <?php 
    while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
        <td>
            <?php
            echo $r['user_id'];
            ?>
        </td>
        <td>
        <?php
            echo $r['first_name'];
            ?>
        </td>
        <td>
        <?php
            echo $r['last_name'];
            ?>
        </td>
        <td>
        <?php
            echo $r['specialty_name'];
            ?>
        </td>
        <td>
        <a class="btn btn-primary" href="view.php?id=<?php
            echo $r['user_id'];
            ?>">View</a>
        </td>
        <td>
        <a class="btn btn-warning" href="edit.php?id=<?php
            echo $r['user_id'];
            ?>">Edit</a>
        </td>
        <td>
        <a class="btn btn-danger" href="delete.php?id=<?php
            echo $r['user_id'];
            ?>">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>

<br>
<br>


<?php
require_once './inc/footer.php'
?>