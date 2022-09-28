<?php
require_once 'security.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <?php
    require_once 'components/links.php';
 ?>
</head>
<body>


<?php
require_once 'components/navbar.php';
?>






<!-- Social Links Start-->




<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-share-square-o" aria-hidden="true"></i>&nbsp;Social Links</p>
            </div>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Account</th>
                        <th>Account Link</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_GET['s_id'];
                $ref="students/$id/social_links";
                $social_links=$database->getReference($ref)->getValue();
                if($social_links > 0)
                {
                    foreach($social_links as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['account'];?></td>
                        <td><a href="<?php echo $row['link'];?>" class="btn btn-outline-dark" target="_blank">OPEN&nbsp; <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                        echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO SOCIAL LINKS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>




<!-- Social Links End-->



















<!-- Education Details Start-->




<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Education</p>
                
            </div>
           
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>School</th>
                        <th>Board</th>
                        <th>Branch</th>
                        <th>Passing Year</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_GET['s_id'];
                $ref="students/$id/education_details";
                $education_data=$database->getReference($ref)->getValue();
                if($education_data > 0)
                {
                    foreach($education_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['school'];?></td>
                        <td><?php echo $row['stream'];?></td>
                        <td><?php echo $row['passing_year'];?></td>
                        <td><?php echo $row['gpa'];?></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO EDUCATION DETAILS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>




<!-- Education Details End-->







<!---  Skills Start  -->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-flash" aria-hidden="true"></i>&nbsp;Skills</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Skill</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/skills";
                $skills_data=$database->getReference($ref)->getValue();
                if($skills_data > 0)
                {
                    foreach($skills_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['skill'];?></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO SKILLS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>








<!---  Skills End  -->






<!-- Certifications Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Certifications</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Certification Course Name</th>
                        <th>Certification Link</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_GET['s_id'];
                $ref="students/$id/certifications";
                $certifications_data=$database->getReference($ref)->getValue();
                if($certifications_data > 0)
                {
                    foreach($certifications_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['certification'];?></td>
                        <td><?php echo $row['certification_link'];?></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO CERTIFICATIONS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>






<!-- Certifications End-->





<!-- Workshops Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Workshops</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Workshop Details</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_GET['s_id'];
                $ref="students/$id/workshops";
                $workshops_data=$database->getReference($ref)->getValue();
                if($workshops_data > 0)
                {
                    foreach($workshops_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['workshop'];?></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO WORKSHOPS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>



<!-- Achievements Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Achievements Achieved</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Achievements Achieved</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/achievements";
                $achievements_data=$database->getReference($ref)->getValue();
                if($achievements_data > 0)
                {
                    foreach($achievements_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['achievement'];?></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO ACHIEVEMENTS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>


<!-- Achievements End-->















<!-- Positions Of Responsibilities Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-hand-rock-o" aria-hidden="true"></i>&nbsp;Positions Of Responsibilities</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Positions Of Responsibilities</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/responsibilities";
                $achievements_data=$database->getReference($ref)->getValue();
                if($achievements_data > 0)
                {
                    foreach($achievements_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['responsibility'];?></td>
                        
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO POSITIONS OF RESPONSIBILITIES FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>



<!-- Positions Of Responsibilities End-->













<!-- Projects Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;Projects</p>
                
            </div>
            
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Project Link</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/projects";
                $projects_data=$database->getReference($ref)->getValue();
                if($projects_data > 0)
                {
                    foreach($projects_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['project_name'];?></td>
                        <td><?php echo $row['project_description'];?></td>
                        <td><?php echo $row['project_link'];?></td>                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO PROJECTS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>


<!-- Projects End-->










<?php
    require_once "components/footer.php"
?>


</body>
</html>