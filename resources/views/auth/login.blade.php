<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bugtrack</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ url('/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('/theme/admin-lte/2.3.0/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ url('/theme/admin-lte/2.3.0/css/skins/skin-blue.min.css') }}"   >
</head>
<body class="hold-transition skin-blue">
<div class="login-box">
  <div class="login-logo">
    <i class="fa fa-bug"></i> <b>Bugtrack</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

    <form action="{{ url('/auth/login') }}" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" placeholder="Usuário">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary btn-block btn-flat" class="btn" name="btn-login">Acessar!</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
