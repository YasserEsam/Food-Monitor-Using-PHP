<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Add New User</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <form name="Rules" id="add_ne" action="#" method="POST">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><label class="form-label">Name:</label></td>
                                    <td><input class="form-control" id="name" type="text" name="user_name"></td>
                                </tr>
                                <tr>
                                    <td><label>Email</label></td>
                                    <td><textarea name="user_email" id="editor"></textarea name="">
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
                                    <td><label>Password</label></td>
                                    <td><input class="form-control" id="password" type="text" name="user_password">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>User Type</label></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="type" value="admin">admin
                                        <input class="form-check-input" type="radio" name="type" value="user">user
                                    </td>
                                    <td>
                                        <pre> *</pre>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-label">Phone Number</label></td>
                                    <td><input class="form-control" id="phone" type="tel" name="user_phone"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <input class="btn btn-success" type="submit" value="Add" name="add_user">
                                    <a href="./users.php" class="btn btn-danger">Cancel</a>
                                    <a href="./users.php" class="btn btn-success">Back</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['add_user'])){
                        require_once('../config.php');
                            $name = $_POST['user_name'];
                            $email = $_POST['user_email'];
                            $type = $_POST['type'];
                            $password = $_POST['user_password'];
                            $phone = $_POST['user_phone'];
                            
                            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`,`user_type`,`user_phone`)
                                VALUES ('$name', '$email', '$password','$type', '$phone')";
                            $result = mysqli_query($conn,$sql);
                            if(!$result){
                                echo "Insert Error" . mysqli_error($conn);
                            }
                              mysqli_close($conn);
                    }
                    
                    
                    ?>  
                </div>
            </div> 
        </div>
    </div>  
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>