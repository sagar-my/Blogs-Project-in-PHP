<?php
session_start();

    if(!isset($_SESSION['user']))
    {
            header('location:login');
    }

include 'inc/db.php';
include 'inc/Header.php';
include 'inc/MainNav.php';


$user=$_SESSION['user'];
    $q="select * from user where username='$user'";
    $run_query=mysqli_query($conn,$q);
    if(mysqli_num_rows($run_query)>0)
    {
        $data=mysqli_fetch_assoc($run_query);
    }
?>

<?php
            if(isset($_POST['updateBtn']))
            {
                    $image=mysqli_real_escape_string($conn,$_FILES['image']['name']);
                    $name=mysqli_real_escape_string($conn,$_POST['name']);
                    $username=mysqli_real_escape_string($conn,$_POST['username']);
                    if($username=='' || $name=='' )
                    {
                        echo '<script>
                    
                        alert("Feild can not empty");
                        </script>';
                    }
                    else{
                        if($image!=''){
                            $img_extennsion=pathinfo($image,PATHINFO_EXTENSION);
                            $arr=array('jpg','jpeg','png');
                            if(!in_array($img_extennsion,$arr))
                            {
                                echo '<script>
                    
                                alert("Upload valid extension image");
                                </script>';
                            }
                            else{
                                $newName=time().".".$img_extennsion;
                                $user=$_SESSION['user'];
                                $q="update user set name='$name',profile='$newName',username='$username' where username='$user'";
                                $run_query=mysqli_query($conn,$q);
                                if($run_query)
                                {
                                    $user=$_SESSION['user'];
                                    $q="select * from user where username='$user'";
                                    $run_query=mysqli_query($conn,$q);
                                    if(mysqli_num_rows($run_query)>0)
                                    {
                                        $data=mysqli_fetch_assoc($run_query);
                                     
                                                  if(file_exists("upload/user/".$data['profile']))
                                                  {
                                                    echo "yes";
                                                    unlink($data['profile']);
                                                  }
                                   
                                    }
                                    move_uploaded_file($_FILES['image']['tmp_name'], "upload/user/" . $newName);
                                    echo '<script>
                    
                                alert("Profile updated successfully");
                                </script>';
                                }
                            }
                        }
                        else{
                            $user=$_SESSION['user'];
                            $q="update user set name='$name',username='$username' where username='$user'";
                            $run_query=mysqli_query($conn,$q);
                            if($run_query)
                            {
                                echo '<script>
                
                            alert("Profile updated successfully");
                            </script>';
                            }
                        }
                    }
            }

?>


<div class="container">
   <form action="" method="post" enctype="multipart/form-data">
   <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            <img id="blah" src="<?php
                        if($data['profile']!='')
                        {
                        echo "upload/user/".$data['profile'];                        }
                        else{
                            echo "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png";
                        }
            ?>" alt="" style="height: 150px; width:150px; border-radius:50%">
        </div>
        <div class="col-sm-12  d-flex justify-content-center">
            <input type="file" id="image" name="image" id="">
        </div>
        <div class="form-control my-5">
            <div class="row">
            <div class="col-sm-12 d-flex my-3 justify-content-center">
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="<?=$data['name']?>" >
        </div>
        </div>
        <div class="col-sm-12 d-flex my-3 justify-content-center">
            <div class="col-sm-6">
                <input type="text" name="username" class="form-control" value="<?=$data['username']?>" >
        </div>
        </div>
        <div class="col-sm-12 d-flex my-3 justify-content-center">
            <button name="updateBtn" class="btn btn-warning">Update</button>
        </div>
            </div>
        </div>
    </div>
   </form>
</div>
<?php
include 'inc/Footer.php';
?>

<script>
    $("#image").change(function(e){
        const [file] = image.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
    })
    </script>