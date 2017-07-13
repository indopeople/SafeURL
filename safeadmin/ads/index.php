<?php
/**
* @script : Index.php
* @author : Re Zero Labs / Aihara Anwaru
* @Mail : anwaru@indoxploit.or.id
* @Web : www.rezerolabs.xyz
*/
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
				header("Location: ./login.php");
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
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
        <li>Ads</li>
        <li class="active">Comming Soon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
       <?php include_once "../navi/info_boxes1.php";?>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- Comming Soon -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">Comming Soon</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <p>Fitur Akan Tersedia Nanti</p>
                </li>
              </ul>
              <a href="<?php echo $urlpanel; ?>/dashboard.php"><button class="btn btn-primary btn-block"><i class="fa fa-arrow-left"></i>  Kembali</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              <?php #include_once "./navi/direct_chat.php";
              ?>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- USERS LIST -->
              <?php #include_once "./navi/latest_users.php";
              ?>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <?php include_once "../navi/latest_generate.php";?>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
         <?php include_once "../navi/info_boxes2.php";?>
      
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include_once "../footer.php";?>
