<?php
require_once("header.php");
?>


<section id="gtco-blog" class="bg-grey">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap mb-5">
                <h2 class="section-title">Provider's<b>     Reports</b></h2>
                <p class="section-sub-title">This page containes all Selected food service Providers Reports</p>
            </div>
            <div class="table-responsive">
    <table class="table table-striped table-sm" style=" background-color: white;">
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
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('config.php');
            $p_id = $_GET['val'];
            $sql = "select * from supervision where provider_id = $p_id";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Selected Error: " . mysqli_error($conn));
            }
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>$count</td>";
                echo "<td>$p_id</td>";
                echo "<td>" . $row['provider_name'] . "</td>";
                echo "<td>" . $row['uniform'] . "</td>";
                echo "<td>" . $row['masks'] . "</td>";
                echo "<td>" . $row['gloves'] . "</td>";
                echo "<td>" . $row['commints'] . "</td>";
                echo "<td>" . $row['score'] . " %</td>";
                echo "</tr>";
                $count++;
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
        </div>
    </div>
</section>



<?php
require_once("footer.php");
