<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Tackels Fix</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <?php
                    if(isset($_POST['logoutBtn']))
                    {
                        unset($_SESSION['user']);
                        session_destroy();
                        header('location:login.php');
                    }
            ?>

            <form  method="post">
                <button name="logoutBtn" class="btn  btn-sm">logout &raquo;</button>
            </form>
        </li>
      
      </ul>
   
    </div>
  </div>
</nav>