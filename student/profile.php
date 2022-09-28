<?php
require_once 'security.php';
$key = $_SESSION['student_key'];
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

<!-- 


<section id="profile-user">
  <div class="mx-auto text-center">
    <?php
    if(file_exists("profile_images/$key.png"))
    {
      ?>
      <img style="border-radius:50%" src="profile_images/avatar.png" width="150" height="150">
      <?php
    }
    else{
      ?>
      <img style="border-radius:50%" src="profile_images/avatar.png" width="150" height="150">
      <?php
    }
    ?>
  </div>
  
  <div class="mt-3 mx-auto text-center">
  <button type="button"  class="btn btn-info update_profile_image">Update</button>
  <button type="button"  class="btn btn-danger delete_profile_image">Delete</button>
  </div>
</section>




<div class="modal fade" id="update_profile_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Profile Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="code.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="update_profile_imageid" id="update_profile_imageid">
        <input type="file" name="profileimageupload" id="profileimageupload" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_profile_image" class="btn btn-primary">Update Image</button>
      </div>

      </form>
    </div>
  </div>
</div>



         

<div class="modal fade" id="delete_profile_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Profile Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_profile_imageid" id="delete_profile_imageid">     

         <h4>Do You Want to Delete Profile Image ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_profile_image"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



 -->


<!-- Social Links Start-->




<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-share-square-o" aria-hidden="true"></i>&nbsp;Social Links</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_social_links">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Social Link
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
                        <th>Account</th>
                        <th>Account Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
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
                        <td><?php echo $row['link'];?></td>
                        <td><button type="button"  class="btn btn-info update_social_links">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_social_links">Delete</button></td>
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


<!-- Add Social Links Modal -->
<div class="modal fade" id="add_social_links" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Social Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
          <label>Social Account <span class="text-danger">*</span></label><br>
          <select class="custom-select " name="account" required>
          <option value ="">Select Account</option>
          <option value="github">Github</option>
          <option value="linkedin">Linkedin</option>
          <option value="facebook">Facebook</option>
          <option value="instagram">Instagram</option>
          <option value="Personal Blog/Portfolio">Personal Blog/Portfolio</option>
          </select>
      </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">link</label>
               <input type="text" name="link" class="form-control" placeholder="Enter Social Account Link" required>
         </div>

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_social_links" class="btn btn-primary">Add Social Link</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Social Link Modal -->

<div class="modal fade" id="update_social_links" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Social Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_social_linksid" id="update_social_linksid">

      <div class="form-group">
          <label>Social Account <span class="text-danger">*</span></label><br>
          <select class="custom-select " name="account" id="account" required>
          <option value ="">Select Account</option>
          <option value="github">Github</option>
          <option value="linkedin">Linkedin</option>
          <option value="facebook">Facebook</option>
          <option value="instagram">Instagram</option>
          <option value="Personal Blog/Portfolio">Personal Blog/Portfolio</option>
          </select>
      </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">link</label>
               <input type="text" name="link" id="link" class="form-control" placeholder="Enter Social Account Link" required>
         </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_social_links" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Social Links Modal-->
<div class="modal fade" id="delete_social_links" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Social Links Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_social_linksid" id="delete_social_linksid">     

         <h4>Do You Want to Delete this Social Link ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_social_links"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Social Links End-->


















<!-- Offer Letter Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;Offer Letters</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_offer">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Offer Letter
                </button>
            </div>
            <?php

            if(isset($_SESSION['success2']) && $_SESSION['success2']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success2'].'</div>';
                unset($_SESSION['success2']);
            }

            if(isset($_SESSION['status2']) && $_SESSION['status2']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status2'].'</div>';
                unset($_SESSION['status2']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">


            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Company Name</th>
                        <th>Package</th>
                        <th>Employment Type</th>
                        <th>Offer Letter Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/offers";
                $offers=$database->getReference($ref)->getValue();
                if($offers > 0)
                {
                    foreach($offers as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                         <td class="d-none"><?php echo $row['offer_id'];?></td>
                         <td><?php echo $row['company'];?></td>
                        <td><?php echo $row['package'];?></td>
                        <td><?php echo $row['offer_type'];?></td>
                        <td style="display:none"><?php echo $row['offer_link'];?></td>
                        <td><a class="btn btn-success" target="_blank" href="<?php echo $row['offer_link'];?>">View</a></td>
                        <td><button type="button"  class="btn btn-info update_offer">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_offer">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO OFFER LETTERS UPLOADED</td>';
                    }

                    ?>
                </tbody>
            </table>



            
        </div>
            </div>
        </div>
</section>




<!-- Add Offer Letter Modal -->

<div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Offer Letter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label class="font-weight-bold">Company Name <span class="text-danger">*</span></label>
          <input type="text" name="company" class="form-control" placeholder="Enter Company Name" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Package Offered <span class="text-danger">*</span></label>
          <input type="text" name="package" class="form-control" placeholder="Enter Package Offered" required>
        </div>
      <div class="form-group">
          <label class="font-weight-bold">Employment Type <span class="text-danger">*</span></label><br>
          <select class="custom-select" name="offer_type" required>
          <option value ="">Select Employment Type</option>
          <option value="intern">Intern</option>
          <option value="full time">Full Time</option>
          </select>
      </div>
      <div class="form-group">
          <label class="font-weight-bold">Offer Letter Link <span class="text-danger">*</span></label>
          <input type="url" name="offer_link" class="form-control" placeholder="Provide Offer Letter Link" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_offer" class="btn btn-primary">Add Offer Letter</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Offer Modal -->

<div class="modal fade" id="update_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Offer Letter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="update_offerid" id="update_offerid">
      <!--<input type="hidden" name="certificate_id" id="certificate_id">-->
      
      <div class="form-group">
          <label class="font-weight-bold">Company Name <span class="text-danger">*</span></label>
          <input type="text" name="company" id="company" class="form-control" placeholder="Enter Company Name" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Package Offered <span class="text-danger">*</span></label>
          <input type="text" name="package" id="package" class="form-control" placeholder="Enter Package Offered" required>
        </div>
      <div class="form-group">
          <label class="font-weight-bold">Employment Type <span class="text-danger">*</span></label><br>
          <select class="custom-select" name="offer_type" id="offer_type" required>
          <option value ="">Select Employment Type</option>
          <option value="intern">Intern</option>
          <option value="full time">Full Time</option>
          </select>
      </div>
      <div class="form-group">
          <label class="font-weight-bold">Offer Letter Link <span class="text-danger">*</span></label>
          <input type="url" name="offer_link" id="offer_link" class="form-control" placeholder="Provide Offer Letter Link" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_offer" class="btn btn-primary">Update Offer Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Offer Letter Modal-->

<div class="modal fade" id="delete_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Offer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_offerid" id="delete_offerid">
         <!--<input type="hidden" name="delete_certifice_id" id="delete_certifice_id">-->

         <h4>Do You Want to Delete this Offer Letter ?</h4>
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_offer"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Offer Letter End-->





































<!-- Coding Platforms Start-->




<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-code" aria-hidden="true"></i>&nbsp;Coding Platforms</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_coding_platform">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Coding Platforms
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
                        <th>Platform</th>
                        <th>Rank</th>
                        <th>Profile Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/coding_platforms";
                $coding_platforms=$database->getReference($ref)->getValue();
                if($coding_platforms > 0)
                {
                    foreach($coding_platforms as $key => $row)
                        {
                            ?>
                     <tr>
                        <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['platform'];?></td>
                        <td><?php echo $row['rank'];?></td>
                        <td><?php echo $row['profile_link'];?></td>
                        <td><button type="button"  class="btn btn-info update_coding_platforms">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_coding_platforms">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO CODING PLATFORMS ADDED</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>


<!-- Add Coding Platforms Modal -->
<div class="modal fade" id="add_coding_platform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Coding Platforms</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
          <label>Coding Platform <span class="text-danger">*</span></label><br>
          <select class="custom-select" name="platform" required>
          <option value ="">Select Coding Platform</option>
          <option value="hackerrank">HackerRank</option>
          <option value="hackerearth">HackerEarth</option>
          <option value="codechef">CodeChef</option>
          <option value="leetCode">LeetCode</option>
          <option value="codeforces">CodeForces</option>
          <option value="geeksforgeeks">GeeksforGeeks </option>
          <option value="topcoder">TopCoder</option>
          </select>
      </div>
              
      <div class="form-group">
        <label class="font-weight-bold">Rank</label>
        <input type="text" name="rank" class="form-control" placeholder="Enter Coding Platform Rank" required>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">Profile Link</label>
        <input type="text" name="profile_link" class="form-control" placeholder="Enter Profile Link" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_coding_platform" class="btn btn-primary">Add Coding Platform</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Coding Platforms Modal -->

<div class="modal fade" id="update_coding_platforms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Social Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_coding_platformsid" id="update_coding_platformsid">

      <div class="form-group">
          <label>Coding Platform <span class="text-danger">*</span></label><br>
          <select class="custom-select" name="platform" id="platform" required>
          <option value ="">Select Coding Platform</option>
          <option value="hackerrank">HackerRank</option>
          <option value="hackerearth">HackerEarth</option>
          <option value="codechef">CodeChef</option>
          <option value="leetCode">LeetCode</option>
          <option value="codeforces">CodeForces</option>
          <option value="geeksforgeeks">GeeksforGeeks </option>
          <option value="topcoder">TopCoder</option>
          </select>
      </div>
              
      <div class="form-group">
        <label class="font-weight-bold">Rank</label>
        <input type="text" name="rank" id="rank" class="form-control" placeholder="Enter Coding Platform Rank" required>
      </div>

      <div class="form-group">
        <label class="font-weight-bold">Profile Link</label>
        <input type="text" name="profile_link" id="profile_link" class="form-control" placeholder="Enter Profile Link" required>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_coding_platforms" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Coding Platforms Modal-->
<div class="modal fade" id="delete_coding_platforms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Coding Platform</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_coding_platformsid" id="delete_coding_platformsid">     

         <h4>Do You Want to Delete this Coding Platform ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_coding_platforms"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Coding Platforms End-->



















<!-- Education Details Start-->




<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Education</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Education Details
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
                        <th>School</th>
                        <th>Board</th>
                        <th>Branch</th>
                        <th>Passing Year</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
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
                        <td><button type="button"  class="btn btn-info update_education">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_education">Delete</button></td>
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


<!-- Add Education Details Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Education Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">School or College or University Name</label>
   			<input type="text" name="school" class="form-control" placeholder="Enter School or College or University Name" required>
        </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">Stream</label>
               <input type="text" name="stream" class="form-control" placeholder="SSC/ICSE/CBSE/MPC/BIPC/CSE/ECE/EEE/MECH/CIVIL" required>
         </div>

        <div class="form-group">
   			<label class="font-weight-bold">Passing Year</label>
   			<input type="text" name="passing_year" class="form-control" placeholder="Enter Passing year" required>
        </div>

        <div class="form-group">
                 <label class="font-weight-bold">CGPA/ %</label>
               <input type="text" name="gpa" class="form-control" placeholder="Ex : 9.2/ 95%" required>
         </div>

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_education" class="btn btn-primary">Add Education Details</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Education Modal -->

<div class="modal fade" id="update_education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Education Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_educationid" id="update_educationid">

      <div class="form-group">
   			<label class="font-weight-bold">School or College or University Name</label>
   			<input type="text" name="school" id="school" class="form-control" placeholder="Enter School or College or University Name" required>
        </div>
              
        <div class="form-group">
                 <label class="font-weight-bold">Stream</label>
               <input type="text" name="stream" id="stream" class="form-control" placeholder="SSC/ICSE/CBSE/MPC/BIPC/CSE/ECE/EEE/MECH/CIVIL" required>
         </div>

        <div class="form-group">
   			<label class="font-weight-bold">Passing Year</label>
   			<input type="text" name="passing_year" id="passing_year" class ="form-control" placeholder="Enter Passing year" required>
        </div>

        <div class="form-group">
                 <label class="font-weight-bold">CGPA/ %</label>
               <input type="text" name="gpa" id="gpa" class="form-control" placeholder="Ex : 9.2/ 95%" required>
         </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_education" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Education Modal-->
<div class="modal fade" id="delete_education" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Education Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_educationid" id="delete_educationid">     

         <h4>Do You Want to Delete this Education Details ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_education"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Education Details End-->







<!---  Skills Start  -->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-flash" aria-hidden="true"></i>&nbsp;Skills</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_skills">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Skills
                </button>
            </div>
            <?php

            if(isset($_SESSION['success1']) && $_SESSION['success1']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success1'].'</div>';
                unset($_SESSION['success1']);
            }

            if(isset($_SESSION['status1']) && $_SESSION['status1']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status1'].'</div>';
                unset($_SESSION['status1']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Skill</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        <td><button type="button"  class="btn btn-info update_skills">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_skills">Delete</button></td>
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






<!-- Add Skills Modal -->
<div class="modal fade" id="add_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">
        <div class="form-group">
                 <label class="font-weight-bold">Skill</label>
               <input type="text" name="skill" class="form-control" placeholder="Enter Skill" required>
         </div>

        

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_skills" class="btn btn-primary">Add Skills</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Skills Modal -->

<div class="modal fade" id="update_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_skillsid" id="update_skillsid">
              
        <div class="form-group">
                 <label class="font-weight-bold">Skill</label>
               <input type="text" name="skill" id="skill" class="form-control" placeholder="Enter Skill" required>
         </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_skills" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Skills Modal-->
<div class="modal fade" id="delete_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Skill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_skillsid" id="delete_skillsid">     

         <h4>Do You Want to Delete this Skills ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_skills"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>






<!---  Skills End  -->






<!-- Certifications Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-certificate" aria-hidden="true"></i>&nbsp;Certifications</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_certification">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Certification
                </button>
            </div>
            <?php

            if(isset($_SESSION['success2']) && $_SESSION['success2']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success2'].'</div>';
                unset($_SESSION['success2']);
            }

            if(isset($_SESSION['status2']) && $_SESSION['status2']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status2'].'</div>';
                unset($_SESSION['status2']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">


            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Certification Platform</th>
                        <th>Certification Course Name</th>
                        <th>Certification Link</th>
                        <th>Certificate File</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/certifications";
                $certifications_data=$database->getReference($ref)->getValue();
                if($certifications_data > 0)
                {
                    foreach($certifications_data as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                         <td class="d-none"><?php echo $row['certificate_id'];?></td>
                         <td><?php echo $row['platform'];?></td>
                        <td><?php echo $row['certification'];?></td>
                        <td class="d-none"><?php echo $row['certification_link'];?></td>
                        <td><a class="btn btn-success" target="_blank" href="<?php echo $row['certification_link'];?>">View</a></td>
                        <td><a class="btn btn-success" target="_blank" href="certificates/<?php echo $row['certificate_id'];?>.pdf">View</a></td>
                        <td><button type="button"  class="btn btn-info update_certification">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_certification">Delete</button></td>
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




<!-- Add Certification Modal -->

<div class="modal fade" id="add_certification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Certifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
          <label>Certification Platform <span class="text-danger">*</span></label><br>
          <select class="custom-select" name="platform" required>
          <option value ="">Select Certification Platform</option>
          <option value="google">Google</option>
          <option value="microsoft">Microsoft</option>
          <option value="ibm">IBM</option>
          <option value="linkedin">LinkedIn</option>
          <option value="coursera">Coursera</option>
          <option value="udemy">Udemy</option>
          <option value="udacity">Udacity</option>
          <option value="edx">EDX</option>
          </select>
      </div>
        <div class="form-group">
          <label class="font-weight-bold">Course Name Of Certification</label>
          <input type="text" name="certification" class="form-control" placeholder="Enter Course Name Of Certification" required>
        </div>
        <div class="form-group">
          <label class="font-weight-bold">Certificate Link</label>
          <input type="text" name="certification_link" class="form-control" placeholder="Enter Certification Link ( If had )">
        </div>
        
        <label class="font-weight-bold">Certificate File</label>
        <div>
          <input type="file" name="fileupload" id="fileupload" required>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_certification" class="btn btn-primary">Add Certification</button>
      </div>

      </form>
    </div>
  </div>
</div>


<!-- Update Certification Modal -->

<div class="modal fade" id="update_certification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Certification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST" enctype="multipart/form-data">

      <input type="hidden" name="update_certificationid" id="update_certificationid">
      <input type="hidden" name="certificate_id" id="certificate_id">
      
      <div class="form-group">
          <b><label>Certification Platform <span class="text-danger">*</span></label></b><br>
          <select class="custom-select" name="platform" id="platform" required>
          <option value ="">Select Certification Platform</option>
          <option value="google">Google</option>
          <option value="microsoft">Microsoft</option>
          <option value="ibm">IBM</option>
          <option value="linkedin">LinkedIn</option>
          <option value="coursera">Coursera</option>
          <option value="udemy">Udemy</option>
          <option value="udacity">Udacity</option>
          <option value="edx">EDX</option>
          </select>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Course Name Of Certification</label>
   			<input type="text" name="certification" id="certification" class="form-control" placeholder="Enter Course Name Of Certification" required>
        </div>

        <div class="form-group">
   			<label class="font-weight-bold">Certificate Link</label>
   			<input type="text" name="certification_link" id="certification_link" class="form-control" placeholder="Enter Course Name Of Certification">
        </div>
        
        <label class="font-weight-bold">Certificate File</label>
        <div>
          <input type="file" name="fileupload" id="fileupload" required>
        </div>
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_certification" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Certification Modal-->

<div class="modal fade" id="delete_certification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Certification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_certificationid" id="delete_certificationid">
         <input type="hidden" name="delete_certifice_id" id="delete_certifice_id">

         <h4>Do You Want to Delete this Certification ?</h4>
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_certification"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>



<!-- Certifications End-->
































<!-- Workshops Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Workshops</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_workshop">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Workshop
                </button>
            </div>
            <?php

            if(isset($_SESSION['success3']) && $_SESSION['success3']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success3'].'</div>';
                unset($_SESSION['success3']);
            }

            if(isset($_SESSION['status3']) && $_SESSION['status3']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status3'].'</div>';
                unset($_SESSION['status3']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Workshop Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
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
                        <td><button type="button"  class="btn btn-info update_workshop">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_workshop">Delete</button></td>
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


<!-- Add Workshop Modal -->
<div class="modal fade" id="add_workshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Workshop Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">Workshop Details</label>
   			<input type="text" name="workshop" class="form-control" placeholder="Enter Workshop Details" required>
        </div>

        

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_workshop" class="btn btn-primary">Add Workshop</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Workshop Modal -->

<div class="modal fade" id="update_workshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Workshop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_workshopid" id="update_workshopid">

      <div class="form-group">
   			<label class="font-weight-bold">Workshop Details</label>
   			<input type="text" name="workshop" id="workshop" class="form-control" placeholder="Enter Workshop Details" required>
        </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_workshop" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Workshop Modal-->
<div class="modal fade" id="delete_workshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Workshop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_workshopid" id="delete_workshopid">     

         <h4>Do You Want to Delete this Workshop ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_workshop"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>

<!-- Workshops End-->




<!-- Achievements Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Achievements Achieved</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_achievement">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Achievement
                </button>
            </div>
            <?php

            if(isset($_SESSION['success4']) && $_SESSION['success4']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success4'].'</div>';
                unset($_SESSION['success4']);
            }

            if(isset($_SESSION['status4']) && $_SESSION['status4']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status4'].'</div>';
                unset($_SESSION['status4']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Achievements Achieved</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        <td><button type="button"  class="btn btn-info update_achievement">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_achievement">Delete</button></td>
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


<!-- Add Achievement Modal -->
<div class="modal fade" id="add_achievement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Achievement Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">Achievement Details</label>
   			<input type="text" name="achievement" class="form-control" placeholder="Enter Achievement Details" required>
        </div>

        

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_achievement" class="btn btn-primary">Add Achievement</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Achievement Modal -->

<div class="modal fade" id="update_achievement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Achievement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_achievementid" id="update_achievementid">

      <div class="form-group">
   			<label class="font-weight-bold">Achievement Details</label>
   			<input type="text" name="achievement" id="achievement" class="form-control" placeholder="Enter Achievement Details" required>
        </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_achievement" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Achievement Modal-->

<div class="modal fade" id="delete_achievement" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Achievement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_achievementid" id="delete_achievementid">     

         <h4>Do You Want to Delete this Achievement ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_achievement"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>

<!-- Achievements End-->















<!-- Positions Of Responsibilities Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-hand-rock-o" aria-hidden="true"></i>&nbsp;Positions Of Responsibilities</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_responsibility">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Responsibility
                </button>
            </div>
            <?php

            if(isset($_SESSION['success5']) && $_SESSION['success5']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success5'].'</div>';
                unset($_SESSION['success5']);
            }

            if(isset($_SESSION['status5']) && $_SESSION['status5']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status5'].'</div>';
                unset($_SESSION['status5']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Positions Of Responsibilities</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        <td><button type="button"  class="btn btn-info update_responsibility">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_responsibility">Delete</button></td>
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


<!-- Add Positions Of Responsibilities Modal -->
<div class="modal fade" id="add_responsibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Positions Of Responsibility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">Positions Of Responsibility</label>
   			<input type="text" name="responsibility" class="form-control" placeholder="Enter Responsibility Details" required>
        </div>

        

        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_responsibility" class="btn btn-primary">Add Responsibility</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Positions Of Responsibilitiess Modal -->

<div class="modal fade" id="update_responsibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Responsibility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_responsibilityid" id="update_responsibilityid">

      <div class="form-group">
   			<label class="font-weight-bold">Responsibility Details</label>
   			<input type="text" name="responsibility" id="responsibility" class="form-control" placeholder="Enter Responsibility Details" required>
        </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_responsibility" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Positions Of Responsibilities Modal-->

<div class="modal fade" id="delete_responsibility" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Responsibility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_responsibilityid" id="delete_responsibilityid">     

         <h4>Do You Want to Delete this Responsibility ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_responsibility"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>

<!-- Positions Of Responsibilities End-->













<!-- Research Papers Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Research Papers</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_paper">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Research Papers
                </button>
            </div>
            <?php

            if(isset($_SESSION['success6']) && $_SESSION['success6']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success6'].'</div>';
                unset($_SESSION['success6']);
            }

            if(isset($_SESSION['status6']) && $_SESSION['status6']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status6'].'</div>';
                unset($_SESSION['status6']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Research Paper Name</th>
                        <th>Research Paper Description</th>
                        <th>Research Paper Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $id = $_SESSION['student_key'];
                $ref="students/$id/research_papers";
                $research_papers=$database->getReference($ref)->getValue();
                if($research_papers > 0)
                {
                    foreach($research_papers as $key => $row)
                        {
                            ?>
                     <tr>
                         <td style="display:none"><?php echo $key;?></td>
                        <td><?php echo $row['paper_name'];?></td>
                        <td><?php echo $row['paper_description'];?></td>
                        <td><?php echo $row['paper_link'];?></td>
                        <td><button type="button"  class="btn btn-info update_paper">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_paper">Delete</button></td>
                    </tr>
                    <?php
                    }
                    }
                    else
                    {
                    echo '<td class="text-center text-danger font-weight-bold" colspan="16">NO RESEARCH PAPERS FOUND</td>';
                    }

                    ?>
                </tbody>
            </table>
        </div>
            </div>
        </div>
</section>


<!-- Add Research Papers Modal -->

<div class="modal fade" id="add_paper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Research Paper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Name</label>
   			<input type="text" name="paper_name" class="form-control" placeholder="Enter Research Paper Name" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Description</label>
   			<input type="text" name="paper_description" class="form-control" placeholder="Enter Research Paper Description" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Link</label>
   			<input type="text" name="paper_link" class="form-control" placeholder="Enter Research Paper Link" required>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_paper" class="btn btn-primary">Add Research Paper</button> 
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Project Modal -->

<div class="modal fade" id="update_paper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Research Paper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_paperid" id="update_paperid">

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Name</label>
   			<input type="text" name="paper_name" id="paper_name" class="form-control" placeholder="Enter Research Paper Name" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Description</label>
   			<input type="text" name="paper_description" id="paper_description" class="form-control" placeholder="Enter Research Paper Description" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Research Paper Link</label>
   			<input type="text" name="paper_link" id="paper_link" class="form-control" placeholder="Enter Research Paper Link" required>
      </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_paper" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Reasearch Paper Modal-->

<div class="modal fade" id="delete_paper" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Research Paper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_paperid" id="delete_paperid">     

         <h4>Do You Want to Delete this Research Paper ?</h4> 
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_paper"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>

<!-- Research Papers End-->







<!-- Projects Start-->


<section id="profile-user">
        <div class="container text-center mb-2">
            
            <div class="d-flex justify-content-between mb-3">
                <p class="profile-heading"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;Projects</p>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#add_project">
                <i class="fa fa-plus" aria-hidden="true"></i> Add Project
                </button>
            </div>
            <?php

            if(isset($_SESSION['success6']) && $_SESSION['success6']!='')
            {
                echo'<div class="alert alert-success text-center font-weight-bold" role="alert">'.$_SESSION['success6'].'</div>';
                unset($_SESSION['success6']);
            }

            if(isset($_SESSION['status6']) && $_SESSION['status6']!='')
            {
                echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status6'].'</div>';
                unset($_SESSION['status6']);
            }

            ?>
            <div class="profile-card-design text-center">
            <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-striped">
                <thead style="background-color:#55198B !important;color:#fff !important;">
                    <tr>
                        <th>Project Name</th>
                        <th>Project Description</th>
                        <th>Project Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
                        <td><?php echo $row['project_link'];?></td>
                        <td><button type="button"  class="btn btn-info update_project">Edit</button></td>
                        <td><button type="button"  class="btn btn-danger delete_project">Delete</button></td>
                    </tr>
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


<!-- Add Projects Modal -->
<div class="modal fade" id="add_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <div class="form-group">
   			<label class="font-weight-bold">Project Name</label>
   			<input type="text" name="project_name" class="form-control" placeholder="Enter Project Name" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Project Description</label>
   			<input type="text" name="project_description" class="form-control" placeholder="Enter Project Description" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Project Link</label>
   			<input type="text" name="project_link" class="form-control" placeholder="Enter Project Link" required>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_project" class="btn btn-primary">Add Project</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- Update Project Modal -->

<div class="modal fade" id="update_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">

      <input type="hidden" name="update_projectid" id="update_projectid">

      <div class="form-group">
   			<label class="font-weight-bold">Project Name</label>
   			<input type="text" name="project_name" id="project_name" class="form-control" placeholder="Enter Project Name" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Project Description</label>
   			<input type="text" name="project_description" id="project_description" class="form-control" placeholder="Enter Project Description" required>
      </div>

      <div class="form-group">
   			<label class="font-weight-bold">Project Link</label>
   			<input type="text" name="project_link" id="project_link" class="form-control" placeholder="Enter Project Link" required>
      </div>

        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_project" class="btn btn-primary">Update Details</button>
      </div>

      </form>
    </div>
  </div>
</div>



         
<!-- Delete Projects Modal-->

<div class="modal fade" id="delete_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<form action="code.php" method="POST">
                        
         <input type="hidden" name="delete_projectid" id="delete_projectid">     

         <h4>Do You Want to Delete this Project ?</h4>     
      
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete_project"  class="btn btn-primary">YES</button>
     </div>

 </form>
    </div>
  </div>
</div>
</div>

<!-- Projects End-->










<?php
    require_once "components/footer.php"
?>


</body>
</html>