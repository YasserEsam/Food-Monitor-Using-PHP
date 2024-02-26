<section id="gtco-pricing" class="bg-grey">
    <div class="container">
        <div class="section-content">
            <!-- Section Title -->
            <div class="title-wrap">
                <h2 class="section-title">Government Rules</h2>
                <p class="section-sub-title">In the realm of ensuring the highest standards of public health and safety,<br> government regulations play a pivotal role. </p>
            </div>
            <!-- End of Section Title -->
            <?php
            require_once("config.php");
            $sql = "select * from rules order by rule_id desc";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Selected Error");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $rule_id = $row['rule_id'];
                $rule_name = $row['rule_name'];
                $rule_content = $row['rule_content'];
                $rule_date = $row['rule_date'];
                $rule_resourse = $row['rule_resourse'];
                echo "
                    <div style='margin-top: 25px;' class='card-deck mb-12 text-center col-md-12'>
                         <div class='price-box card mb-12 box-shadow'>
                           <div class='card-header p-4'>
                            <h6 class='mb-0 text-red font-weight-bold'>Rule Number $rule_id</h6>
                              <h2 class='display-4 p-2 mb-0 font-weight-bold'>$rule_name
                              </h2>
                             <p class='mb-0'>Rule Subject</p>
                      </div>
                                     <div class='card-body p-4'>
                       <ul class='price-box-list list-unstyled mt-3 mb-4'>
                           <p>$rule_content</p>
                     </ul>
                        <h2 class='card-title pricing-card-title mb-0 font-weight-bold'>$rule_date</h2>
                      <p>$rule_resourse</p>
                  <a href='#' class='btn btn-block btn-secondary btn-red mt-4'>Go To Main Government Page</a>
                </div>
                 </div>
                </div>
                    ";
            }
            ?>



        </div>
    </div>
    <!-- /END PRICING -->