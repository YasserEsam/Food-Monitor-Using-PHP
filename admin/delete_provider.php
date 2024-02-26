<?php
$provider_id = $_GET['val'];
require_once('../config.php');
$sql = "delete from providers where provider_id = '$provider_id'";
$exe = mysqli_query($conn,$sql);
if(!$exe){
    die('Error' . mysqli_error($conn));
}
header('location:providers.php');
mysqli_close($conn);
?>