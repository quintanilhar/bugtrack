@extends('layouts.layout')

@section('title', 'Autenticação')

@section('body')
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Acessar!</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
