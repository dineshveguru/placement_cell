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
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Company
                </button>
            </div>
            <?php

            if(isset($_SESSION['success']) && $_SESSION['success']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success'].'</div>';
                unset($_SESSION['success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status'].'</div>';
                unset($_SESSION['status']);
            }

            ?>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Department</th>
                        <th>Company Name</th>
                        <th>Company Site</th>
                        <th class="text-center">EDIT</th>
                        <th class="text-center">DELETE</th>
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
                            ?>
                                <tr>
                                    <td style="display:none"><?php echo $key;?></td>
                                    <td class="text-uppercase"><?php echo $row['dept'];?></td>
                                    <td class="text-uppercase"><?php echo $row['company_name'];?></td>
                                    <td><?php echo $row['company_site'];?></td>
                                    <td><button type="button"  class="btn btn-info update_company">Edit</button></td>
                                    <td><button type="button"  class="btn btn-danger delete_company">Delete</button></td>
                                </tr>
                            <?php
                
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO COMPANIES ADDED PLEASE ADD COMPANIES</td>';
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








<!-- Company Details Start -->


<!-- Add Company Details Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
            <label>Department <span class="text-danger">*</span></label><br>
            <select class="custom-select " name="dept" required>
            <option value ="">Select Department</option>
            <option value ="all">All Departments</option>
            <option value="cse">Computer Science & Engineering</option>
            <option value="ece">Electronics and Communications Engineering</option>
            <option value="eee">Electrical and Electronics Engineering</option>
            <option value="mech">Mechanical Engineering</option>
            <option value="civil">Civil Engineering</option>
            </select>
        </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">Company Name</label>
               <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
         </div>

        <div class="form-group">
   			<label class="font-weight-bold">Company Site</label>
   			<input type="text" name="company_site" class="form-control" placeholder="Enter Company Site" required>
        </div>


        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_company" class="btn btn-primary">Add Company Details</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Company Modal -->

<div class="modal fade" id="update_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Company Deatils</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_companyid" id="update_companyid">

      <div class="form-group">
            <label>Branch <span class="text-danger">*</span></label><br>
            <select class="custom-select " name="dept" id="dept" required>
            <option value ="">Select Branch</option>
            <option value ="all">All Departments</option>
            <option value="cse">Computer Science & Engineering</option>
            <option value="ece">Electronics and Communications Engineering</option>
            <option value="eee">Electrical and Electronics Engineering</option>
            <option value="mech">Mechanical Engineering</option>
            <option value="civil">Civil Engineering</option>
            </select>
        </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">Company Name</label>
               <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name" required>
         </div>

        <div class="form-group">
   			<label class="font-weight-bold">Company Site</label>
   			<input type="text" name="company_site" id="company_site" class="form-control" placeholder="Enter Company Site" required>
        </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_company" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Company Modal-->
<div class="modal fade" id="delete_company" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_companyid" id="delete_companyid">     

         <h4>Do You Want to Delete this Company Details ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_company"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Company Details End-->








</body>

</html>

