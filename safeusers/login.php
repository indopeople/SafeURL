<?php
session_start();
//error_reporting(0); 
if(@$_SESSION['rzlabs_uname'])
{
echo "<script>window.location='./dashboard.php'</script>";
}
include "../app.con.php";  

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Login Panel SafeURL</title>
<meta name="description" content="Simpe SafeURL by www.rezerolabs.xyz" />
<meta name="author" content="Re Zero Labs" />
<meta name="robots" content="noindex, nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<link rel="shortcut icon" href="../assets/img/favicon.ico" />
<link rel="apple-touch-icon" href="../assets/img/icon57.png" sizes="57x57" />
<link rel="apple-touch-icon" href="../assets/img/icon72.png" sizes="72x72" />
<link rel="apple-touch-icon" href="../assets/img/icon76.png" sizes="76x76" />
<link rel="apple-touch-icon" href="../assets/img/icon114.png" sizes="114x114" />
<link rel="apple-touch-icon" href="../assets/img/icon120.png" sizes="120x120" />
<link rel="apple-touch-icon" href="../assets/img/icon144.png" sizes="144x144" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>Safe</b>URL<b>Panel</b></a> 
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
<?php
if(@$_REQUEST['act'] == "warning"){
?>
<p class="login-box-msg">Username/Password tidak boleh kosong!</p>
<?php
}elseif(@$_REQUEST['act'] == "bypass1"){
echo '<p class="login-box-msg">Stop! No bypass allowed!</p>';
}elseif(@$_REQUEST['act'] == "bypass2"){
echo '<p class="login-box-msg">Portected by RZLabs System!</p>';
}elseif(@$_REQUEST['act'] == "ok" || @$_REQUEST['direct'] == "true"){
$pg = @$_REQUEST['direct'] == "true";
if($pg){
?>
<p class="login-box-msg">Login berhasil!</p>
<?php
echo "<script>window.location='./dashboard.php'</script>";
}
}elseif(@$_REQUEST['act'] == "info"){
?>
<p class="login-box-msg">Username/Password salah atau belum terdaftar!</p>
<?php
}elseif(@$_REQUEST['act'] == "reg"){
?>
<p class="login-box-msg">Akun tidak aktif/blacklist!</p>
<?php
}else{
?>
<p class="login-box-msg">Sign in to start your session</p>
<?php
}
?>
        <center><img src="../assets/img/sagiri.png"  width="275" alt="Sistem Informasi Pengadaan RSJ Mutiara Sukma"/></center><p></p>

    <form action="?do=login&act=login" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->
    
    <p>Copyright &copy; <?php echo date('Y'); ?> <a href="//www.rezerolabs.xyz" target="_blank">Re Zero Labs</a><strong> All Right Reseverd.</strong>
<?php
$xuser = @$_POST['username'];
$xpass = @$_POST['password'];
$md5pass = md5($xpass);
$xlogin = @$_REQUEST['do'] == "login";
if($xlogin){
  if($xuser == "'or''='" || $xpass == "'or''='"){
    echo "<script>window.location='?act=bypass1'</script>";
  }elseif($xuser == "' or '1'='1'#" || $xpass == "' or '1'='1'#"){
    echo "<script>window.location='?act=bypass2'</script>";
  }elseif($xuser == '' || $xpass == ''){
    echo "<script>window.location='?act=warning'</script>";
  }else{
  $sqli_query = $rzcon->query("SELECT * FROM tbl_users WHERE uname='$xuser' and upass=md5('$xpass')");
  $sqli_row=$sqli_query->fetch_array();
  $sqli_count = $sqli_query->num_rows;
  if($sqli_count == "0"){
    echo "<script>window.location='?act=info'</script>";
  }elseif($sqli_count == "1"){
      if ($sqli_row['register'] == "no") {
         echo "<script>window.location='?act=reg'</script>";
      }elseif ($sqli_row['register'] == "yes") {
      @$_SESSION['rzlabs_session'] = sha1(sha1(md5(time())));
      @$_SESSION['rzlabs_uname'] = $sqli_row['uname'];
      @$_SESSION['rzlabs_uid'] = $sqli_row['uid'];
      @$_SESSION['rzlabs_sagiri'] = $sqli_row['status'];
      @$_SESSION['rzlabs_magic'] = "sagirimember";
      echo "<script>window.location='?act=ok&direct=true'</script>"; 
      }
    }
  }
  }
/*if($xlogin){
  if($xuser == '' || $xpass == ''){
  echo "<script>window.location='?act=warning'</script>";
  }else{
  $sqli = mysql_query("select * from tbl_users where username = '$xuser' and password = md5('$xpass')") or die(mysql_error());
  $sqli_level = mysql_fetch_array($sqli);
  $sqli_check = mysql_num_rows($sqli);
  if($sqli_check == "0"){
    echo "<script>window.location='?act=info'</script>";
  }elseif($sqli_check == "1"){ 
   if($sqli_level['level'] == "admin"){
    @$_SESSION['rzlab_uauth'] = $sqli_level['level'];
    @$_SESSION['rzlab_uid'] = $sqli_level['uid'];
    echo "<script>window.location='?act=1&direct=true'</script>";
  }elseif($sqli_level['level'] == "direktur"){
    @$_SESSION['rzlab_uauth'] = $sqli_level['level'];
    @$_SESSION['rzlab_uid'] = $sqli_level['uid'];
    echo "<script>window.location='?act=2&direct=true'</script>";
  }elseif($sqli_level['level'] == "karyawan"){
    @$_SESSION['rzlab_uauth'] = $sqli_level['level'];
    @$_SESSION['rzlab_uid'] = $sqli_level['uid'];
    echo "<script>window.location='?act=3&direct=true'</script>";
  } 
  }
  }
}*/
?> 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
