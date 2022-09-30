<?php

    $auth = isset($_SESSION['access_token']) || isset($_SESSION['id'])&&isset($_SESSION['username'])&&isset($_SESSION['email']);

    if(!$auth)
    {
        echo"<script> href.location = 'https://jntuacep.ac.in/placement_cell/index.php';</script>";
    }  
    else{
        echo"<script> location.href = 'https://jntuacep.ac.in/placement_cell/dashboard.php';</script>";
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Placement Cell - Jntuacep</title>
    <?php
        require_once 'components/links.php';
    ?>
</head>

<body>


<section id="navigation-virtualLabs">
    <div class="container">
        <div class="navigation-card">
        <a class="navbar-brand text-brand" href="#">Career<span class="color-b">Club</span></a>
        <div class="options">
        <a class="login-btn" href="login.php" >Sign In</a>
        </div>
        </div>
    </div>
</section>

<section id="virtualLabs-about">
    <div class="container">
        <div class="row">
        <div class="col-md-4">
                <img src="assets/img/virtual-labs-intro.svg" class="coding-image">
            </div>
            <div class="col-md-8 justify-content-end">
                <p class="moto">If oppurtunity doesn't knock , then build a door. Start building your profile</p>
                <div class="abouts">
                    <div class="theme-about">
                    <img src="assets/img/background-card.svg" alt="" width="250" height="250" style="position:absolute;z-index: -1;">
                        <p class="heading">Developed By</p>
                        <p>Cse Dept , Jawaharlal Nehru Technological University Anantapur College of Engineering, Pulivendula</p>
                            <br>
                        <a href="https://www.jntuacep.ac.in/departments/dept-of-cse/">Visit Once</a>
                    </div>
                    <div class="theme-about">
                    <p class="heading">For Students and Recruiters</p>
                    <p>Join and Start Building Your Profile and Showcase Your Skills. Let Companies Choose You.</p>
                        <br>
                        
                        <a class="login-btn"  href="login.php" >Sign In </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
  
  <footer>
    <div class="container">
        <p class="copy text-center">&copy; <?php echo date("Y");?> Jntuacep. All Rights Reserved | <a href="">Privacy Policy</a></p>
    </div>
  </footer>

</body>

</html>