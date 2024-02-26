<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rules</h1>
        <a href="./add_new_rule.php" class="btn btn-primary">Add New Rule</a>
    </div>
    <h2>Manage Rules</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">Resourse</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "select * from rules order by rule_id desc";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['rule_id'];
                    $name = $row['rule_name'];
                    $content = $row['rule_content'];
                    $date = $row['rule_date'];
                    $resourse = $row['rule_resourse'];
                    echo "
                    <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$content</td>
                    <td>$date</td>
                    <td>$resourse</td>
                    <td><a href='./edit_rules.php?val=$id' class='btn btn-info'>Edit</a></td>
                    <td><a href='./delete_rules.php?val=$id' class='btn btn-danger'>Delete</a></td>
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