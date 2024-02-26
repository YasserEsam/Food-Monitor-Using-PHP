<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="text-center pt-5">provider Reprots</h1>
                <table class="table table-bordered pt-5">
                    <thead>
                        <tr>
                            <th>Provider id</th>
                            <th>provider Name</th>
                            <th>Uniform</th>
                            <th>Masks</th>
                            <th>Gloves</th>
                            <th>Comments</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../config.php");
                        $id = $_GET['val'];
                        $sql = "select * from supervision where provider_id = $id";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $row['provider_name'] ?></td>
                            <td><?php echo $row['uniform'] ?></td>
                            <td><?php echo $row['masks'] ?></td>
                            <td><?php echo $row['gloves'] ?></td>
                            <td><?php echo $row['commints'] ?></td>
                            <td><?php echo $row['score'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center">
                        <button onclick="window.print()" class="btn btn-primary"> Print </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>