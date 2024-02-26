<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Edit User</h2>
    <hr>
    <?php
    if (isset($_GET['val'])) {
        $id = $_GET['val'];
        require_once('../config.php');
        $sql = "select * from users where user_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Selected Erorr" . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form name="users" id="add_ne" action="" method="POST">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td><label class="form-label">Name:</label></td>
                            <td><input class="form-control" id="name" type="text" name="user_name" value="<?php echo $row['user_name']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><textarea name="user_email" id="editor"><?php echo $row['user_email']; ?></textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Password:</label></td>
                            <td><input class="form-control" id="password" type="text" name="user_password" value="<?php echo $row['user_password']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label>User Type:</label></td>
                            <td><input class="form-control" id="type" type="text" name="user_type" value="<?php echo $row['user_type']; ?>"></td>
                        </tr>


                        <tr>
                            <td><label class="form-label">Phone Number:</label></td>
                            <td><input class="form-control" id="phone" type="tel" name="user_phone" value="<?php echo $row['user_phone']; ?>"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-success" type="submit" value="Update" name="edit_user">
                                <a href="./users.php" class="btn btn-danger">Cancel</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
    <?php
        }
    }
    ?>
    <?php

    if (isset($_POST['edit_user'])) {
        require_once('../config.php');

        $id = $_GET['val']; // Retrieve the ID
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $type = $_POST['user_type'];
        $phone = $_POST['user_phone'];

        $sql = "UPDATE `users` SET `user_name` = '$name', `user_email` = '$email', 
            `user_password` = '$password',`user_type` = '$type', `user_phone` = '$phone' WHERE `users`.`user_id` = $id";

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