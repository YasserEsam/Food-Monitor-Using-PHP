<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Providers</h1>
    </div>
    <h2>Evaluate Providers</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Location</th>
                    <th scope="col">Image</th>
                    <th scope="col">Evaluate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "select * from providers order by provider_id desc";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Erorr");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['provider_id'];
                    $name = $row['provider_name'];
                    $phone = $row['provider_phone'];
                    $location = $row['provider_location'];
                    $image = $row['provider_image'];
                    echo "
                    <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$phone</td>
                    <td>$location</td>
                    <td><img src='../uploads/$image' alt='Profile' height='70px' width='90px'></td>
                    <td><a href='./evaluate_provider.php?val=$id&val2=$name' class='btn btn-info'>Evaluate</a></td>
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