<?php
/**
* @script : index.php
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
        Create SafeURL
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
        <li>SafeURL</li>
        <li class="active">Create SafeURL</li>
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
              <h3 class="profile-username text-center">Generate URL</h3>

              <p class="text-muted text-center">note: gunakan http:// or https://</p>
              <p class="text-muted text-center">contoh: http://rezerolabs.xyz/ atau http://rezerolabs.xyz</p>
              <form class="form-horizontal" method="Post" action="?do=buat&act=safeurl">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <input type="text"  name="sagirisafe" class="form-control" id="inputEmail3" placeholder="http://rezerolabs.xyz/">
                </li>
                <li class="list-group-item">
                  <select name="sagiriauth" class="form-control">
                    <option>Tambah pengaman pada link</option>
                    <option value="yes">Ya</option>
                    <option value="no">Tidak</option>
                  </select>
                </li>
                <li class="list-group-item">
                  <input type="password"  name="sagiripass" class="form-control" id="inputEmail3" placeholder="Password">
                </li>
                <p>Note: Jika pilih ya, masukan password di textbox jika tidak abaikan!</p>
              </ul>
              <button type="submit" class="btn btn-primary btn-block">Buat</button>
            </form>
            <?php
            $sagiri1 =@$_POST['sagirisafe'];
            $sagiriauth =@$_POST['sagiriauth'];
            $sagiripass = @$_POST['sagiripass'];
            $md5sagiri = md5($sagiripass);
            $sagiriid = @$_SESSION['rzlabs_uid'];
            $sagiriencode = base64_encode($sagiri1);
            $sagirisafe = "http://safeurl.jasa2ndnina.xyz/?checkuri=".$sagiriencode;
            $uname = @$_SESSION['rzlabs_uname'];
            $exp = "30";
            $date = date("Y-m-d");
            $xsafe = @$_REQUEST['act'] == "safeurl";
            if ($xsafe) {
                    #$sagiri_checkurl = mysqli_query($rzcon, "SELECT * FROM tbl_safeurl WHERE rawurl='$sagiri1'");
                    #$sagiri_row = mysqli_fetch_assoc($sagiri_checkurl);
                 if($sagiri1 == "") {
                      echo '<div class="callout callout-danger">
                <p>Mohon masukan URL.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./"" class="btn btn-info btn-block" type="button">Muat Ulang</a>';
                    }else{
                      $sagiri_checkurl = mysqli_query($rzcon, "SELECT * FROM tbl_safeurl WHERE rawurl='$sagiri1'");
                      if(mysqli_num_rows($sagiri_checkurl) == 0){
                        if ($sagiriauth == "yes") {
                          if($sagiripass == ""){
                             echo '<div class="callout callout-danger">
                <p>Password kosong.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
                          }else{
                       $sagiri_insert = mysqli_query($rzcon, "INSERT INTO tbl_safeurl(author, rawurl, encodeurl, safeurl, datecreate, expired, auth, authpass)VALUES('$uname', '$sagiri1', '$sagiriencode', '$sagirisafe', '$date', '$exp', 'yes', '$md5sagiri')");
                       if ($sagiri_insert) {
                          echo '<div class="callout callout-success"><p>http://safeurl.jasa2ndnina.xyz/?checkuri='.base64_encode($sagiri1).' <== Copy Link Ini</p>
                           </div>';
                             echo '<p>'.$sagiriencode.'</p>'; 
                             echo '<p>Copy Link diatas dan tempelkan di blog/facebook/twitter atau media sosial lainnya</p>'; 
                             echo '<a href="./" class="btn btn-info btn-block" type="button">Tambah URL lain!</a>';
                        }else{
                            echo '<div class="callout callout-danger">
                <p>Gagal Membuat SafeURL.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
             }
           }
                        }elseif ($sagiriauth == "no") {
                          $sagiri_insert = mysqli_query($rzcon, "INSERT INTO tbl_safeurl(author, rawurl, encodeurl, safeurl, datecreate, expired, auth)VALUES('$uname', '$sagiri1', '$sagiriencode', '$sagirisafe', '$date', '$exp', 'no')");
                       if ($sagiri_insert) {
                          echo '<div class="callout callout-success"><p>http://safeurl.jasa2ndnina.xyz/?checkuri='.base64_encode($sagiri1).' <== Copy Link Ini</p>
                           </div>';
                             echo '<p>'.$sagiriencode.'</p>'; 
                             echo '<p>Copy Link diatas dan tempelkan di blog/facebook/twitter atau media sosial lainnya</p>'; 
                             echo '<a href="./" class="btn btn-info btn-block" type="button">Tambah URL lain!</a>';
                        }else{
                            echo '<div class="callout callout-danger">
                <p>Gagal Membuat SafeURL.</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
                        }
                      }
                      }elseif (mysqli_num_rows($sagiri_checkurl) == 1) {
                         echo '<div class="callout callout-danger">
                <p>SafeURL sudah dibuat/sudah ada.</p>
                <p>http://safeurl.jasa2ndnina.xyz/?checkuri='.base64_encode($sagiri1).' <== Gunakan link ini</p>
              </div>';
              #echo "<script>window.location='./profile.php'</script>";
               echo '<a href="./" class="btn btn-info btn-block" type="button">Coba Lagi</a>';
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
