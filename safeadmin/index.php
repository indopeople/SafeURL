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
?>
</body>
</html>