<?php
require_once "database/dbconfig.php";
$ref="students/";
$students_data=$database->getReference($ref)->getValue();

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=students.xls');


?>
              
<section id="displaytable" class="mx-5">
            <div class="table-responsive">

            
            <table  class="table table-striped table-hover table-bordered" id="datatable" width="100%" cellspacing="0" >
              <thead style="background-color:#ffeded !important;">
                <tr>
                  
                  <th>ROLL NUMBER</th>
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>PHONE</th>
                  <th>DEPARTMENT</th>
                  <th>COLLEGE NAME</th>
                  <th>SKILLS</th>
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
                
                <td class="text-uppercase"><?php echo $row['admno'];  ?></td>
                <td class="text-uppercase"><?php echo $row['name'];  ?></td>
                <td><?php echo $row['email'];  ?></td>
                <td><?php echo $row['phone'];  ?></td>
                <td class="text-uppercase"><?php echo $row['dept'];  ?></td>
                <td class="text-uppercase"><?php echo $row['clg'];  ?></td>
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
                
              </tr>
              </tbody>
              <?php
                    }
                  }
                ?>
              
            
            </table>
            </div>



</section>