<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Edit Provider</h2>
    <hr>
    <?php
    $provider_id = $_GET['val'];
    require_once('../config.php');
    $sql = "select * from providers where provider_id = '$provider_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Selected Erorr");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['provider_id'];
        $name = $row['provider_name'];
        $phone = $row['provider_phone'];
        $location = $row['provider_location'];
        $image = $row['provider_image'];
        echo "
        <form name='Provider' id='edit_provider' action='' method='POST' enctype='multipart/form-data'>
        <div class='table-responsive'>
            <table class='table'>
                <tr>
                    <td><label class='form-label'>Name:</label></td>
                    <td><input class='form-control' id='name' type='text' value='$name' name='provider_name'></td>
                </tr>
                <tr>
                    <td><label>Phone:</label></td>
                    <td><input class='form-control' id='phone' type='tel' value='$phone' name='provider_phone'>
                    </td>
                </tr>
                <tr>
                    <td><label>location:</label></td>
                    <td><input class='form-control' id='location' type='text' value='$location' name='provider_location'></td>
                </tr>
                <tr>
                    <td>Uplode Image:</td>
                    <td><img class='w-30 h-30 my-2' src='../uploads/$image'  height='230px'>
                        <label id='format'><input class='form-control' type='file' name='provider_uplode'>
                            The allowed formats here are (jpg,png,svg,jpeg)</label></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='provider_id' value = '$id'></td>
                    <td>
                        <input class='btn btn-success' type='submit' value='Save' name='save_edit'>
                        <a href='./providers.php' class='btn btn-danger'>Cancel</a>
                        <a href='./providers.php' class='btn btn-success'>Back</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
        ";
    }
    ?>
    <?php
    if (isset($_POST['save_edit'])) {
        require_once('../config.php');
        $id = $_POST['provider_id'];
        $name = $_POST['provider_name'];
        $phone = $_POST['provider_phone'];
        $location = $_POST['provider_location'];
        
        if (isset($_FILES['provider_uplode']) && !empty($_FILES['provider_uplode']['tmp_name'])) {
            $folder = "../uploads/";
            $img = $_FILES['provider_uplode']['name'];
            $tmp = $_FILES['provider_uplode']['tmp_name'];
            $sql = "UPDATE `providers` SET `provider_name` = '$name', `provider_phone` = '$phone', `provider_location` = '$location', `provider_image` = '$image'  WHERE `providers`.`provider_id` = $id";
            $result = mysqli_query($conn, $sql);
            move_uploaded_file($tmp, $folder . $image);
        } else {
            $sql = "UPDATE `providers` SET `provider_name` = '$name', `provider_phone` = '$phone', `provider_location` = '$location'  WHERE `providers`.`provider_id` = $id";
        }
        if (!$result = mysqli_query($conn, $sql)) {
            echo "Update Error" . mysqli_error($conn);
        } 

    }
    ?>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>