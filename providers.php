<?php
require_once("header.php");
?>


<section id="gtco-blog" class="bg-grey">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap mb-5">
                <h2 class="section-title">Service <b>Providers</b></h2>
                <p class="section-sub-title">This page containes all food service Providers in Sana'a</p>
            </div>
            <?php
            require_once("search.php");
            ?>
            <div class="row">
                <!-- Blog -->

                <div class="col-md-12 blog-holder">
                    <div class="row">

                        <?php
                        require_once("config.php");
                        $sql = "select * from providers order by provider_id desc";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            die("Selected Error");
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["provider_id"];
                            $provider_name = $row['provider_name'];
                            $provider_phone = $row['provider_phone'];
                            $provider_location = $row['provider_location'];
                            $provider_image = $row['provider_image'];

                            echo "
                            <!-- Blog Item -->
                        <div class='col-md-4 blog-item-wrapper'>
                            <div class='blog-item'>
                                <div class='blog-img'>
                                    <a href='single.html'><img src='uploads/$provider_image' alt=''></a>
                                </div>
                                <div class='blog-text'>
                                  
                                    <div class='blog-title'>
                                        <a href='single.html'>
                                            <h4>$provider_name</h4>
                                        </a>
                                    </div>
                                    <div class='blog-meta'>
                                        <p class='blog-comment'><a href=''>+967 </a></p>
                                        <p class='blog-date'>$provider_phone</p> 
                                    </div>
                                    <div class='blog-desc'>
                                        <p>$provider_location</p>
                                    </div>
                                    <div class='blog-author'>
                                    <a href='single_page_report.php?val=$id' class='btn btn-block btn-secondary btn-red mt-4'>Report Details</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- End of Blog Item -->
                            ";
                        }
                        ?>

                    </div>
                </div>
                <!-- End of Blog -->
            </div>
        </div>
    </div>
</section>



<?php
require_once("footer.php");
