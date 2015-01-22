<div class="garistepi paddingContent nopad">
    <form role="form" method="POST" action="submit-instruction.php" enctype="multipart/form-data">
        <div class="form-group form-inline">
            <input type="text" class="form-control asignteac" placeholder="Title" name="title" id="title" style="width:361px;">
            <input type="date" class="form-control dueDat" placeholder="Due Date" name="dueDate" id="dueDate" style="width: 198px;">
        </div>
        <div class="form-group">
            <textarea class="form-control expand" rows="1" cols="10" name="des" id="des" placeholder="Describe"></textarea>
        </div>
        <div class="form-group input-group form-inline" style="width:359px;">
            <label style="width:300px">
                <input type="checkbox" name="lock" id="lock" value="1">Is it main Taks?
            </label>
        </div>
        <div class="input-group form-group" style="margin-left:600px;">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <button class="btn btn-warning btn-circle btn-file" data-toggle="tooltip" data-placement="top" title="Attachment File"><i class="fa fa-list"></i>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input type="file" name="attachment"></button>&nbsp;&nbsp;&nbsp;
            <input type="submit" id="send_instruction" class="btn btn-success" name="send_instruction" value="Send" style="background-color:#18bc9c;color:#fff" />
        </div>
    </form>
</div>
<?php
    include "conn.php";
    $teacher_code_qry = "SELECT * FROM teacher WHERE email='$email'";
    $teacher_code_qry_result = mysqli_query($cxn,$teacher_code_qry);
    $teacher_code_fetch = mysqli_fetch_assoc($teacher_code_qry_result);
    $teacher_code = $teacher_code_fetch['teacher_code'];
    $teacher_name = $teacher_code_fetch['first_name']." ".$teacher_code_fetch['last_name'];

    $photo_teacher_qry = "SELECT path FROM photo_profile_path WHERE email='$email'";
    $photo_teacher_qry_result = mysqli_query($cxn,$photo_teacher_qry);
    $photo_teacher_qry_result_fetch = mysqli_fetch_assoc($photo_teacher_qry_result);
    $photo_teacher = $photo_teacher_qry_result_fetch['path'];

    $sql = "SELECT * FROM assignment WHERE teacher_code='$teacher_code' ORDER BY uploadedDate DESC";
    $res = mysqli_query($cxn,$sql);
    
    while ($res_fetch = mysqli_fetch_assoc($res)) {
        $ass_id = $res_fetch['ass_ID'];
        $ass_uploadedDate = $res_fetch['uploadedDate'];
        $is_validate = $res_fetch['validated'];
        $ass_attachment = $res_fetch['attachment'];
        $ass_comment = $res_fetch['teacher_comment'];
        
        //cari photo profil dari tabel photo_profile_path
        $email_student = $res_fetch['email_student'];
        $student_qry = "SELECT path FROM photo_profile_path WHERE email='$email_student'";
        $student_qry_res = mysqli_query($cxn,$student_qry);
        $student_qry_res_fetch = mysqli_fetch_assoc($student_qry_res);
        $path = $student_qry_res_fetch['path'];

        $student_name_qry = "SELECT first_name, last_name FROM student WHERE email='$email_student'";
        $student_name_qry_res = mysqli_query($cxn,$student_name_qry);
        $student_name_qry_res_fetch = mysqli_fetch_assoc($student_name_qry_res);
        $student_name = $student_name_qry_res_fetch['first_name']." ".$student_name_qry_res_fetch['last_name'];

        //Cari judul tugas dari tabel instruksi
        $inst_id = $res_fetch['inst_ID'];
        $inst_qry = "SELECT * FROM instruction WHERE inst_ID='$inst_id'";
        $inst_qry_res = mysqli_query($cxn,$inst_qry);
        $inst_qry_res_fetch = mysqli_fetch_assoc($inst_qry_res);
        $judul_tugas = $inst_qry_res_fetch['judul'];

        $attachment = $res_fetch['attachment'];
        $uploadedDate = $res_fetch['uploadedDate'];
        $comment = $res_fetch['comment'];
        
        echo '<div class="padtow garistepi nopad">';
            echo
            '<div class="media">
                <a class="martow media-left pull-left" href="#">
                    <img class="imgAvaContainer" src="photo-file/'.$path.'">
                </a>
                <div class="media-body padriw">
                    <h5 class="media-heading text" style="color:#18bc9c;">'.$student_name.'</h5>
                    <p class="text"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <b>'.$judul_tugas.' - Uploaded '.$ass_uploadedDate.'</b></p>
                    <div class="garistepi padriw radbod paddingContent">
                        <p>'.$comment.'</p>
                        <a href="assignment-attachment/'.$ass_attachment.'"><img src="img/docs.png">'.$ass_attachment.'</a>
                    </div>
                </div>
            </div>';
            echo '<div class="message-footer">';
                if($is_validate == 1){
                    echo
                    '<div class="media garistepi paddingContent">
                        <div class="media-left pull-left">
                            <img class="imgAvaContainer" src="photo-file/'.$photo_teacher.'">
                        </div>
                        <div class="media-body">
                            <p class="media-heading">Tesar Wijaya</p>
                            <div class="garistepi radbod paddingContent" style="width:551px;">
                                <p>'.$ass_comment.'</p>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo
                    '<p class="panel-title">
                        <a class="collapsed text" data-toggle="collapse" data-parent="#comment" href="#collapse'.$ass_id.'" aria-expanded="false" aria-controls="collapseThree">
                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-comment"></i></button>&nbsp;Validate this</a>
                    </p>
                    <div id="collapse'.$ass_id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="media">
                                <div class="media-left pull-left"><img class="imgAvaContainer" src="photo-file/'.$photo_teacher.'"></div>
                                    <div class="media-body">
                                        <p class="media-heading">'.$teacher_name.'</p>
                                        <form role="form" action="" method="POST">
                                            <div class="form-group">
                                                <textarea name="comment'.$ass_id.'" class="form-control expand" rows="1" cols="90" placeholder="Give a comment"></textarea>
                                            </div>
                                            <div class="form-group pull-right">
                                                <input type="submit" name="submit-accepted'.$ass_id.'" class="btn btn-success" title="Accept this taks" data-placement="top" data-toggle="tooltip" value="Accept"/>
                                                <input type="submit" name="submit-rejected'.$ass_id.'" class="btn btn-danger" title="Reject this taks" data-placement="top" data-toggle="tooltip" value="Reject"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        if(isset($_POST['submit-accepted'.$ass_id])){
                            $teacher_comment = $_POST['comment'.$ass_id];
                            $sql = "UPDATE assignment SET validated=1, accepted=1, teacher_comment='$teacher_comment' WHERE ass_ID='$ass_id'";
                            $qry = mysqli_query($cxn,$sql);

                        } else if(isset($_POST['submit-rejected'.$ass_id])){
                            $teacher_comment = $_POST['comment'.$ass_id];
                            $sql = "UPDATE assignment SET validated=1, teacher_comment='$teacher_comment' WHERE ass_ID='$ass_id'";
                            $qry = mysqli_query($cxn,$sql);
                        }

                };
            echo '</div>';
        echo '</div>';
    }
?>