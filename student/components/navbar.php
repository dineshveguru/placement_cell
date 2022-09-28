<?php

$base_url = "https://jntuacep.ac.in/placement_cell/student";
?>


<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <br>
        <ul class="list-unstyled components d-flex justify-content-around">
            <li>
            <form action="<?php echo $base_url;?>/code.php" method="POST">
                    <button type="submit" name="logout" class="btn btn-outline-light px-4 py-1" style="cursor:pointer;"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGOUT</button></a>
                </form>
            </li>
               
       </ul>
            <ul class="list-unstyled components">
            <hr style="background-color:#8785a1 !important;">
            <li class="<?= (basename($_SERVER['PHP_SELF'])=="dashboard.php")?"active":""; ?>">
                    <a href="<?php echo $base_url;?>/dashboard"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;HOME</a>
            </li>
            <li class="<?= (basename($_SERVER['PHP_SELF'])=="companies.php")?"active":""; ?>">
                    <a href="<?php echo $base_url;?>/companies"><i class="fa fa-building" aria-hidden="true"></i> &nbsp;COMPANIES</a>
            </li>
            <li class="<?= (basename($_SERVER['PHP_SELF'])=="news.php")?"active":""; ?>">
                    <a href="<?php echo $base_url;?>/news"><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp;LATEST NEWS</a>
            </li>
                <hr style="background-color:#8785a1 !important;">

                <li class="<?= (basename($_SERVER['PHP_SELF'])=="profile.php")?"active":""; ?>">
                    <a href="<?php echo $base_url;?>/profile"><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;MY PROFILE</a>
                </li>
                <li class="">
                    <a href="mailto: team.simuleduco@gmail.com"><i class="fa fa-ticket" aria-hidden="true"></i> &nbsp;CAREERCLUB SUPPORT</a>
                </li>
                <hr style="background-color:#8785a1 !important;">
                <li class="">
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> &nbsp;FACEBOOK</a>
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i> &nbsp;TWITTER</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar fixed-top navbar-expand-md navbar-light" style="background-color:#fff;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-none mobile-only">
                    <i class="fa fa-bars" style="color: #676491 !important;"></i>
                    </button>
                      
                    <div class="mobile-only m-auto">
                        <a class="navbar-brand pl-2" href="dashboard"> <b style="font-size:25px!important">Career<span class="text-primary">Club</span></b> </a>
                    </div>
        
                    <div class="desktop-only">
                      <a class="navbar-brand  pl-2" href="dashboard"><b style="font-size:25px!important">Career<span class="text-primary">Club</span></b></a>
                     </div>
                    
               
          
    
                         
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                             <li class="nav-item">
                                <a href="<?php echo $base_url; ?>/dashboard" class="nav-link <?= (basename($_SERVER['PHP_SELF'])=="dashboard.php")?"active":""; ?>"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?php echo $base_url; ?>/companies" class="nav-link <?= (basename($_SERVER['PHP_SELF'])=="companies.php")?"active":""; ?>"><i class="fa fa-building" aria-hidden="true"></i> COMPANIES</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?php echo $base_url; ?>/news" class="nav-link <?= (basename($_SERVER['PHP_SELF'])=="news.php")?"active":""; ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> LATEST NEWS</a>
                            </li>
                        </ul>
                    </div>

                      

                                                         
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <div class="dropdown">
                                <button class="profile-btn font-weight-bold text-uppercase" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp; <?php echo $_SESSION['student_name']; ?> &nbsp;&nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?php echo $base_url;?>/profile"> <i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;MY PROFILE</a>
                                    <a class="dropdown-item" href="mailto: team.simuleduco@gmail.com"> <i class="fa fa-ticket" aria-hidden="true"></i> &nbsp;CAREERCLUB SUPPORT</a>
                                    <hr>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-facebook-square" aria-hidden="true"></i> &nbsp;FACEBOOK</a>
                                    <a class="dropdown-item" href="#"> <i class="fa fa-twitter-square" aria-hidden="true"></i> &nbsp;TWITTER</a>
                                </div>
                                </div>


                                <li class="nav-item">
                                <form action="<?php echo $base_url;?>/code.php" method="POST">
                                   <button type="submit" name="logout" class="btn btn-outline-secondary px-3" style="cursor:pointer;"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGOUT</button></a>
                                </form>
                            </li>
                        </ul>
                    </div>


                </div>
            </nav>

          

    <div class="overlay"></div>

