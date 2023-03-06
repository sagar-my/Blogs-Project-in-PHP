<?php
session_start();
include 'inc/db.php';
include 'inc/Header.php';

include 'inc/MainNav.php';
?>

    <?php
                if(isset($_POST['registerBtn']))
                {
                        $name=mysqli_real_escape_string($conn,$_POST['name']);
                        $username=mysqli_real_escape_string($conn,$_POST['username']);
                        $password=mysqli_real_escape_string($conn,$_POST['password']);

                        if($name=='' || $username=='' || $password=='')
                        {
                           $_SESSION['msg']="fill all feild";
                           $_SESSION['class']="danger";     
                        }
                        else{
                            $q="select * from user where username='$username'";
                            $run_query=mysqli_query($conn,$q);
                            if(mysqli_num_rows($run_query)>0)
                            {
                                $_SESSION['msg']="You are Already exist";
                                $_SESSION['class']="warning";
                            }
                            else{
                                    $pass_hash=password_hash($password,PASSWORD_BCRYPT);

                                $q="INSERT INTO `user`( `name`, `username`, `password`) VALUES ('$name','$username','$pass_hash')";
                                $run_query=mysqli_query($conn,$q);
                                if($run_query)
                                {
                                    $_SESSION['msg']="Register successfully";
                                    $_SESSION['class']="primary";
                                }
                                else{
                                    $_SESSION['msg']="Technical issue";
                                    $_SESSION['class']="danger";
                                }
                            }
                        }

                }
    ?>


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

            <div class="col-sm-4">
                <form method="post" class="form-control">
                <div class="mb-3  py-3" style="background-color: #f22279;">
                    <h1 class="text-center text-light ">Register Form</h1>
                    </div>
                    <div class="mb-3">
                    <?php
                if(isset($_SESSION['msg']) && $_SESSION['msg']!='')
                {
                    ?>
                          <div class="alert alert-<?=$_SESSION['class']?>" role="alert">
                        <?=$_SESSION['msg']?>
</div>
                    <?php
                    unset($_SESSION['msg']);
                    unset($_SESSION['class']);
                }
?>
                    </div>
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" class="form-control"  name="username">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" name="registerBtn">Register</button>
                    </div>
                    <div class="mb-3">
                        <a href="login.php" class="nav-link text-center">Already Have An account &rarr;</a>
                    </div>
                </form>
            </div>

</div>

<?php
include 'inc/Footer.php';
?>