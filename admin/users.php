<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <a href="./add_user.php" class="btn btn-primary">Add New User</a>
    </div>
    <h2>Manage Users</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "select * from Users order by user_id";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['user_id'];
                    $name = $row['user_name'];
                    $email = $row['user_email'];
                    $password = $row['user_password'];
                    $type = $row['user_type'];
                    $phone = $row['user_phone'];
                    echo "
                    <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$password</td>
                    <td>$type</td>
                    <td>$phone</td>
                    <td><a href='./edit_user.php?val=$id' class='btn btn-info'>Edit</a></td>
                    <td><a href='./delete_user.php?val=$id' class='btn btn-danger'>Delete</a></td>
                    </tr>
                    ";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>