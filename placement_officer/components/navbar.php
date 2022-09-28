<?php
session_start();
$base_url = "https://jntuacep.ac.in/placement_cell/placement_officer";
?>

<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
              <a class="navbar-brand pt-4" href="dashboard.php">Career<span style="color:#ed0920!important;">Club</span> </a>
            </div>

            <ul class="list-unstyled components">
                <p><b>Admin : <?php echo $_SESSION['pl_officer_name']; ?></b></p>
                <li class="<?= (basename($_SERVER['PHP_SELF'])=="dashboard.php")?"active":""; ?>">
                <a href="<?php echo $base_url; ?>/dashboard.php" ><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Dashboard</a>
                </li>
                <li class="<?= (basename($_SERVER['PHP_SELF'])=="students.php")?"active":""; ?>">
                <a href="<?php echo $base_url; ?>/students.php" ><i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp;Students</a>
                </li>
                <li class="<?= (basename($_SERVER['PHP_SELF'])=="companies.php")?"active":""; ?>">
                <a href="<?php echo $base_url; ?>/companies.php"><i class="fa fa-building-o" aria-hidden="true"></i> &nbsp;Companies</a>
                </li>
                <li class="<?= (basename($_SERVER['PHP_SELF'])=="news.php")?"active":""; ?>">
                <a href="<?php echo $base_url; ?>/news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp;Latest News</a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li class="mobile-only">
                <form action="code.php" method="POST">
                    <button class="profile-btn py-2" type="submit" name="pl_officer_logout"><i class=" fa fa-power"></i>&nbsp;LOGOUT</button>
                </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar fixed-top navbar-expand-md navbar-light" style="background-color:#fff;">
                <div class="container-fluid">

                    <div style="color:white!important">
                        <button type="button" id="sidebarCollapse" class="btn btn-none">
                        <i class="fa fa-bars icon-bar"></i>
                        </button>
                    </div>
                      
                    <div class="mobile-only">
                        <a class="navbar-brand pt-2 pl-2" style="font-size:25px!important;" href="index.php">Career<span style="color:#03e6ff;">Club</span> </a>
                    </div>
                    <div class="desktop-only">
                        <a class="navbar-brand pt-2 pl-2" style="font-size:25px!important;" href="index.php">Career<span style="color:#03e6ff;">Club</span> </a>
                    </div>
               


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                            <form action="code.php" method="POST">
                                <button class="btn button-white py-2" type="submit" name="pl_officer_logout"><i class="fa fa-power"></i>&nbsp;LOGOUT</button>
                            </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

          

    <div class="overlay"></div>


     
 

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });
            $('#profile-info, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    
 
<!-- Dynamic Link active -->
<script>
$( '.list-group-flush .list-group-item .nav-link' ).on( 'click', function () { 
	$( '.list-group-flush' ).find( '.list-group-item .nav-link .active' ).removeClass( 'active' );
	$( this ).parent( '.list-group-item .nav-link' ).addClass( 'active' );
});
  </script>