<?php
require_once('app_nav.php');
require_once('nav.php');
?>

<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Evaluate Provider</h2>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <form name="News" id="add_ne" action="#" method="POST">
                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <td><label>Do employees wear uniforms?</label></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="uniform" value="true">Yes
                                        <input class="form-check-input" type="radio" name="uniform" value="false">No
                                    </td>
                                    <td>
                                        <pre> *</pre>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Do employees wear masks?</label></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="masks" value="true">Yes
                                        <input class="form-check-input" type="radio" name="masks" value="false">No
                                    </td>
                                    <td>
                                        <pre> *</pre>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Do employees wear gloves?</label></td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="gloves" value="true">Yes
                                        <input class="form-check-input" type="radio" name="gloves" value="false">No
                                    </td>
                                    <td>
                                        <pre> *</pre>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>Do you have any comments about the service provider</label></td>
                                    <td><textarea name="commints" id="editor"></textarea>
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
                                    <td><label>Give the service providers a score out of 100</label></td>
                                    <td><input type="number" class="form-control" name="score">
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="btn btn-success" type="submit" value="Add" name="add_evaluate">
                                        <a href="./evaluate.php" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </form>
                    <?php
                     if (isset($_POST['add_evaluate'])) {
                        require_once('../config.php');
                        $id = $_GET['val'];
                        $name = $_GET['val2'];
                        $uniform = $_POST['uniform'];
                        $masks = $_POST['masks'];
                        $gloves = $_POST['gloves'];
                        $commints = $_POST['commints'];
                        $commintsr = str_replace("'", "''", $commints);
                        $score = $_POST['score'];
                        $sql = "INSERT INTO `supervision` (`provider_id`,`provider_name`,`uniform`, `masks`, `gloves`, `commints`, `score`)
                                VALUES ('$id','$name','$uniform', '$masks', '$gloves', '$commintsr', '$score')";
                        $result = mysqli_query($conn, $sql);

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
