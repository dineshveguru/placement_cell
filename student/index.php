<?php 
    session_start();
    $auth = isset($_SESSION['student_email'])  && isset($_SESSION['student_key']) && isset($_SESSION['student_name']);
    if(!$auth)
    {
        echo"<script> href.location = 'https://jntuacep.ac.in/placement_cell/student/index.php';</script>";
    }  
    else{
        echo"<script> location.href = 'https://jntuacep.ac.in/placement_cell/student/dashboard.php';</script>";
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#F05F40">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Placement Cell Jntuacep - Login</title>
    <link rel="shortcut icon" href="assets/img/logo.png" sizes="16x16" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    body{
        background:#F5F8F8;
        font-family:'Poppins',sans-serif;
    }
    a
    {
        text-decoration:none!important;
    }
    
    .logo-brand{
        color:#000;
        font-size:35px;
        font-weight:700;
    }
    .logo-brand span{
        color:#6d99d6;
    }
    .heading img{
        padding-bottom:10px;
    }

    .login-btn{
        padding:7px 85px;
        border-radius:5px;
        border:2px solid #6d99d6;
        background:#fff;
        color:#6d99d6;
        font-size:17px;
        font-weight:600;
        cursor:pointer;
    }
    .login-btn:hover{
       outline-color:#fff;
        border:2px solid #fff;
        background:#6d99d6;
        color:#fff;
    }
    .navbar-brand{
	color: #000 !important;
	font-weight: bold !important;
	font-size: 25px !important;
}



    @media screen and (max-width:769px) and (min-width: 0px) {
        .login-form{
        padding-top:3px;
    }
    .desktop-only {
    display: none;
 }
 }
 
 
 @media (min-width: 1025px) {
  
    .login-form{
        padding-top:70px;
    }
    .mobile-only {
    display: none;
 }
  
 }
 @media (min-width: 770px) and (max-width: 1024px) {
  
    .login-form{
        padding-top:3px;
    }
    .mobile-only {
    display: none;
 }
 }

    </style>
</head>
<body ondragstart="return false">
    
    <div class="container">

        <div class="heading d-flex justify-content-between pt-4">
           
             <a class="navbar-brand pt-2 pl-2" href="https://jntuacep.ac.in/placement_cell/login.php"> <span style="color:#6d99d6;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</span> </a>
              <a class="navbar-brand pt-2 pl-2" href="index.php">Career <span style="color:#6d99d6;">Club</span> </a>
        </div>

        <div class="row text-center">
            <div class="col-md-6 shadow">
                <img src="assets/img/login-img.png" alt="" class="img-fluid">
            </div>
        <div class="col-md-6 text-left login-form">
 
        <form action="code.php" method="POST">
             <p class="logo-brand text-center"><i class="fa fa-user" aria-hidden="true"></i> <span>LogIn </span></p>
             <?php

                if(isset($_SESSION['success']) && $_SESSION['success']!='')
                {
                    echo'<div class="alert alert-primary text-center font-weight-bold" role="alert">'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                }

                if(isset($_SESSION['status']) && $_SESSION['status']!='')
                {
                    echo'<div class="alert alert-danger text-center font-weight-bold" role="alert">'.$_SESSION['status'].'</div>';
                    unset($_SESSION['status']);
                }

                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="bmd-label-floating">Email ID:</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" required>
                    <span class="bmd-help">Please Enter Your Valid Email</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Password :</label>
                    <input type="password" name="password" class="form-control" id="myInput" required>
                    <span class="bmd-help">Please Enter Your Password</span>
                </div>
                <br>
                <div class="row">
                <div class="form-group col-md-6">
                    <input type="checkbox" onclick="myFunction1()">&nbsp;Show Password
                </div>   
               <p class=" col-md-6">Not a member ? <a href="" data-toggle="modal" data-target="#student_register">Register Here </a></p>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" name="student_login" class="login-btn">Login</button>
                </div>

        </form>
        </div>
        </div>
    </div>


<hr class="mobile-only">
    <footer>
    <p class="font-weight-bold text-center">&copy; <?php echo date('Y')?> Jntuacep. All Rights Reserved | <a href="">Privacy Policy</a></p>
    <hr>
    <p class="font-weight-bold text-center">Powered by <a href="https://www.simuleduco.in" target="_blank">Simuleduco Solutions</a></p>
    </footer>




<!-- Register Student Details Modal -->

<div class="modal fade" id="student_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel">REGISTRATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="code.php" method="POST">
      
                <div class="form-group">
                    <label for="exampleInputEmail1" class="bmd-label-floating">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                    <span class="bmd-help">Please Enter Your Name</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Email</label>
                    <input type="email" name="email" class="form-control" id="myInpuemailt" required>
                    <span class="bmd-help">Please Enter Your Email</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="bmd-label-floating">Mobile</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputmobile" required>
                    <span class="bmd-help">Please Enter Your Mobile Number</span>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Admission No.</label>
                    <input type="text" name="admno" class="form-control" required>
                    <span class="bmd-help">Please Enter Your Admission Number</span>
                </div>
                <div class="form-group">
                    <label>Branch <span class="text-danger">*</span></label><br>
                    <select class="custom-select " name="dept" required>
                    <option value ="">Select Branch</option>
                    <option value="cse">Computer Science & Engineering</option>
                    <option value="ece">Electronics and Communications Engineering</option>
                    <option value="eee">Electrical and Electronics Engineering</option>
                    <option value="mech">Mechanical Engineering</option>
                    <option value="civil">Civil Engineering</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>College <span class="text-danger">*</span></label><br>
                    <select class="custom-select " name="clg" required>
                    <option value ="">Select College</option>
                    <option value="jntp">JNTUA College Of Engineering,Pulivendula</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
                    <input type="password" name="password" class="form-control" id="myInput1" required>
                    <span class="bmd-help">Please Enter Your Password</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="bmd-label-floating">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="myInput2" required>
                    <span class="bmd-help">Please Enter Your Password Again</span>
                </div>
                <div class="form-group col-md-6">
                    <input type="checkbox" onclick="myFunction2()">&nbsp;Show Password
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" name="student_register" class="login-btn">Register</button>
                </div>

        </form>
    </div>
  </div>
</div>


<script>

function myFunction1() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text"
   
  } else {
    x.type = "password";
    
  }
}
function myFunction2() {
  var x = document.getElementById("myInput1");
  var y = document.getElementById("myInput2");
  if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text"
   
  } else {
    x.type = "password";
    y.type = "password";
  }
}
</script>


</body>
</html>











