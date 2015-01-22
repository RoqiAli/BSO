<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading panelhead">
            <div class="panel-title">University</div>
        </div>
        <div class="panel-body">
            <span class="glyphicon glyphicon-flag">&nbsp;</span><?php echo $university; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="panel panel-success">
        <div class="panel-heading panelhead">
            <div class="panel-title">Classmates</div>
        </div>
        <div class="panel-body panbod">
            <?php 
                include "conn.php";
                $sql = "SELECT * FROM student WHERE teacher_code='$teacher_code'";
                $res = mysqli_query($cxn,$sql);
                while($student = mysqli_fetch_assoc($res)){
                    $student_email = $student['email'];
                    $student_name = $student['first_name']." ".$student['last_name'];
                    $photo = "SELECT path from photo_profile_path WHERE email='$student_email'";
                    $photo_res = mysqli_query($cxn,$photo);
                    $photo_fecth = mysqli_fetch_assoc($photo_res);
                    $photo = $photo_fecth['path'];

                    echo '<a href="#"><img src="photo-file/'.$photo.'" class="imgsize" alt="'.$student_name.'"></a>';
                }
            ?>
        </div>
    </div>
</div>
<div class="row">
    <address>
        <strong>BIMBO &copy;</strong>
        <br>Bimbingan Skripsi Online<br>2014.
    </address>
</div>