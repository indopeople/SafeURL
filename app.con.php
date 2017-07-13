<?php
/**
* @script : app.con.php
* @author : Re Zero Labs / Aihara Anwaru
* @Mail : anwaru@indoxploit.or.id
* @Web : www.rezerolabs.xyz
*/
$urlpanel = "http://" . $_SERVER['SERVER_NAME']."/safeadmin";
$urlusers = "http://" . $_SERVER['SERVER_NAME']."/safeusers";
$urlassets = "http://" . $_SERVER['SERVER_NAME']."/";
$urlavatar = "http://" . $_SERVER['SERVER_NAME']."/assets/avatar/";
define('DB_NAME', 'db_safeurl');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$rzcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($rzcon->connect_errno > 0){
    die('Could not connect: ' .connect_error());
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
/*class rzdatabase {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "rezerolab_pt";

    // method koneksi MySQL
    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database tidak ada!");
    }

    // method tambah data (insert)	
    function rzadd($xuser,$xpass,$name,$level) {
	
        $query = "INSERT INTO tbl_login(username,password,name,level) VALUES ('$xuser','$xpass','$name','$level')";
        $hasil = mysql_query($query);

        if ($hasil)
		  echo "<div class='alert alert-block alert-success'><strong><i></i> DATA BERHASIL DI SIMPAN</strong></div>";

        else
         echo "<div class='alert alert-block alert-danger'><strong><i></i> DATA GAGAL DI UPDATE</strong></div>";
		}
	

    // method tampil data 	
    function rzview() {
        $query = mysql_query("SELECT * FROM tbl_login ORDER BY uid");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    // method hapus data
    function rzdel($id_b) {
        $query = mysql_query("DELETE FROM tbl_login WHERE uid='$id_b'");
		if ($query)
		    echo "<div class='alert alert-block alert-success'><strong><i></i> Data Biodata dengan ID " . $id_b . " sudah dihapus</strong></div>";
		else
			 echo "<div class='alert alert-block alert-danger'><strong><i></i>GAGAL DI HAPUS</strong></div>";
    }

    // method membaca data biodata
    function rzread($field, $uid) {
        $query = "SELECT * FROM tbl_login WHERE uid = '$uid'";
        $hasil = mysql_query($query);
        $data = mysql_fetch_array($hasil);
        if ($field == 'username')
            return $data['username'];
		else if ($field == 'password')
            return $data['password'];
		else if ($field == 'name')
            return $data['name'];
        else if ($field == 'level')
            return $data['level'];
    }

    // method untuk proses update data biodata
    function rzupdate($uid, $username,$password,$name,$level) {
        $query = "UPDATE biodata SET username='$username',password='$password',name='$name', level ='$level' WHERE uid='$uid'";
        $hasilupdate=mysql_query($query);
		
        if ($hasilupdate)
		    echo "<div class='alert alert-block alert-success'><strong><i></i> DATA BERHASIL DI UPDATE</strong></div>";
        else
            echo "<div class='alert alert-block alert-danger'><strong><i></i> DATA GAGAL DI UPDATE</strong></div>e";
    }

}
*/