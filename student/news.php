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
<style>
    .card-container {
    margin-top: 100px!important;
  }
</style>
<body>

<?php
require_once 'components/navbar.php';
?>

<div class="container">
              <div class="row">
                <div class="col-md-12 justify-content-start">
                <div class="d-flex justify-content-between mb-5 card-container">
                <p class="profile-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;Latest News</p>
            </div>
   
                

   <?php
    $ref="admin/news/";
    $news=$database->getReference($ref)->getValue();
    if($news > 0)
    {
                foreach($news as $key => $row)
                {
                            if($row["dept"] == $_SESSION['student_dept'] || $row["dept"] == "all")
                            {
                            ?>
                                <div class="container card shadow-lg ">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                       <div class="d-flex justify-content-between mb-5">
                                            <p class="text-dark font-weight-bold"><?php echo $row['news_title']; ?></p>
                                            <?php
                                                if($row["news_link"]!="")
                                                {
                                                    ?>
                                                    <a href="<?php echo $row['news_link']; ?>" target="_blank" class="btn btn-outline-dark font-weight-bold">OPEN </a>
                                                    <?php
                                                }
                                            ?>
                                       </div>
                                        <p class="text-info"><?php echo $row['news']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="container">
                                <div class="col-md-12" style="padding-right:0.2px !important;padding-left:0.2px !important;">
                                    <div>
                                        <p class="info alert alert-danger text-center text-danger">NO LATEST NEWS FOUND FOR YOUR DEPARTMENT</p>
                                
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                }
    }   

        else
        {
            ?>
            
                <div class="container">
                    <div class="col-md-12" style="padding-right:0.2px !important;padding-left:0.2px !important;">
                        <div>
                            <p class="info alert alert-danger text-center text-danger">NO LATEST NEWS FOUND </p>
                    
                        </div>
                    </div>
                </div>      
              <?php
        } 
  
  


?>

</div>

</div>
</div>

<?php 
require_once 'components/footer.php';
?>



</body>

</html>

