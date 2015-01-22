<?php
    include "conn.php";
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM student WHERE email='$email'";
    $res = mysqli_query($cxn,$sql);
    $res_fetch = mysqli_fetch_assoc($res);

    $university = $res_fetch['university'];
    $judul = $res_fetch['judul']
?>
<div class="row">
    <div class="col-md-12 padlost">
        <div class="jumbotron laton">
            <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-2">
                        <?php echo '<a href="#" class="profil thumbnail"><img src="'.$path.'" class="img-responsive img-responsive"></a>' ?>
                    </div>
                    <div class="col-md-2">
                        <p style="width:350px;color:#fff"><button type="text" class="btn btn-success"><i class="fa fa-flag"></i></button>&nbsp;<?php echo $university; ?><br></p>
                        <p style="width:150px;color:black;margin-top:30px;"><?php echo $first_name." ".$last_name; ?></p>
                    </div>
                </div> 
            </div>
            <div class="col-md3">
                <div style="color:#FFF;float:right;"><?php echo '<p>'.$judul.'</p>'; ?></div>
            </div>
        </div>
        </div>
        
    </div>
</div>