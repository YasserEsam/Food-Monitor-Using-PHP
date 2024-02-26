<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <h2>Edit Rules</h2>
    <hr>
<?php
                if(isset($_GET['val'])){
                $id = $_GET['val'];
                require_once('../config.php');
                $sql = "select * from rules where rule_id = '$id'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr" . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
    <form name="Rules" id="add_ne" action="" method="POST">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td><label class="form-label">Name:</label></td>
                    <td><input class="form-control" id="name" type="text" 
                    name="rule_name" value="<?php echo $row['rule_name']; ?>"></td>
                </tr>
                <tr>
                    <td><label>Content:</label></td>
                    <td><textarea name="rule_content" id="editor"><?php echo $row['rule_content']; ?></textarea>
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
                    <td><input class="form-control" id="date" type="datetime-local"
                    name="rule_date" value="<?php echo $row['rule_date']; ?>"></td>
                </tr>
                <tr>
                    <td><label class="form-label">Resourse:</label></td>
                    <td><input class="form-control" id="resourse" type="text" 
                    name="rule_resourse" value="<?php echo $row['rule_resourse']; ?>"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                    <input class="btn btn-success" type="submit" value="Update" name="edit_rule">
                    <a href="./rules.php" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
<?php
        }}
?>
<?php
   
    if (isset($_POST['edit_rule'])) {
        require_once('../config.php');
        
        $id = $_GET['val']; // Retrieve the ID
        $name = $_POST['rule_name'];
        $content = $_POST['rule_content'];
        $date = $_POST['rule_date'];
        $resourse = $_POST['rule_resourse'];
        
        $sql = "UPDATE `rules` SET `rule_name` = '$name', `rule_content` = '$content', 
            `rule_date` = '$date', `rule_resourse` = '$resourse' WHERE `rules`.`rule_id` = $id";
        
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