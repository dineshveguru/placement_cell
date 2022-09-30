<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Cell - Students</title>
    <?php
        require_once 'components/links.php';
        require_once "database/dbconfig.php";
    ?>
</head>
<body>
<?php
    require_once 'components/navbar.php';
?>
<section id="programming" style="margin-top:100px!important">
                
                       
        <div class="container-fluid d-flex justify-content-between px-5">
                
          <p class="programming-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp;students</p>
        
        </div>
              
              
              
        <div class="container-fluid d-flex justify-content-between px-5 pt-3">
              
          <input id="search" type="text"  class="form-control col-md-4 mb-3" placeholder="Search Student"> 
          <a href="export.php"><button class='btn-success'>EXPORT CSV</button></a>  
       </div>
              
            
                     
              
                              
              
</section>

<?php

$ref="students/";
$students_data=$database->getReference($ref)->getValue();




?>
              
<section id="displaytable" class="mx-5">
            <div class="table-responsive">

            
            <table  class="table table-striped table-hover table-bordered" id="datatable" width="100%" cellspacing="0" >
              <thead style="background-color:#ffeded !important;">
                <tr>
                  <th style="display:none">KEY</th>
                  <th>ROLL NUMBER</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>
                  <th>DEPARTMENT</th>
                  <th>COLLEGE NAME</th>
                  <th class="text-center">PROFILE</th>
              </tr>
            </thead>
            
            <?php
            if($students_data > 0)
            {
                foreach($students_data as $key => $row)
                    {
                      ?>
            <tbody id="searchdata">
              
              <tr>
                <td style="display:none;"><?php echo $key;  ?></td>
                <td class="text-uppercase"><?php echo $row['admno'];  ?></</td>
                <td class="text-uppercase"><?php echo $row['name'];  ?></td>
                <td><?php echo $row['email'];  ?></td>
                <td><?php echo $row['phone'];  ?></td>
                <td class="text-uppercase"><?php echo $row['dept'];  ?></td>
                <td class="text-uppercase"><?php echo $row['clg'];  ?></</td>
                <?php
                $ref2="students/$key/skills";
                $students_skills=$database->getReference($ref2)->getValue();
                echo '<td class="text-uppercase">';
                  if($students_skills > 0)
                  {
                    foreach($students_skills as $key1 => $row)
                    {
                      ?>
                      <?php echo $row['skill'].',';  ?>
                      <?php
                    }
                  }
                  else{
                    ?>
                    NO SKILLS ADDED
                    <?php
                  }
                  echo "</td>";
                ?>
                <td class="text-center"><a href="student-profile.php?s_id=<?php echo $key; ?>" class="btn btn-outline-success">VIEW PROFILE</a></td>

              </tr>
              </tbody>
              <?php
                    }
                  }
                ?>
              
            
            </table>
            </div>



</section>
<?php
    require_once "components/footer.php";
?>
</body>
</html>