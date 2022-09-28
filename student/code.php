<?php
session_start();
include_once 'database/dbconfig.php';
// require_once 'security.php';

//Students Register

if(isset($_POST['student_register']))
{   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dept=$_POST['dept'];
    $admno=$_POST['admno'];
    $clg=$_POST['clg'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);
    if($password == $cpassword)
    {
        $data= [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'admno' => $admno,
            'clg' => $clg,
            'password' => $password,
            'dept' => $dept
        ];
    
        $ref="students";
        $registered_data = $database->getReference($ref)->push($data);
    
    
        if($registered_data)
        {
         
                $_SESSION['success'] = " You are Registered Successfully Please Login";
                header('Location: index.php');
            
        }
        else
        {
            $_SESSION['status'] = " Registration unsuccessful Please try again";
            header('Location: index.php');   
        }
    
    }
    else
    {
        $_SESSION['status'] = " Passwords Doesn't Match  Please try again";
        header('Location: index.php'); 
    }
    
}



//Student Login


if(isset($_POST['student_login']))
{   
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ref="students/";
    $login_data=$database->getReference($ref)->getValue();
    if($login_data > 0)
    {
        foreach($login_data as $key => $row)
            {
                if( $row['email'] == $email)
                {
                    if($row["password"] == $password)
                    {
                        $_SESSION['student_key']=$key;
                        $_SESSION['student_email']=$email;
                        $_SESSION['student_name']=$row["name"];
                        $_SESSION['student_dept']=$row["dept"];
                        $_SESSION['student_admno']=$row["admno"];
                        header('Location:dashboard.php');
                    }
                    else
                    {
                        $_SESSION['status']="Incorrect Password Entered. Please Try Again";
                        header('Location:index.php');
                    }
                }
               
            }
    
    }
    else
    {
        $_SESSION['status']="You Haven't Registered Yet. Please Register";
        header('Location:index.php');
    }


}

//Logout

if(isset($_POST['logout']))
{

	unset($_SESSION['student_key']);
    unset($_SESSION['student_email']);
    unset($_SESSION['student_name']);
    unset($_SESSION['student_dept']);
	header('Location: index.php');
}









// Profile Image Updating



if(isset($_POST['update_profile_image']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_profile_imageid'];

    #unlink("certificates/$certificate_id.pdf");

    $target_dir = "profile_images/";
    $target_file = $target_dir . basename($_FILES["profileimageupload"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    
    $temp = explode(".", $_FILES["profileimageupload"]["name"]);
    $newfilename =  $key.".". end($temp);
    
    $existsfile = $target_dir .$newfilename;
        
    // Check if file already exists
    if (file_exists($existsfile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($filetype != "png") {
        echo "Sorry, only pdf's are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    
    if (move_uploaded_file($_FILES["profileimageupload"]["tmp_name"], "profile_images/" . $newfilename)) {
        $_SESSION['success2'] = "Profile Image Updated Successfully";
        header('Location: profile.php');
        }
    else
    {
        $_SESSION['status2'] = "Failed to Update Profile Image.Please Try Again";
        header('Location: profile.php');
    }
    }

    

}





// Delete Profile Image


if(isset($_POST['delete_profile_image']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_profile_imageid'];
    unlink("profile_images/$key.png");

    if(unlink("profile_images/$key.png"))
    {
        $_SESSION['success2'] = "Profile Image Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status2'] = "Failed to Delete Profile Image.Please Try Again";
        header('Location: profile.php');
    }   

}



































// Social Links Adding

if(isset($_POST['add_social_links']))
{   

        $id = $_SESSION['student_key'];
        $account = $_POST['account'];
        $link = $_POST['link'];

        $data= [
            'account' => $account,
            'link' => $link
        ];
    
        $ref="students/$id/social_links";
        $social_links = $database->getReference($ref)->push($data);
    
        if($social_links)
        {
            $_SESSION['success'] = "Social Link Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add Social Link.Please Try Again";
            header('Location: profile.php');
        }

    

}



// Social Links Updating



if(isset($_POST['update_social_links']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_social_linksid'];
    $account = $_POST['account'];
    $link = $_POST['link'];

    $data= [
        'account' => $account,
        'link' => $link
    ];


   
    $ref="students/$key/social_links";
    $update_social_links=$database->getReference($ref)->getChild($id)->update($data);

    if($update_social_links)
    {
        $_SESSION['success'] = "Social Links Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Social Links.Please Try Again";
        header('Location: profile.php');
    }

    

}


// Delete Social Links


if(isset($_POST['delete_social_links']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_social_linksid'];   
    $ref="students/$key/social_links";
    $delete_social_links=$database->getReference($ref)->getChild($id)->remove();

    if($delete_social_links)
    {
        $_SESSION['success'] = "Social Links Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Social Links.Please Try Again";
        header('Location: profile.php');
    }

}


























// Offer Letter Adding

if(isset($_POST['add_offer']))
{   

        $id = $_SESSION['student_key'];
        $company = $_POST['company'];
        $package = $_POST['package'];
        $offer_type = $_POST['offer_type'];
        $offer_link = $_POST['offer_link'];

        $data= [
            'company' => $company,
            'package' => $package,
            'offer_type' => $offer_type,
            'offer_link' => $offer_link
            
        ];
    
        $ref="students/$id/offers";
        $social_links = $database->getReference($ref)->push($data);
    
        if($social_links)
        {
            $_SESSION['success2'] = "Offer Letter Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status2'] = "Failed to Add Offer Letter.Please Try Again";
            header('Location: profile.php');
        }

    

}



// Offer Letter Updating



if(isset($_POST['update_offer']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_offerid'];
    $company = $_POST['company'];
    $package = $_POST['package'];
    $offer_type = $_POST['offer_type'];
    $offer_link = $_POST['offer_link'];

    $data= [
        'company' => $company,
        'package' => $package,
        'offer_type' => $offer_type,
        'offer_link' => $offer_link
        
    ];


   
    $ref="students/$key/offers";
    $update_offer=$database->getReference($ref)->getChild($id)->update($data);

    if($update_offer)
    {
        $_SESSION['success2'] = "Offer Letter Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status2'] = "Failed to Update Offer Letter.Please Try Again";
        header('Location: profile.php');
    }

    

}


// Delete Offer Letter


if(isset($_POST['delete_offer']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_offerid'];   
    $ref="students/$key/offers";
    $delete_offer=$database->getReference($ref)->getChild($id)->remove();

    if($delete_offer)
    {
        $_SESSION['success2'] = "Offer Letter Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status2'] = "Failed to Delete Offer Letter.Please Try Again";
        header('Location: profile.php');
    }

}








































// Coding Platform Adding

if(isset($_POST['add_coding_platform']))
{   

        $id = $_SESSION['student_key'];
        $platform = $_POST['platform'];
        $rank = $_POST['rank'];
        $profile_link = $_POST['profile_link'];

        $data= [
            'platform' => $platform,
            'rank' => $rank,
            'profile_link' => $profile_link
        ];
    
        $ref="students/$id/coding_platforms";
        $social_links = $database->getReference($ref)->push($data);
    
        if($social_links)
        {
            $_SESSION['success'] = "Coding Platform Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add Coding Platform.Please Try Again";
            header('Location: profile.php');
        }

    

}



// Coding Platform Updating



if(isset($_POST['update_coding_platforms']))
{   
    $key = $_SESSION['student_key'];
    $platform = $_POST['platform'];
    $rank = $_POST['rank'];
    $profile_link = $_POST['profile_link'];
    $id = $_POST['update_coding_platformsid'];

    $data= [
        'platform' => $platform,
        'rank' => $rank,
        'profile_link' => $profile_link
    ];


   
    $ref="students/$key/coding_platforms";
    $update_social_links=$database->getReference($ref)->getChild($id)->update($data);

    if($update_social_links)
    {
        $_SESSION['success'] = "Coding Platform Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Coding Platform.Please Try Again";
        header('Location: profile.php');
    }

    

}


// Delete Coding Platform


if(isset($_POST['delete_coding_platforms']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_coding_platformsid'];   
    $ref="students/$key/coding_platforms";
    $delete_coding_platforms=$database->getReference($ref)->getChild($id)->remove();

    if($delete_coding_platforms)
    {
        $_SESSION['success'] = "Coding Platform Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Coding Platform.Please Try Again";
        header('Location: profile.php');
    }

}










// Research Paper Adding

if(isset($_POST['add_paper']))
{   

        $id = $_SESSION['student_key'];
        $paper_name = $_POST['paper_name'];
        $paper_description = $_POST['paper_description'];
        $paper_link = $_POST['paper_link'];

        $data= [
            'paper_name' => $paper_name,
            'paper_description' => $paper_name,
            'paper_link' => $paper_link
        ];
    
        $ref="students/$id/research_papers";
        $paper = $database->getReference($ref)->push($data);
    
        if($paper)
        {
            $_SESSION['success'] = "Research Paper Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add Research Paper.Please Try Again";
            header('Location: profile.php');
        }

    

}



// Research Paper Updating



if(isset($_POST['update_paper']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_paperid'];

    $paper_name = $_POST['paper_name'];
    $paper_description = $_POST['paper_description'];
    $paper_link = $_POST['paper_link'];

    $data= [
        'paper_name' => $paper_name,
        'paper_description' => $paper_description,
        'paper_link' => $paper_link
    ];

   
    $ref="students/$key/research_papers";
    $update_paper=$database->getReference($ref)->getChild($id)->update($data);

    if($update_paper)
    {
        $_SESSION['success'] = "Research Paper Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Research Paper.Please Try Again";
        header('Location: profile.php');
    }

    

}


// Delete Research Paper 


if(isset($_POST['delete_paper']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_paperid'];   
    $ref="students/$key/research_papers";
    $delete_coding_platforms=$database->getReference($ref)->getChild($id)->remove();

    if($delete_coding_platforms)
    {
        $_SESSION['success'] = "Research Paper  Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Research Paper.Please Try Again";
        header('Location: profile.php');
    }

}






















// Education details Adding

if(isset($_POST['add_education']))
{   

        $id = $_SESSION['student_key'];
        $school = $_POST['school'];
        $stream = $_POST['stream'];
        $gpa = $_POST['gpa'];
        $passing_year = $_POST['passing_year'];

        $data= [
            'school' => $school,
            'stream' => $stream,
            'gpa' => $gpa,
            'passing_year' => $passing_year
        ];
    
        $ref="students/$id/education_details";
        $education_details = $database->getReference($ref)->push($data);
    
        if($education_details)
        {
            $_SESSION['success'] = "Education Details Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add Education Details.Please Try Again";
            header('Location: profile.php');
        }

    

}



// Education details Updating



if(isset($_POST['update_education']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_educationid'];
    $school = $_POST['school'];
    $stream = $_POST['stream'];
    $gpa = $_POST['gpa'];
    $passing_year = $_POST['passing_year'];
    $data= [
        'school' => $school,
        'stream' => $stream,
        'gpa' => $gpa,
        'passing_year' => $passing_year
    ];


   
    $ref="students/$key/education_details";
    $update_education=$database->getReference($ref)->getChild($id)->update($data);

    if($update_education)
    {
        $_SESSION['success'] = "Education Details Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Education Details.Please Try Again";
        header('Location: profile.php');
    }

    

}


// Delete Education


if(isset($_POST['delete_education']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_educationid'];   
    $ref="students/$key/education_details";
    $delete_education=$database->getReference($ref)->getChild($id)->remove();

    if($delete_education)
    {
        $_SESSION['success'] = "Education Details Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Education Details.Please Try Again";
        header('Location: profile.php');
    }

    

}







// Skill Adding

if(isset($_POST['add_skills']))
{   

        $id = $_SESSION['student_key'];
        $skill = $_POST['skill'];

        $data= [
            'skill' => $skill,
        ];
    
        $ref="students/$id/skills";
        $education_details = $database->getReference($ref)->push($data);
    
        if($education_details)
        {
            $_SESSION['success1'] = "Skill Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status1'] = "Failed to Add Skill.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Skills Updating



if(isset($_POST['update_skills']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_skillsid'];
    $skill = $_POST['skill'];
    $data= [
        'skill' => $skill
    ];


   
    $ref="students/$key/skills";
    $update_skills=$database->getReference($ref)->getChild($id)->update($data);

    if($update_skills)
    {
        $_SESSION['success1'] = "Skill Updated Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status1'] = "Failed to Update Skill.Please Try Again";
        header('Location: profile.php');
    }

    

}





// Delete Skills


if(isset($_POST['delete_skills']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_skillsid'];   
    $ref="students/$key/skills";
    $delete_skills=$database->getReference($ref)->getChild($id)->remove();

    if($delete_skills)
    {
        $_SESSION['success1'] = "Skill Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status1'] = "Failed to Delete Skill.Please Try Again";
        header('Location: profile.php');
    }

    

}





// Certification Adding

if(isset($_POST['add_certification']))
{   

        $id = $_SESSION['student_key'];
        $token = '123412321321412320970033241232412321421232121241201089723223232123208078011324';
        $token = str_shuffle($token);
        $certificate_id = substr($token, 0, 10);
        $certification = $_POST['certification'];
        $platform = $_POST['platform'];

        if($_POST['certification_link'] != '' )
        {
            $certification_link = $_POST['certification_link'];
        }
        else
        {
            $certification_link = "";
        }

                
        $target_dir = "certificates/";
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        
        $temp = explode(".", $_FILES["fileupload"]["name"]);
        $newfilename =  $certificate_id.".". end($temp);
      
        $existsfile = $target_dir .$newfilename;
          
        // Check if file already exists
        if (file_exists($existsfile)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($filetype != "pdf") {
          echo "Sorry, only pdf's are allowed.";
          $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
      
      if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], "certificates/" . $newfilename)) {
          }
        }


        
        $data= [
            'certificate_id' => $certificate_id,
            'certification' => $certification,
            'certification_link' => $certification_link,
            'platform' => $platform
        ];
    
        $ref="students/$id/certifications";
        $add_certification = $database->getReference($ref)->push($data);
    
        if($add_certification)
        {
            $_SESSION['success2'] = "Certification Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status2'] = "Failed to Add Certification.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Certifications Updating



if(isset($_POST['update_certification']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_certificationid'];
    $certification = $_POST['certification'];
    $platform = $_POST['platform'];
    $certificate_id = $_POST['certificate_id'];



    if($_POST['certification_link'] != '' )
    {
        $certification_link = $_POST['certification_link'];
    }
    else
    {
        $certification_link = "";
    }
    unlink("certificates/$certificate_id.pdf");

    $target_dir = "certificates/";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    $uploadOk = 1;
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    
    $temp = explode(".", $_FILES["fileupload"]["name"]);
    $newfilename =  $certificate_id.".". end($temp);
    
    $existsfile = $target_dir .$newfilename;
        
    // Check if file already exists
    if (file_exists($existsfile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($filetype != "pdf") {
        echo "Sorry, only pdf's are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    
    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], "certificates/" . $newfilename)) {
        }
    }


    $data= [
        'certification' => $certification,
        'certification_link' => $certification_link,
        'platform' => $platform
    ];


   
    $ref="students/$key/certifications";
    $update_certification=$database->getReference($ref)->getChild($id)->update($data);

    if($update_certification)
        {
            $_SESSION['success2'] = "Certification Updated Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status2'] = "Failed to Update Certification.Please Try Again";
            header('Location: profile.php');
        }

    

}





// Delete Certifiacations


if(isset($_POST['delete_certification']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_certificationid'];
    $certificate_id = $_POST['delete_certifice_id'];
    $ref="students/$key/certifications";
    unlink("certificates/$certificate_id.pdf");
    $delete_certification=$database->getReference($ref)->getChild($id)->remove();

    if($delete_certification)
    {
        $_SESSION['success2'] = "Certification Deleted Successfully";
        header('Location: profile.php');
    }
    else
    {
        $_SESSION['status2'] = "Failed to Delete Certification.Please Try Again";
        header('Location: profile.php');
    }   

}








// Workshop Adding

if(isset($_POST['add_workshop']))
{   

        $id = $_SESSION['student_key'];
        $workshop = $_POST['workshop'];
        $data= [
            'workshop' => $workshop,
        ];
    
        $ref="students/$id/workshops";
        $add_certification = $database->getReference($ref)->push($data);
    
        if($add_certification)
        {
            $_SESSION['success3'] = "Workshop Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status3'] = "Failed to Add Workshop.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Workshop Updating



if(isset($_POST['update_workshop']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_workshopid'];
    $workshop = $_POST['workshop'];

    $data= [
        'workshop' => $workshop,
    ];


   
    $ref="students/$key/workshops";
    $update_certification=$database->getReference($ref)->getChild($id)->update($data);

    if($update_certification)
        {
            $_SESSION['success3'] = "Workshop Updated Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status3'] = "Failed to Update Workshop.Please Try Again";
            header('Location: profile.php');
        }

    

}





// Delete Workshop


if(isset($_POST['delete_workshop']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_workshopid'];   
    $ref="students/$key/workshops";
    $delete_certification=$database->getReference($ref)->getChild($id)->remove();

    if($delete_certification)
        {
            $_SESSION['success3'] = "Workshop Deleted Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status3'] = "Failed to Delete Workshop.Please Try Again";
            header('Location: profile.php');
        }   

}














// Achievement Adding

if(isset($_POST['add_achievement']))
{   

        $id = $_SESSION['student_key'];
        $achievement = $_POST['achievement'];
        $data= [
            'achievement' => $achievement,
        ];
    
        $ref="students/$id/achievements";
        $add_achievement = $database->getReference($ref)->push($data);
    
        if($add_achievement)
        {
            $_SESSION['success4'] = "Achievement Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status4'] = "Failed to Add Achievement.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Achievement Updating



if(isset($_POST['update_achievement']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_achievementid'];
    $achievement = $_POST['achievement'];

    $data= [
        'achievement' => $achievement,
    ];


   
    $ref="students/$key/achievements";
    $update_certification=$database->getReference($ref)->getChild($id)->update($data);

    if($update_certification)
        {
            $_SESSION['success4'] = "Achievement Updated Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status4'] = "Failed to Update Achievement.Please Try Again";
            header('Location: profile.php');
        }

    

}





// Delete Achievement


if(isset($_POST['delete_achievement']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_achievementid'];   
    $ref="students/$key/achievements";
    $delete_achievement=$database->getReference($ref)->getChild($id)->remove();

    if($delete_achievement)
        {
            $_SESSION['success4'] = "Achievement Deleted Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status4'] = "Failed to Delete Achievement.Please Try Again";
            header('Location: profile.php');
        }   

    

}





// Positions Of Responsibilities Adding

if(isset($_POST['add_responsibility']))
{   

        $id = $_SESSION['student_key'];
        $responsibility = $_POST['responsibility'];
        $data= [
            'responsibility' => $responsibility,
        ];
    
        $ref="students/$id/responsibilities";
        $add_responsibilities = $database->getReference($ref)->push($data);
    
        if($add_responsibilities)
        {
            $_SESSION['success5'] = "Responsibility Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status5'] = "Failed to Add Responsibility.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Positions Of Responsibilities Updating



if(isset($_POST['update_responsibility']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_responsibilityid'];
    $responsibility = $_POST['responsibility'];

    $data= [
        'responsibility' => $responsibility,
    ];


   
    $ref="students/$key/responsibilities";
    $update_certification=$database->getReference($ref)->getChild($id)->update($data);

    if($update_certification)
        {
            $_SESSION['success5'] = "Responsibility Updated Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status5'] = "Failed to Update Responsibility.Please Try Again";
            header('Location: profile.php');
        }

    

}





// Delete Positions Of Responsibilities


if(isset($_POST['delete_responsibility']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_responsibilityid'];   
    $ref="students/$key/responsibilities";
    $delete_responsibility=$database->getReference($ref)->getChild($id)->remove();

    if($delete_responsibility)
        {
            $_SESSION['success5'] = "Responsibility Deleted Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status5'] = "Failed to Delete Responsibility.Please Try Again";
            header('Location: profile.php');
        }   

    

}





// Projects Adding

if(isset($_POST['add_project']))
{   

        $id = $_SESSION['student_key'];
        $project_name = $_POST['project_name'];
        $project_description = $_POST['project_description'];
        $project_link = $_POST['project_link'];
        $data= [
            'project_name' => $project_name,
            'project_description' => $project_description,
            'project_link' => $project_link
        ];
    
        $ref="students/$id/projects";
        $projects = $database->getReference($ref)->push($data);
    
        if($projects)
        {
            $_SESSION['success6'] = "Project Added Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status6'] = "Failed to Add Project.Please Try Again";
            header('Location: profile.php');
        }

    

}







// Projects Updating



if(isset($_POST['update_project']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['update_projectid'];
    $project_name = $_POST['project_name'];
    $project_description = $_POST['project_description'];
    $project_link = $_POST['project_link'];
    $data= [
        'project_name' => $project_name,
        'project_description' => $project_description,
        'project_link' => $project_link
    ];


   
    $ref="students/$key/projects";
    $update_project=$database->getReference($ref)->getChild($id)->update($data);

    if($update_project)
        {
            $_SESSION['success6'] = "Project Updated Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status6'] = "Failed to Update Project.Please Try Again";
            header('Location: profile.php');
        }

    

}





// Delete Projects


if(isset($_POST['delete_project']))
{   
    $key = $_SESSION['student_key'];
    $id = $_POST['delete_projectid'];   
    $ref="students/$key/projects";
    $delete_project=$database->getReference($ref)->getChild($id)->remove();

    if($delete_project)
        {
            $_SESSION['success6'] = "Project Deleted Successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status6'] = "Failed to Delete Project.Please Try Again";
            header('Location: profile.php');
        }   

    

}













if(isset($_POST['user_mail']))
{   
    $user_id = $_SESSION['id'];
    $tutorial_mail = $_POST['tutorial_mail'];
    $program_mail = $_POST['program_mail'];
    $contest_mail = $_POST['contest_mail'];
    $social_mail = $_POST['social_mail'];
    $survey_mail = $_POST['survey_mail'];

    

   
        $query = "UPDATE user_details SET tutorial_mail = '$tutorial_mail',program_mail = '$program_mail',contest_mail = '$contest_mail',social_mail = '$social_mail',survey_mail = '$survey_mail' WHERE user_id = '$user_id'";
        $query_run = mysqli_query($con,$query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Email settings Updated successfully";
            header('Location: settings.php');
        }
        else
        {
            $_SESSION['status2'] = "Failed to Update Email Settings ";
            header('Location: settings.php');
        }

    

}



?>