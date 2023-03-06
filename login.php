<?php
session_start();
include 'inc/db.php';
include 'inc/Header.php';


include 'inc/MainNav.php';
?>
    <?php
                    if(isset($_POST['loginBtn']))
                    {
                        $username=mysqli_real_escape_string($conn,$_POST['username']);
                        $password=mysqli_real_escape_string($conn,$_POST['password']);
                        if($username=='' || $password=='')
                        {
                            $_SESSION['msg']="fill all feild";
                            $_SESSION['class']="danger"; 
                        }
                        else{
                            $q="select * from user where username='$username'";
                            $run_query=mysqli_query($conn,$q);
                           if(mysqli_num_rows($run_query)==1)
                           {
                            $data=mysqli_fetch_assoc($run_query);
                            $password_db=$data['password'];
                            $pass_verify=password_verify($password,$password_db);
                            if($pass_verify)
                            {
                                $_SESSION['user']=$username;
                                header('location:dashbord');
                            }
                            else{
                                $_SESSION['msg']="Invalid Credential";
                                $_SESSION['class']="danger";
                            }
                           }
                           else{
                            $_SESSION['msg']="Invalid Credential";
                            $_SESSION['class']="danger";
                           }
                            // if()
                        }
                    }
    ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

            <div class="col-sm-4">
                <form method="post" class="form-control">
                <div class="mb-3  py-3" style="background-color: #ff9717;">
                    <h1 class="text-center text-light ">Login Form</h1>
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
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" >
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input  type="password" class="form-control" name="password" >
                    </div>
                    <div class="mb-3">
                        <button name="loginBtn" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="mb-3">
                        <a href="register.php" class="nav-link text-center">Don't Have Account &rarr;</a>
                    </div>
                </form>
            </div>

</div>

<?php
include 'inc/Footer.php';
?>