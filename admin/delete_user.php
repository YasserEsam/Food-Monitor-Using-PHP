<?php
$id = $_GET['val'];
require_once('../config.php');
$sql = "delete from users where user_id = '$id'";
$result = mysqli_query($conn,$sql);
if(!$result){
    echo "Delete Error" . mysqli_error($conn);
}
header('Location:users.php');
mysqli_close($conn);
?>