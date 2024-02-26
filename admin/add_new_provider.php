<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Add Provider</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <form name="News" id="add_ne" action="#" method="POST" enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td><label class="form-label">Provider Name:</label></td>
                                    <td><input class="form-control" id="name" type="text" name="provider_name"></td>
                                </tr>
                                <tr>
                                    <td><label>provider phone</label></td>
                                    <td><input class="form-control" id="phone" name="provider_phone">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Provider Location</label></td>
                                    <td><textarea name="provider_location" id="editor"></textarea name="">
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
                                    <td>Uplode Provider Image:</td>
                                    <td><label id="format"><input class="form-control" type="file" name="provider_image">
                                        The allowed formats here are (jpg,png,svg)</label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <input class="btn btn-success" type="submit" value="Add" name="add_provider">
                                    <a href="./providers.php" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            </table>
                           
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['add_provider'])) {
                        require_once('../config.php');
                        $name = $_POST['provider_name'];
                        $phone = $_POST['provider_phone'];
                        $location = $_POST['provider_location'];
                        $locationr = str_replace("'", "''", "$location");
                        $folder = "../uploads/";
                        $img = $_FILES['provider_image']['name'];
                        $tmp = $_FILES['provider_image']['tmp_name'];
                        $sql = "INSERT INTO `providers` (`provider_name`, `provider_phone`, `provider_location`, `provider_image`)
                                VALUES ('$name', '$phone', '$locationr', '$img')";
                        $result = mysqli_query($conn, $sql);
                        move_uploaded_file($tmp, $folder . $img);
                        if (!$result) {
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