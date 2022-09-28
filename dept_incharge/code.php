<?php
session_start();
include_once 'database/dbconfig.php';
// require_once 'security.php';


//Department Incharge Login


if(isset($_POST['dept_incharge_login']))
{   
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ref="dept_incharge/";
    $login_data=$database->getReference($ref)->getValue();
    if($login_data > 0)
    {
        foreach($login_data as $key => $row)
            {
                if( $row['email'] == $email)
                {
                    if($row["password"] == $password)
                    {
                        $_SESSION['dept_incharge_key']=$key;
                        $_SESSION['dept_incharge_email']=$email;
                        $_SESSION['dept_incharge_name']=$row["name"];
                        $_SESSION['dept_incharge_dept']=$row["dept"];
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
        $_SESSION['status']="You Haven't Registered Yet. Please Contact Administrator";
        header('Location:index.php');
    }


}

//Logout

if(isset($_POST['dept_incharge_logout']))
{

	unset($_SESSION['dept_incharge_key']);
    unset($_SESSION['dept_incharge_email']);
    unset($_SESSION['dept_incharge_name']);
    unset($_SESSION['dept_incharge_dept']);
	header('Location: index.php');
}



// Company Adding

if(isset($_POST['add_company']))
{   
        $dept = $_POST['dept'];
        $company_name = $_POST['company_name'];
        $company_site = $_POST['company_site'];

        $data= [
            'dept' => $dept,
            'company_name' => $company_name,
            'company_site' => $company_site
        ];
    
        $ref="admin/companies";
        $company_details = $database->getReference($ref)->push($data);
    
        if($company_details)
        {
            $_SESSION['success'] = "Company Details Added Successfully";
            header('Location: companies.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add Company Details.Please Try Again";
            header('Location: companies.php');
        }

    

}



// Company Updating



if(isset($_POST['update_company']))
{   
    $id = $_POST['update_companyid'];  
    $dept = $_POST['dept'];
    $company_name = $_POST['company_name'];
    $company_site = $_POST['company_site'];

    $data= [
        'dept' => $dept,
        'company_name' => $company_name,
        'company_site' => $company_site
    ];


   
    $ref="admin/companies";
    $update_companies=$database->getReference($ref)->getChild($id)->update($data);

    if($update_companies)
    {
        $_SESSION['success'] = "Company Details Updated Successfully";
        header('Location: companies.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update Company Details.Please Try Again";
        header('Location: companies.php');
    }

    

}


// Delete Company


if(isset($_POST['delete_company']))
{   
    $id = $_POST['delete_companyid'];   
    $ref="admin/companies";
    $delete_company=$database->getReference($ref)->getChild($id)->remove();

    if($delete_company)
    {
        $_SESSION['success'] = "Company Details Deleted Successfully";
        header('Location: companies.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete Company Details.Please Try Again";
        header('Location: companies.php');
    }

    

}










// News Adding

if(isset($_POST['add_news']))
{   
        $dept = $_POST['dept'];
        $news_title = $_POST['news_title'];
        $news = $_POST['news'];
        $news_link = $_POST['news_link'];
        

        $data= [
            'dept' => $dept,
            'news_title' => $news_title,
            'news' => $news,
            'news_link' => $news_link
        ];
    
        $ref="admin/news";
        $news = $database->getReference($ref)->push($data);
    
        if($news)
        {
            $_SESSION['success'] = "News Added Successfully";
            header('Location: news.php');
        }
        else
        {
            $_SESSION['status'] = "Failed to Add News.Please Try Again";
            header('Location: news.php');
        }

    

}



// News Updating



if(isset($_POST['update_news']))
{   
    $id = $_POST['update_newsid'];  
    $dept = $_POST['dept'];
    $news_title = $_POST['news_title'];
    $news = $_POST['news'];
    $news_link = $_POST['news_link'];
    

    $data= [
        'dept' => $dept,
        'news_title' => $news_title,
        'news' => $news,
        'news_link' => $news_link
    ];

   
    $ref="admin/news";
    $update_news=$database->getReference($ref)->getChild($id)->update($data);

    if($update_news)
    {
        $_SESSION['success'] = "News Updated Successfully";
        header('Location: news.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Update News.Please Try Again";
        header('Location: news.php');
    }

    

}


// Delete News


if(isset($_POST['delete_news']))
{   
    $id = $_POST['delete_newsid'];   
    $ref="admin/news";
    $delete_news=$database->getReference($ref)->getChild($id)->remove();

    if($delete_news)
    {
        $_SESSION['success'] = "News Deleted Successfully";
        header('Location: news.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to Delete News.Please Try Again";
        header('Location: news.php');
    }

    

}






?>