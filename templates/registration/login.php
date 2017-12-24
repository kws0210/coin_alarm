<div class="row justify-content-center py-3 navbar-light">
    <a href="#" class="navbar-brand active">GAZUALARM</a>
</div>
<div class="container col-md-4 py-3">
    <form method="POST" action="/PHP/login.php">
        <div class="form-group">
            <input placeholder="ID" class="form-control" id="{{ form.username.id_for_label }}" maxlength="15" name="username" type="text" />
        </div>
        <div class="form-group">
            <input placeholder="Password" class="form-control" id="{{ form.password.id_for_label }}" maxlength="15" name="password" type="password" />
        </div>
        <div class="form-group">
            <center><input type="submit" class="save btn btn-block btn-success" value="로그인" /></center>
        </div>
    </form>
</div>
<div class="row justify-content-center py-3">
    <a href="register.php">회원가입</a>
</div>
