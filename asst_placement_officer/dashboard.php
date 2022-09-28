<?php
    require_once 'security.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Placement Officer - Dashboard</title>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#618cc2" >
    <?php 
        require_once "components/links.php";
    ?>

</head>
<body>
    



<?php 
        require_once "components/navbar.php";
    ?>

<?php
$ref="students/";
$students_count=$database->getReference($ref)->getSnapshot()->numChildren();
$ref="admin/companies";
$companies_count=$database->getReference($ref)->getSnapshot()->numChildren();
$ref="admin/news";
$news_count=$database->getReference($ref)->getSnapshot()->numChildren();



?>

<section id="programming" style="margin-top:100px!important">
    <div class="container-fluid text-center px-5">
    <p class="programming-heading"><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Dashboard</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                    <p class="text-info font-weight-bold">Total Students</p>
                    <p style="font-size:25px;"><?php echo $students_count; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                    <p class="text-info font-weight-bold">Total Companies Added</p>
                    <p style="font-size:25px;"><?php echo $companies_count; ?></p>                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                    <p class="text-info font-weight-bold">Total News Added</p>
                    <p style="font-size:25px;"><?php echo $news_count?></p>                </div>
            </div>
        </div>

    </div>
  </section>



  <?php
        require_once 'components/footer.php';
    ?>














</body>
</html>