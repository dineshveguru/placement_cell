<?php
require_once 'database/dbconfig.php';
require_once 'security.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Placement Cell - Jntuacep</title>
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/compete.css">
 <?php
    require_once 'components/links.php';
 ?>
</head>

<body>

<?php
require_once 'components/navbar.php';
?>

<header class="v-header container-video">
    <div class="fullscreen-video-wrap">
      <img src="assets/img/landing-img.jpg" >
      <div class="header-overlay">
        <div class="header-content">
          <h1>Welcome To CareerClub</h1>
          <p>Your Profile Tells What You Are </p>
          <a href="<?php echo $base_url;?>/profile" class="btn btn-outline-light">Start Building Your Profile</a>
        </div>
      </div>

    </div>
  </header>


<?php 
require_once 'components/footer.php';
?>














</body>

</html>

