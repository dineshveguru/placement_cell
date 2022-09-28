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

<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Companies</p>
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Company Name</th>
                        <th>Company Site</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $ref="admin/companies/";
                $companies=$database->getReference($ref)->getValue();
                if($companies > 0)
                {
                    foreach($companies as $key => $row)
                        {
                            if($row["dept"] == $_SESSION['student_dept'] || $row["dept"] == "all")
                            {
                            ?>
                                <tr>
                                    <td style="display:none"><?php echo $key;?></td>
                                    <td class="text-uppercase"><?php echo $row['company_name'];?></td>
                                    <td><a href="<?php echo $row['company_site'];?>" target="_blank" class="btn btn-outline-dark">OPEN &nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                                    
                                </tr>
                            <?php
                            }
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO COMPANIES ADDED PLEASE   CONTACT ADMINISTRATOR</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>
<?php 
require_once 'components/footer.php';
?>



</body>

</html>

