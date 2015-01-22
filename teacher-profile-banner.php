<?php
    include "conn.php";
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM teacher WHERE email='$email'";
    $res = mysqli_query($cxn,$sql);
    $res_fetch = mysqli_fetch_assoc($res);

    $first_name = $res_fetch['first_name'];
    $last_name = $res_fetch['last_name'];
    $sex = $res_fetch['sex'];
    $university = $res_fetch['university'];
    $teacher_code = $res_fetch['teacher_code'];

    $qry = "SELECT path FROM photo_profile_path WHERE email='$email'";
    $qry_res = mysqli_query($cxn,$qry);
    $qry_res_fetch = mysqli_fetch_assoc($qry_res);

    $img = $qry_res_fetch['path'];

    $path = "photo-file/".$img;
    
?>
<div class="row">
    <div class="col-md-12 padlost" style="width:1155px;">
        <div class="jumbotron laton marbot ">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo '<img src="'.$path.'" class="img-rounded imgProfileContainer">'; ?>
                    </div>
                    <div class="col-md-2">
                        <p style="width:350px;color:#fff"><button type="text" class="btn btn-info"><i class="fa fa-flag"></i></button>&nbsp;<?php echo $university; ?><br></p>
                        <p style="width:150px;color:black;margin-top:30px;"><?php echo $sex.'</br>'.$first_name." "." ".$last_name; ?></p>
                    </div>
                </div> 
            </div>
            <div class="col-md3">
                <p style="color:#FFF;float:right;"><?php echo $teacher_code; ?></p>
            </div>
        </div>
        <div class="jumbotron"></div>
    </div>
</div>