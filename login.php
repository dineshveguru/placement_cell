<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Placement Cell - Jntuacep</title>
    <?php
        require_once 'components/links.php';
    ?>
</head>
    <style>
  
#about-us{
	background: #f8f9fa;
	padding-bottom:50px;
	padding-top: 80px
}
.login-title{
	color:#ED0920;
	font-weight: bold;
	font-size: 18px;
}
.title::before{
	content: '';
	background: #000;
	height: 5px;
	width: 200px;
	margin-left: auto;
	margin-right: auto;
	display: block;
	transform: translateY(46px); 
}
.title::after{
	content: '';
	background: #000;
	height: 10px;
	width: 50px;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 40px;
	display: block;
	transform: translateY(5px); 
}
.login-btns{
    padding:8px 100px;
    font-size : 15px;
	color: #44435b;
	background: #fff;
	border: 1.5px solid #44435b;
	border-radius: 3px;
	font-weight: bold;
	margin-bottom: 15px !important;
}
.login-btns:hover{
	padding:8px 100px;
	color: #fff;
	background: #44435b;
	border: 1.5px solid #44435b;
	font-weight: bold;
}

@media only screen and (min-width: 250px) and (max-width:480px) 
{
	.login-btns{
		padding:8px 55px;
        font-size:13px;
		background: #fff;
		margin-bottom: 15px !important;
	}
	.login-btns:hover{
		padding:8px 55px;
	}
}



@media only screen and (min-width: 481px) and (max-width:1025px) 
{
	.login-btns{
        padding:8px 55px;
        font-size : 15px;
		margin-bottom: 15px !important;
	}
	.login-btns:hover{
		padding:8px 55px;
	}

}

    </style>
<section id="about-us">
    <div class="container">
        <h3 class="title text-center font-weight-bold">Login Here</h3>
    
    <div class="card shadow shadow-lg p-3 mb-5 bg-white rounded ">
        <div class="row text-center d-flex flex-sm-row-reverse">
        <div class="col-md-6">
                        <img src="assets/img/login.svg" class="img-fluid pb-3" width="350" height="320">
                </div>

            <div class="col-md-6 pt-4">
                    <p><a style="text-decoration:none;" href="student/index.php" class="login-btns"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Student Login&nbsp; &nbsp;&nbsp;</a></p>
                    <br>
                    <p><a style="text-decoration:none;" href="placement_officer/index.php" class="login-btns"><i class="fa fa-user" aria-hidden="true"></i> Placement Officer</a></p>
                    <br>
                    <p> <a style="text-decoration:none;" href="asst_placement_officer/index.php" class="login-btns"><i class="fa fa-user" aria-hidden="true"></i> Asst.Placement Officer</a></p>
                    <br>
                    <p><a style="text-decoration:none;" href="dept_incharge/index.php" class="login-btns"><i class="fa fa-building" aria-hidden="true"></i> Department Incharge</a></p>
                    <br>
                    <p><a style="text-decoration:none;" href="company/index.php" class="login-btns"><i class="fa fa-home" aria-hidden="true"></i> Company Login </a></p>
                </div>

        </div>
        <hr style="background:#676491;">
        <p class="login-title" style="text-align:center;">You have not registered yet ?? &nbsp;<a href="">Contact Us</a></p>
    </div>


    </div>
    </section>

