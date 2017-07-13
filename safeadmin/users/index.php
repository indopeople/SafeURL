<?php
session_start(); 
if(@empty($_SESSION['rzlabs_uname']))
{
echo "<script>window.location='./login.php'</script>";
}elseif(@$_SESSION['rzlabs_magic'] == "sagirimember"){
echo "<script>window.location='../safeusers/login.php'</script>";
}
include "../../app.con.php";
$uname = @$_SESSION['rzlabs_uname'];
$uid = @$_SESSION['rzlabs_uid'];
$rzlab_sql = mysqli_query($rzcon, "SELECT * FROM tbl_admin WHERE userid='$uid'");
			if(mysqli_num_rows($rzlab_sql) == 0){
				header("Location: ../login.php");
			}else{
				$rzlab_row = mysqli_fetch_assoc($rzlab_sql);
			}           
include_once "../header.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include_once "../navi/nav_bar_right.php";?>
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
      <?php include_once "../menu_navi.php";?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
        <li>User</li>
        <li class="active">Add User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Add User</h3>
              <form class="form-horizontal" method="Post" action="?do=tambah&act=pengguna">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <label>Name</label>
                  <input type="text"  name="sagiriname" class="form-control" id="inputEmail3" placeholder="Name">
                </li>
                <li class="list-group-item">
                  <label>Username</label>
                  <input type="text"  name="sagiriuser" class="form-control" id="inputEmail3" placeholder="Username">
                </li>
                <li class="list-group-item">
                  <label>Password</label>
                  <input type="password"  name="sagiripass" class="form-control" id="inputEmail3" placeholder="Password">
                </li>
                <li class="list-group-item">
                  <label>E-mail</label>
                  <input type="email"  name="sagirimail" class="form-control" id="inputEmail3" placeholder="E-mail">
                </li>
                <li class="list-group-item">
                  <label>Register</label>
                  <select name="sagirireg" class="form-control">
                    <option value="yes">Ya</option>
                    <option value="no">Tidak</option>
                  </select>
                </li>
              </ul>
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>  Tambah</button><br />
              <a href="../dashboard.php"><button class="btn btn-primary btn-block"><i class="fa fa-arrow-left"></i>  Batal</button></a>
            </form>
            <?php
            $sagiri1 =@$_POST['sagiriname'];
            $sagiri2 =@$_POST['sagiriuser'];
            $sagiri3 =@$_POST['sagiripass'];
            $sagiri4 =@$_POST['sagirimail'];
            $sagiri5 =@$_POST['sagirireg'];
            $sagiri6 = "default.png";
            $md5sagiri = md5($sagiri3);
            $sagiri7 = date("Y-m-d");
            $xsafe = @$_REQUEST['act'] == "pengguna";
            if ($xsafe) {
                    #$sagiri_checkurl = mysqli_query($rzcon, "SELECT * FROM tbl_safeurl WHERE rawurl='$sagiri1'");
                    #$sagiri_row = mysqli_fetch_assoc($sagiri_checkurl);
                 if($sagiri1 == "" || $sagiri2 == "" || $sagiri3 == "" || $sagiri4 == "" || $sagiri5 == "") {
                      echo '<div class="callout callout-danger">
                <p>Mohon masukan data pada kolom yang sudah disediakan</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button"><i class="fa fa-refresh"></i> Muat Ulang</a>';
                    }else{
                      $sagiri_checkurl = mysqli_query($rzcon, "SELECT * FROM tbl_users WHERE uname='$sagiri2' and email='$sagiri4'");
                      if(mysqli_num_rows($sagiri_checkurl) == 0){
                        $sagiri_add = mysqli_query($rzcon, "INSERT INTO tbl_users(uname, upass, name, avatar, email, register, joindate, iplog, status)VALUES('$sagiri2', '$md5sagiri', '$sagiri1', '$sagiri6', '$sagiri4', '$sagiri5', '$sagiri7', '0', 'logout')");
                        if ($sagiri_add) {
                          echo '<div class="callout callout-success">
                <p>Berhasil menambah user.</p>
              </div>';
               echo '<a href="./" class="btn btn-info btn-block" type="button"><i class="fa fa-plus"></i> Tambah Lagi</a>';
               echo '<a href="./list_users.php" class="btn btn-info btn-block" type="button"><i class="fa fa-users"></i> Lihat List User</a>';
                        }
                        }elseif (mysqli_num_rows($sagiri_checkurl) == 1) {
                         echo '<div class="callout callout-danger">
                <p>User Sudah ada.</p>
                <p><a href="./list_users.php" class="btn btn-info btn-block" type="button">Lihat List User</a></p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button"><i class="fa fa-refresh"></i> Coba Lagi</a>';
                      }

                        
                      
                    }
              }           
            ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include_once "../footer.php";?>
