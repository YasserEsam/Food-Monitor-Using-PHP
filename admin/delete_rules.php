<?php
$id = $_GET['val'];
require_once('../config.php');
$sql = "delete from rules where rule_id = '$id'";
$result = mysqli_query($conn,$sql);
if(!$result){
    echo "Delete Error" . mysqli_error($conn);
}
header('Location:rules.php');
mysqli_close($conn);
?>