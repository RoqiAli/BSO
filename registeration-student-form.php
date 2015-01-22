<form role="form" action="registeration-student-confirmation.php" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="teacher_code" style="height:39px" placeholder="Kode Bimbingan" required/>
    </div>
    <div class="form-group form-inline">
        <input type="text" class="form-control" name="first_name" style="width:226px;height:39px" placeholder="Firstname" data-toggle="tooltip" required/>
        <input type="text" class="form-control" name="last_name" style="width:226px;height:39px" placeholder="Lastname" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="email" style="height:39px" placeholder="Email" required/>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" style="height:39px" placeholder="Password" required/>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" style="height:39px" placeholder="Retype Password" required/>
    </div>
    <div class="form-group form-inline">
        <div class="checkbox" style="float:left">
            <label style="color:#555; text-decoration:underline;">
                <input type="checkbox" > Remember Me ?
            </label>
        </div>
        <input type="submit" class="btn btn-primary btn-lg" style="float:right;background-color:#18bc9c" value="Sign UP!">
    </div>
</form>