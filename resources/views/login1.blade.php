<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
</head>

<body>
<div class="login-box">
    <div class="login-logo">
        <a href="admin/login"><b>tintuc</b>.com</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>
 
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('txtUsername') ? ' has-error' : '' }}">
                <input type="text" id="txtUsername" name="txtUsername" class="form-control" placeholder="Nhập vào username" value="{{ old('txtUsername') }}" required="" autofocus="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('txtUsername'))
                    <span class="help-block">
              <strong>{{ $errors->first('txtUsername') }}</strong>
          </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('txtPassword') ? ' has-error' : '' }}">
                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Nhập vào password" required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('txtPassword'))
                    <span class="help-block">
              <strong>{{ $errors->first('txtPassword') }}</strong>
          </span>
                @endif
            </div>
            <div class="form-control">
                <div class="row">
                <select id="option" name="option">
                    <option value="sinhvien"> Sinh viên</option>
                    <option value="pdt"> Phòng Đào tạo </option>
                </select>
                </div>
            </div>
            <div class="row">
 
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
       <h3><?php if($code == 1);
			else if ($code == 200)
         		echo('Tài khoản hoặc mật khẩu không đúng.');
			else if($code == 0) 
        		echo('Máy chủ đang bảo trì. Mời bạn quay lại sau.')?>
       </h3>
    </div>
    <!-- /.login-box-body -->
</div>

</body>
</html>