<?php
require_once('app_nav.php');
require_once('nav.php');
?>
<!-- main change -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 80px;">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">complaints</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Service Provider</th>
                    <th scope="col">The Problem</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../config.php');
                $sql = "select * from complaints order by complaint_id desc";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Selected Error: " . mysqli_error($conn));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['complaint_id'];
                    $name = $row['complaint_name'];
                    $email = $row['complaint_email'];
                    $provider = $row['complaint_provider'];
                    $message = $row['complaint_message'];
                    $image = $row['image_filename'];
                    echo "
                    <tr>
                      <td>$id</td>
                      <td>$name</td>
                      <td>$email</td>
                      <td>$provider</td>
                      <td>$message</td>
                      <td>
                        <img src='../uploads/$image' alt='Complaint Image' width='100' class='image-popup' data-modal-id='imageModal$id'>
                      </td>
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

    <script>
        // JavaScript to handle image expansion
        const imagePopups = document.querySelectorAll('.image-popup');

        imagePopups.forEach(imagePopup => {
            imagePopup.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-id');
                const modal = document.getElementById('imageModal');
                const expandedImage = document.getElementById('expandedImage');

                modal.style.display = 'block';
                expandedImage.src = this.src;

                document.getElementById('closeModal').addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            });
        });
    </script>
</main>
<!-- end main  -->
<?php
require_once('footer.php');
?>