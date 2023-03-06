<nav class="navbar navbar-expand-lg text-light">
  <div class="container-fluid">
    <a class="navbar-brand bg text-light" href="#">Tackels Fix</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-light">
        <li class="nav-item text-light">
          <a class="nav-link active  text-light" aria-current="page" href="index">Home</a>
        </li>
        <?php

    if(isset($_SESSION['user']))
    {
          ?>
           <?php
                    if(isset($_POST['logoutBtn']))
                    {
                        unset($_SESSION['user']);
                        session_destroy();
                        header('location:login.php');
                    }
            ?>
              <li class="nav-item">
              <a  href="profile" class="nav-link text-light">Profile</a>
      
           
              </li>
            <li class="nav-item">
            <button  onclick="window.location.href='dashbord'" class="btn btn-outline-primary mx-2 mt-2 px-3 btn-sm">Dashboard</button>
    
         
            </li>
          <li class="nav-item">
            <form action="" method="post">
            <button  name="logoutBtn" class="btn btn-outline-success mx-2 mt-2 px-3 btn-sm">Logout</button>
            </form>
        </li>
          <?php
    }else{
      ?>
        <li class="nav-item">
            <button  onclick="window.location.href='register'" class="btn btn-outline-success mx-2 mt-2 px-3 btn-sm">Register</button>
        </li>
        <li class="nav-item">            
            <button onclick="window.location.href='login'" class="btn btn-outline-danger mx-2 mt-2 px-3 btn-sm">Login</button>

        </li>
      <?php
    }

        ?>
      
      </ul>
     
    </div>
  </div>
</nav>
