<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Add New Rule</h2>
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
                                    <td><input class="form-control" id="name" type="text" name="rule_name"></td>
                                </tr>
                                <tr>
                                    <td><label>Content</label></td>
                                    <td><textarea name="rule_content" id="editor"></textarea name="">
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
                                    <td><label>Date:</label></td>
                                    <td><input class="form-control" id="date" type="datetime-local" name="rule_date">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-label">Resourse:</label></td>
                                    <td><input class="form-control" id="Resourse" type="text" name="rule_resourse"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    <input class="btn btn-success" type="submit" value="Add" name="add_rule">
                                    <a href="./rules.php" class="btn btn-danger">Cancel</a>
                                    <a href="./rules.php" class="btn btn-success">Back</a>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['add_rule'])){
                        require_once('../config.php');
                            $name = $_POST['rule_name'];
                            $content = $_POST['rule_content'];
                            $contentr = str_replace("'", "''", "$content");
                            $date = $_POST['rule_date'];
                            $resourse = $_POST['rule_resourse'];
                            
                            $sql = "INSERT INTO `rules` (`rule_name`, `rule_content`, `rule_date`, `rule_resourse`)
                                VALUES ('$name', '$contentr', '$date', '$resourse')";
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