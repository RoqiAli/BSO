<form role="form" action="registeration-teacher-confirmation.php" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="university" style="height:39px" placeholder="University" required/>
    </div>
    <div class="form-group form-inline">
        <select class="form-control" name="sex" style="padding-left:5px;height:39px;width:68px">
            <option>Mr.</option>
            <option>Mrs.</option>
        </select>
        <input type="text" class="form-control" name="first_name" style="width:190px;height:39px" placeholder="Firstname" data-toggle="tooltip" required/>
        <input type="text" class="form-control" name="last_name" style="width:190px;height:39px" placeholder="Lastname" required/>
    </div>
    <div class="form-group" action="/cgi-bin/html5.cgi">
        <input type="email" class="form-control" name="email" style="height:39px" placeholder="Email" required/>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" style="height:39px" placeholder="Password" required/>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="rpassword" style="height:39px" placeholder="Retype Password" required/>
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