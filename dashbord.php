<?php
session_start();

    if(!isset($_SESSION['user']))
    {
            header('location:login');
    }

include 'inc/db.php';
include 'inc/Header.php';
include 'inc/MainNav.php';
?>

<?php


if (isset($_POST['submitBtn'])) {
    $img = $_FILES['img']['name'];
    $file_extwnsion = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    // $opt=rand()
    $user=$_SESSION['user'];
    $q="select * from user where username='$user'";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
        $data=mysqli_fetch_assoc($run_query);
        $e=$data['name'];
          
    $newName = time() . "." . $file_extwnsion;
    $q = "insert into pro(image,user) values('$newName','$e')";

    $run_query = mysqli_query($conn, $q);
    if ($run_query) {
        move_uploaded_file($_FILES['img']['tmp_name'], "upload/post/" . $newName);
        echo '<script>
                    
                    alert("data has been inserted");
                    </script>';
    }
    
}
else{
    echo '<script>
                    
    alert("SOmething went wrong");
    </script>';
}
}

?>


<!-- <table>
                <form method="post" enctype="multipart/form-data">
                    <tr>
                        <td>upload a image</td>
                        <td><input type="file" name="img" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="submitBtn">Submit</button></td>
                    </tr>
                </form>
            </table> -->

<div class="container io d-flex mt-4 py-5 bg-io justify-content-center align-items-center">

    <div class="form-group x py-3">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3 d-flex ">
                <input type="file" name="img" class="form-control mx-3">
                <button name="submitBtn" class="btn btn-danger">Upload</button>
            </div>
        </form>
    </div>
</div>
<div class="container mt-4">
    <h1 class="text-center text-light">Latest Images</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">



       <?php
       $user=$_SESSION['user'];
       $q="select * from user where username='$user'";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
        $data=mysqli_fetch_assoc($run_query);
        $e=$data['name'];
   
                $q="select * from pro where user='$e' order by created_at desc ";
                $run_query=mysqli_query($conn,$q);
                if(mysqli_num_rows($run_query)>0)
                {
                    while($row=mysqli_fetch_assoc($run_query))
                    {

              
                            ?>
                            <div class="col-sm-3 m-3">
            <div class="card " style="width: 18rem;">
                <img src="upload/post/<?php echo $row['image'] ?>" class="card-img-top w-100" style="width: 200px; height: 200px;" alt="...">
               
                <div class="card-footer d-flex justify-content-end">
                    <p class=""><?php echo $row['created_at'] ?></p>
                </div>
            
            </div>
        </div>
                            
                            <?php
                                  }
                }
                else{
                        ?>
                        <h2 class="text-center text-light">No Data</h2>
                        <?php
                }
            }
       ?>




    </div>
</div>
<?php
include 'inc/Footer.php';
?>