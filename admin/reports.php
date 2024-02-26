<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Reports</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Provider id</th>
                    <th scope="col">Provider Name</th>
                    <th scope="col">Uniform</th>
                    <th scope="col">Masks</th>
                    <th scope="col">Gloves</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Score</th>
                    <th scope="col">Prinrable Report</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "select * from supervision order by supervision_id desc";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Error: " . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['supervision_id'];
                    $p_id = $row['provider_id'];
                    $name = $row['provider_name'];
                    $uniform = $row['uniform'];
                    $masks = $row['masks'];
                    $gloves = $row['gloves'];
                    $commints = $row['commints'];
                    $score = $row['score'];
                    echo "
                    <tr>
                      <td>$id</td>
                      <td>$p_id</td>
                      <td>$name</td>
                      <td>$uniform</td>
                      <td>$masks</td>
                      <td>$gloves</td>
                      <td>$commints</td>
                      <td>$score %</td>
                      <td><a href='./form_to_print.php?val=$p_id' class='btn btn-primary'>Print Report</a></td>

                    </tr>
                    ";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for image expansion -->
    <div class="modal" id="imageModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <img id="expandedImage" alt="Expanded Image">
        </div>
    </div>

</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>


