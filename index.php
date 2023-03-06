<?php
session_start();


include 'inc/db.php';
include 'inc/Header.php';
include 'inc/MainNav.php';
?>
<div class="manageClass">
    <div class="container">
        <div class="form-group ">
            <div class="row col-sm-12">
                <div class="d-flex justify-content-center align-items-center mh">
                    <div class="mb-3 col-sm-5">
                        <input type="search" class="form-control py-2" placeholder="Search images..">
                    </div>
                    <div class="mb-3 col-sm-2">
                        <button class="btn btn-warning py-2"><i class="fa fa-search"></i></button>
                    </div>
                    
                </div>
              
                
            </div>
        </div>





    </div>
</div>
<div class="container mt-4">
    <h1 class="text-light">Latest Images</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">



        <?php
        $q = "select * from pro order by created_at desc limit 3 ";
        $run_query = mysqli_query($conn, $q);
        if (mysqli_num_rows($run_query) > 0) {
            // print_r(mysqli_num_rows($run_query));
            while ($row = mysqli_fetch_assoc($run_query)) {
                // print_r($row);
        ?>
                <div class="col-sm-3 m-3">
                    <div class="card " style="width: 18rem;">
                        <img src="upload/post/<?php echo $row['image'] ?>" class="card-img-top w-100" style="width: 200px; height: 200px;" alt="...">
                        <div class="card-footer d-flex justify-content-end">
                            <div class="row">
                                <p class="text-start">
                                    <?php
                                    $sar = $row['user'];
                                    echo "@" . str_replace("@gmail.com", " ", $sar);
                                    ?>
                                </p>
                                <div class=" d-flex">
                                    <p class=""><?php
                                                $s = $row['created_at'];
                                                $d = explode(" ", $s);
                                                // print_r($d[0]);
                                                $f = $d[0];
                                                $s = explode("-", $f);
                                                $e = $s[2] . "-" . $s[1] . "-" . $s[0];
                                                echo $e . " __ "; ?></p>
                                    <p>
                                    <p class=""><?php
                                                $s = $row['created_at'];
                                                $d = explode(" ", $s);
                                                // print_r($d[0]);
                                                $f = $d[1];
                                                echo " " . $f; ?></p>
                                    </p>
                                </div>
                                <p class="card-footer">
                                    <a href="upload/post/<?php echo $row['image'] ?>" download="<?php echo $row['image'] ?>" class="btn btn-primary">download <i class="fa fa-cloud-download"></i> </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            }
        } else {
            ?>
            <h2 class="text-center text-light">No Data</h2>
        <?php
        }
        ?>




    </div>
</div>
<div class="container mt-4">
    <h1 class=" text-light">All Popular Images</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">



        <?php
        $q = "select * from pro order by created_at asc ";
        $run_query = mysqli_query($conn, $q);
        if (mysqli_num_rows($run_query) > 0) {
            // print_r(mysqli_num_rows($run_query));
            while ($row = mysqli_fetch_assoc($run_query)) {
                // print_r($row);
        ?>
                <div class="col-sm-3 m-3">
                    <div class="card " style="width: 18rem;">
                        <img src="upload/post/<?php echo $row['image'] ?>" class="card-img-top w-100" style="width: 200px; height: 200px;" alt="...">
                        <div class="card-footer d-flex justify-content-end">
                            <div class="row">
                                <p class="text-start">
                                    <?php
                                    $sar = $row['user'];
                                    echo "@" . str_replace("@gmail.com", " ", $sar);

                                    ?>
                                </p>
                                <div class=" d-flex">
                                    <p class=""><?php
                                                $s = $row['created_at'];
                                                $d = explode(" ", $s);
                                                // print_r($d[0]);
                                                $f = $d[0];
                                                $s = explode("-", $f);
                                                $e = $s[2] . "-" . $s[1] . "-" . $s[0];
                                                echo $e . " __ "; ?></p>
                                    <p>
                                    <p class=""><?php
                                                $s = $row['created_at'];
                                                $d = explode(" ", $s);
                                                // print_r($d[0]);
                                                $f = $d[1];
                                                echo " " . $f; ?></p>
                                    </p>
                                </div>
                                <p class="card-footer">
                                    <a href="upload/post/<?php echo $row['image'] ?>" download="<?php echo $row['image'] ?>" class="btn btn-primary">download <i class="fa fa-cloud-download"></i> </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            }
        } else {
            ?>
            <h2 class="text-center text-light">No Data</h2>
        <?php
        }
        ?>




    </div>
</div>
<?php

include 'inc/Footer.php';
?>