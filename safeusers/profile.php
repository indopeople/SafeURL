<?php
session_start(); 
if(@empty($_SESSION['rzlabs_uname']))
{
echo "<script>window.location='./login.php'</script>";
}
include "../app.con.php";
$uname = @$_SESSION['rzlabs_uname'];
$uid = @$_SESSION['rzlabs_uid'];
$rzlab_sql = mysqli_query($rzcon, "SELECT * FROM tbl_users WHERE uid='$uid'");
			if(mysqli_num_rows($rzlab_sql) == 0){
				header("Location: ./login.php");
			}else{
				$rzlab_row = mysqli_fetch_assoc($rzlab_sql);
			}           
include_once "./header.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include_once "./navi/nav_bar_right.php";?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $rzlab_row['avatar'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $rzlab_row['name'];?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include_once "./menu_navi.php";?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-lg-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $urlavatar.$rzlab_row['avatar'];?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $rzlab_row['name'];?></h3>

              <p class="text-muted text-center"><?php echo $rzlab_row['email'];?></p>
              <form class="form-horizontal" method="Post" action="?do=update&act=profile">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <input type="text"  value="<?php echo $rzlab_row['uname'];?>" disabled="" class="form-control" id="inputEmail3" placeholder="Username">
                </li>
                <li class="list-group-item">
                 <input type="text"  value="<?php echo $rzlab_row['name'];?>" name="sagiriname"class="form-control" id="inputEmail3" placeholder="Name">
                </li>
                <li class="list-group-item">
                  <input type="text"  value="<?php echo $rzlab_row['email'];?>" name="sagirimail" class="form-control" id="inputEmail3" placeholder="E-mail">
                </li>
              </ul>
              <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
            </form>
            <?php
            $sagiri1 =@$_POST['sagiriname'];
            $sagiri2 =@$_POST['sagirimail'];
            $sagiriid = @$_SESSION['rzlabs_uid'];
            $xprofile = @$_REQUEST['act'] == "profile";
           if($xprofile){
            $sagiri_query = mysqli_query($rzcon,"UPDATE tbl_users SET name='$sagiri1', email='$sagiri2' WHERE uid='$sagiriid'");
            if($sagiri_query){
              echo '<div class="callout callout-success">
                <p>Profile sudah di update.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./dashboard.php" class="btn btn-info btn-block" type="button">Ke Dashboard</a>';
            }else{
              echo '<div class="callout callout-danger">
                <p>Profile gagal di update.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./profile.php" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
            }
            }

            ?>
             <form class="form-horizontal" method="Post" action="?do=update&act=password">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <input type="password"  name="sagirilama" class="form-control" id="inputEmail3" placeholder="Password Lama">
                </li>
                <li class="list-group-item">
                 <input type="password"  name="sagiribaru1" class="form-control" id="inputEmail3" placeholder="Password Baru">
                </li>
                <li class="list-group-item">
                  <input type="password"  name="sagiribaru2" class="form-control" id="inputEmail3" placeholder="Password Baru">
                </li>
              </ul>
              <button type="submit" class="btn btn-primary btn-block">Update Password</button>
            </form>
             <?php
            $sagiri1 =@$_POST['sagirilama'];
            $sagiri2 =@$_POST['sagiribaru1'];
            $sagiri3 =@$_POST['sagiribaru2'];
            $sagiriid = @$_SESSION['rzlabs_uid'];
            $sagiriuname = @$_SESSION['rzlabs_uname'];
            $sagiribarumd5 = md5($sagiri2);
            $xpass = @$_REQUEST['act'] == "password";
           if($xpass){
             if($sagiri1 == "" || $sagiri2 == "" || $sagiri3 == ""){
              echo '<div class="callout callout-danger">
                <p>Password lama/baru tidak boleh kosong.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./profile.php" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
             }else{
              $sagiri_query = mysqli_query($rzcon,"SELECT * FROM tbl_users WHERE upass=md5('$sagiri1')");
              if (mysqli_num_rows($sagiri_query) == 1) {
              if($sagiri2 == $sagiri3){
                $sagiri_kawai = mysqli_query($rzcon, "UPDATE tbl_users SET upass='$sagiribarumd5'");
                if ($sagiri_kawai) {
                  echo '<div class="callout callout-success">
                <p>Berhasil mengganti password.</p>
              </div>';
               echo '<a href="./dashboard.php" class="btn btn-info btn-block" type="button">Ke Dashboard</a>';
                }else{
                  echo '<div class="callout callout-danger">
                <p>Gagal mengganti password.</p>
              </div>';
              echo '<a href="./profile.php" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
                }
             }else{
              echo '<div class="callout callout-danger">
                <p>Password baru tidak cocok.</p>
              </div>';
               echo '<a href="./profile.php" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
             }
                
              }else{
                echo '<div class="callout callout-danger">
                <p>Bukan password lama.</p>
              </div>';
               echo '<a href="./profile.php" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
              }
           }
         }
          ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                Private Info
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Mataram, Nusa Tenggara Barat, Indonesia</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-success">PHP</span>
                <span class="label label-success">Delphi 7</span>
                <span class="label label-success">VB 6.0</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.col -->
      </div>
  <!-- /.content-wrapper -->
   <?php include_once "./footer.php";
   ?>
