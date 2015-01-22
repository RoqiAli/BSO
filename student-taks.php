<?php
    include "conn.php";

    $active_student = $_SESSION['email'];
    
    $teacher_code_sql = "SELECT teacher_code FROM student WHERE email='$active_student'";
    $teacher_code_result = mysqli_query($cxn,$teacher_code_sql);
    $teacher_code_fetch = mysqli_fetch_assoc($teacher_code_result);
    
    $teacher_code = $teacher_code_fetch['teacher_code'];
    
    $instruction_teacher_sql = "SELECT * FROM instruction WHERE teacher_code='$teacher_code' ORDER BY uploadedDate DESC";
    $instruction_teacher_result = mysqli_query($cxn,$instruction_teacher_sql);

    $sql = "SELECT * FROM teacher WHERE teacher_code='$teacher_code'";
    $result = mysqli_query($cxn,$sql);
    $name = mysqli_fetch_assoc($result);
    $teacher_name = $first_name = $name['first_name']." ".$last_name = $name['last_name'];
    $email_teacher = $name['email'];

    $teacher_photo = "SELECT * FROM photo_profile_path WHERE email='$email_teacher'";
    $result_photo = mysqli_query($cxn,$teacher_photo);
    $photo_fetch = mysqli_fetch_assoc($result_photo);
    $photo = $photo_fetch['path'];

while($instruction_teacher_fetch = mysqli_fetch_assoc($instruction_teacher_result)){
    $inst_id = $instruction_teacher_fetch['inst_ID'];

    echo '<div class="padtow garistepi nopad">';
        echo '<div class="media martop">
            <a class="martow media-left pull-left" href="#">
                <img class="imgAvaContainer" src="photo-file/'.$photo.'">
            </a>
            <div class="media-body padriw">
                <div class="row">
                    <div class="col-md-6">      
                        <h5 class="media-heading text" style="color:#18bc9c;">'. "MR." .$teacher_name.'</h5>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-right">'.$instruction_teacher_fetch['uploadedDate'].'</h6>
                    </div>
                </div>
                <p class="text" style="width:50%;"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <b>'.$instruction_teacher_fetch['judul'].' - Due '.$instruction_teacher_fetch['dueDate'].'</b>
                </p>
                <div class="garistepi padriw radbod paddingContent">
                    <p>'.$instruction_teacher_fetch['description'].'</p>
                </div>
            </div>
        </div>';
        echo '<div class="message-footer">';

        $assignment_qry = "SELECT * FROM assignment WHERE inst_ID='$inst_id' ORDER BY uploadedDate DESC";
        $qry_res = mysqli_query($cxn,$assignment_qry);
        
        while($qry_res_fetch = mysqli_fetch_assoc($qry_res)){
            $ass_id = $qry_res_fetch['ass_ID'];
            $email_student = $qry_res_fetch['email_student'];
            $ass_comment = $qry_res_fetch['comment'];
            $ass_attachment = $qry_res_fetch['attachment'];
            $ass_uploadedDate = $qry_res_fetch['uploadedDate'];
            $ass_teacher_comment = $qry_res_fetch['teacher_comment'];
            $is_validated = $qry_res_fetch['validated'];
            
            $is_accepted = $qry_res_fetch['accepted'];
            if($is_accepted == 1){
                $stat = "Your taks has been validated and accepted";
            } else {
                $stat = "Your taks has been validated but not accepted";
            }

            $qry_photo = "SELECT path FROM photo_profile_path WHERE email='$email_student'";
            $res= mysqli_query($cxn,$qry_photo);
            $photo_fetch = mysqli_fetch_assoc($res);
            $photo_path = $photo_fetch['path'];

            $qry_uploader_name = "SELECT first_name,last_name FROM student WHERE email='$email_student'";
            $qry_uploader_res = mysqli_query($cxn,$qry_uploader_name);
            $fetch_name = mysqli_fetch_assoc($qry_uploader_res);
            $name = $fetch_name['first_name']." ".$fetch_name['last_name'];

            echo '<div class="panel-body padtow garistepi" style="padding-left:0px; padding-right:0px;">';
                echo '<div class="media">';
                    echo
                    '<div class="media pull-left martow">
                        <img class="imgAvaContainer" src="photo-file/'.$photo_path.'">
                    </div>
                    <div class="media-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="media-heading">'.$name.'</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-right">'.$ass_uploadedDate.'</h6>
                            </div>
                        </div>
                        <a href="assignment-attachment/'.$ass_attachment.'"><img src="img/docs.png">'.$ass_attachment.'</a>
                        <div class="garistepi radbod paddingContent" style="width:529px;">
                            <p>'.$ass_comment.'</p>
                        </div>';
                        if($is_validated == 1){
                        echo
                        '<div class="pull-right">
                                <h5><small>'.$stat.'</small></h5>
                            </div>';
                        }
                    echo '</div>';
                    if($is_validated == 1){
                    echo
                    '<div class="message-footer">
                        <div class="media garistepi paddingContent">
                            <div class="media-left pull-left">
                                <img class="imgAvaContainer" src="photo-file/'.$photo.'">
                            </div>
                            <div class="media-body">
                                <p class="media-heading">'.$teacher_name.'</p>
                                <div class="garistepi radbod paddingContent" style="width:407px;">
                                    <p>'.$ass_teacher_comment.'</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>';
                    }
                echo '</div><br>';
            echo '</div>';
        }
            echo '<p class="panel-title">
                <a class="collapsed text" data-toggle="collapse" data-parent="#comment" href="#collapse'.$inst_id.'" aria-expanded="false" aria-controls="collapseone">
                    <button type="button" class="btn btn-info btn-link"><i class="fa fa-comment"></i>Turn in</button>
                </a>
            </p>
            <div id="collapse'.$inst_id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                <div class="panel-body">
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea name="comment'.$inst_id.'" class="form-control expand" rows="1" cols="10"></textarea>
                            <div class="control-turn-in">
                                <div id="feedback"></div>
                                <button class="btn btn-warning btn-circle btn-file" data-toggle="tooltip" data-placement="top"title="Attachment File"><i class="fa fa-list"></i>
                                <input type="file" name="attachment'.$inst_id.'"></button>&nbsp;
                                <input type="submit" name="turn-in-'.$inst_id.'" class="btn btn-default wabel" value="Turn In"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>';
        echo '</div>';
    echo '</div>';

    if(isset($_POST['turn-in-'.$inst_id])) {

        $comment = $_POST['comment'.$inst_id];

        $destination ='C:\xampp\htdocs\BBO\assignment-attachment'."\\".$_FILES['attachment'.$inst_id]['name'];
        $temp_file = $_FILES['attachment'.$inst_id]['tmp_name'];
        $path = $_FILES['attachment'.$inst_id]['name'];

        move_uploaded_file($temp_file,$destination);

        $sql = "INSERT INTO assignment (inst_ID, teacher_code, email_student, comment, attachment, uploadedDate) 
                VALUES ('$inst_id', '$teacher_code', '$active_student', '$comment', '$path', NOW())";
        $res = mysqli_query($cxn,$sql);
        header("location:dashboard.php");
    }
}
?>