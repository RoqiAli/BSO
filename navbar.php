<nav class="navbar navbar-default navbar-static-top navbel" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php" style="color:#FFF">BIMBO</a>
        </div>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="nav navbar-nav navbar-form navbar-left">
                <li class="page-scroll">
                    <div class="form-group input-group">
                        <input type="text" class="form-control" placeholder="Search posts, users and more. . ." style="height:28px;width:526px;">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#FFF">
                        <?php
                            include "conn.php";
                            $email = $_SESSION['email'];
                            if(strcmp($_SESSION['user_type'], "student") == 0){
                                $sql = "SELECT * FROM student WHERE email='$email'";
                                $result = mysqli_query($cxn,$sql);
                                $name = mysqli_fetch_assoc($result);
                                $first_name = $name['first_name'];
                                $last_name = $name['last_name'];
                                $university = $name['university'];
                                $teacher_code = $name['teacher_code'];
                                $profile_link = "student-profile.php";
                                echo "$first_name $last_name";
                            } else if(strcmp($_SESSION['user_type'], "teacher") == 0){
                                $sql = "SELECT * FROM teacher WHERE email='$email'";
                                $result = mysqli_query($cxn,$sql);
                                $name = mysqli_fetch_assoc($result);
                                $first_name = $name['first_name'];
                                $last_name = $name['last_name'];
                                $university = $name['university'];
                                $teacher_code = $name['teacher_code'];
                                echo "$first_name $last_name";
                                $profile_link = "teacher-profile.php";
                            }
                        ?>
                        &nbsp;
                        <?php 
                            include "conn.php";
                            $email = $_SESSION['email'];
                            $sql = "SELECT path FROM photo_profile_path WHERE email='$email'";
                            $res = mysqli_query($cxn,$sql);
                            $fetch = mysqli_fetch_assoc($res);
                            $img = $fetch['path'];

                            $path = "photo-file/".$img;
                        
                            echo '<img src="'.$path.'" class="img-circle" alt="Circular Image" style="width:18px;height:18px;">'; ?></a>
                    <ul class="dropdown-menu" role="menu" >
                        <li><?php echo '<a href="'.$profile_link.'"><i class="fa fa-user fa-fw"></i> User Profile</a>';?></li>
                        <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</nav> 