<?php
require_once("header_links.php");
?>

<body data-spy="scroll" data-target="#navbar-nav-header" class="static-layout">
    <div class="boxed-page">
        <nav id="gtco-header-navbar" class="navbar navbar-expand-lg py-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <span class="lnr lnr-moon"></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-nav-header">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Back to Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contact Form Section -->
        <section id="gtco-contact-form" class="bg-white">
            <div class="container">
                <div class="section-content">
                    <!-- Section Title -->
                    <div class="title-wrap">
                        <h2 class="section-title">Your voice matters</h2>
                        <p class="section-sub-title">Use our complaints form to speak up about<br> any cleanliness concerns you encounter at food service providers.<br> Your feedback can drive positive change in our community's dining experiences.
                        </p>

                    </div>
                    <!-- End of Section Title -->
                    <div class="row">
                        <!-- Contact Form Holder -->
                        <div class="col-md-8 offset-md-2 contact-form-holder mt-4">
                            <form method="post" name="contact" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-6 form-input">
                                        <input type="text" class="form-control" id="providers_name" name="providers_name" placeholder="provider_name">
                                    </div>
                                    <div class="col-md-12 form-textarea">
                                        <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                                    </div>
                                    <p style="margin-left: 14px;">Provide Us with some images *if you can</p>
                                    <div class="col-md-12 form-upload">
                                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" />
                                    </div>

                                    <div style="margin-top: 30px;" class="col-md-12 form-btn text-center">
                                        <button class="btn btn-block btn-secondary btn-red" type="submit" name="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                require_once('config.php');
                                $complaint_name = $_POST['name'];
                                $complaint_email = $_POST['email'];
                                $complaint_provider = $_POST['providers_name'];
                                $complaint_message = $_POST['message'];

                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Check if a file was uploaded without errors
                                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                                        $upload_dir = "uploads/"; // Specify the directory where you want to store the uploaded images
                                        $original_filename = basename($_FILES["image"]["name"]);

                                        // Generate a unique filename by appending a timestamp
                                        $timestamp = time(); // You can use a more elaborate method for unique identifiers if needed
                                        $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION); // Get the file extension
                                        $new_filename = $timestamp . '_' . uniqid() . '.' . $file_extension;

                                        $upload_file = $upload_dir . $new_filename;

                                        // Check if the file already exists
                                        if (file_exists($upload_file)) {
                                            echo "A file with the same name already exists. Please choose a different file name.";
                                        } else {
                                            // Move the uploaded file to the specified directory with the new filename
                                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_file)) {
                                                echo "Your message was sent, thank you!";
                                            } else {
                                                echo "Error uploading the image.";
                                            }
                                        }
                                    } else {
                                        echo "Invalid file or no file uploaded.";
                                    }
                                }

                                $complaint_message_replace = str_replace("'", "''", $complaint_message);
                                $sql = "INSERT INTO complaints (complaint_name, complaint_email, complaint_provider, complaint_message, image_filename) VALUES ('$complaint_name', '$complaint_email', '$complaint_provider', '$complaint_message_replace', '$new_filename')";
                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    echo "Error: " . mysqli_error($conn);
                                }

                                mysqli_close($conn);
                                echo '<div id="form-message-success">Your message was sent, thank you!</div>';
                            }
                            ?>




                        </div>
                        <!-- End of Contact Form Holder -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Contact Form Section -->


        <?php
        require_once("footer.php");
