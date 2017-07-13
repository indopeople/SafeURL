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
        List User
      </h1>
      <ol class="breadcrumb">
        <li><a href="../"><i class="fa fa-home"></i> Home</a></li>
        <li>Users</li>
        <li class="active">List Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Name</th>
                  <th>User</th>
                  <th>Mail</th>
                  <th>Register</th>
                  <th>Link Generate</th>
                  <th>Profile Picture</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                  $sql = mysqli_query($rzcon, "SELECT * FROM tbl_users ORDER BY uid"); 
                  if(mysqli_num_rows($sql) == 0){
					            echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				        }else{
					        $no = 1;
					         while($row = mysqli_fetch_assoc($sql)){
                  ?>
                <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['uname'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php
                  if($row['register'] == "yes"){
                    echo "<span class='label label-success'>Approved</span>";
                  }elseif($row['register'] == "no"){
                    echo "<span class='label label-danger'>Not approved</span>";
                    }                  
                  ?>                 
                  </td>
                  <td><?php echo $row['linkgen'];?></td>
                  <td><img src="<?php echo $urlavatar.$row['avatar'];?>" alt="avatar" class="img-square" width="42"/> </td>
                  <td><?php
                  if($row['status'] == "login"){
                    echo "<span class='label label-success'>Online</span>";
                  }elseif($row['status'] == "logout"){
                    echo "<span class='label label-danger'>Offline</span>";
                    }                  
                  ?>                 
                  </td>
                  <td>Edit/Delete</td>
                </tr>
                <?php
                   }
            
                   }
                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-4">
         <?php #include_once "./navi/info_boxes2.php";
         ?>
      
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
