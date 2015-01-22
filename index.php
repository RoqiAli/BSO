<!DOCTYPE html>
<html>
<head>
	<title>BIMBO | Bimbingan Skripsi Online</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/ownstyle.css">
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body id="top" class="index">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
					<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#top">BIMBO</a>
			</div>
			<div class="collapse navbar-collapse" id="nav">
				<ul class="nav navbar-nav navbar-left">
                    <li class="hidden"><a href="#top"></a></li>
                    <li class="page-scroll"><a href="#about">About</a></li>
                    <li class="page-scroll"><a href="#contact">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-form navbar-right">
                	<li class="page-scroll">
                		<form role="form" method="POST" action="login.php">
							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="E-mail">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<input type="submit" class="btn btn-success" style="background-color:#18bc9c" value="Log In"/>
						</form>
                	</li>
                </ul>
			</div>
		</div>
	</nav>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img class="img-responsive" src="img/grad.png" alt="logo">
					<div class="intro-text">
						<span class="name">Welcome</span>
                        <span class="skills">Connect with your Teacher — and other Student.<br>And watch events unfold, in real time, from every angle.</span>
					</div>
				</div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <span class="section-heading">Sign Up !</span><br><br>
                    <div class="row">
                        <div id="regform" class="panel-body" style="background-color:rgba(255, 255, 255, 0.4)">
                            <ul class="nav nav-tabs"> 
                                 <li class="active"><a href="#teacher" data-toggle="tab" style="font-size:18px;padding-left:80px; padding-right:80.5px">Teacher</a></li>
                                <li><a href="#student" data-toggle="tab" style="font-size:18px;padding-left:80px; padding-right:80.5px;">Student</a></li>
                            </ul> 
                            <div class="tab-content" style="margin-top:10px;"> 
                                <div class="tab-pane fade in active" id="teacher">
                                    <?php include "registeration-teacher-form.php"; ?>
                                </div> 
                                <div class="tab-pane fade" id="student">
                                    <?php include "registeration-student-form.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2><br><br><br>
                </div>
            </div>
            <div class="row">
                <?php include "about-us.php"; ?>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="color:#18bc9c">Contact Us</h2><br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php include "contact-us.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; BIMBO (Bimbingan Skripsi Online) 2014 
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
</body>
</html>