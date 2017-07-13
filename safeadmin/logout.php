<?php
session_start();
session_destroy();
unset($_SESSION['rzlabs_session']);
unset($_SESSION['rzlabs_uname']);
unset($_SESSION['rzlabs_uid']);
echo "<script>window.location='./login.php'</script>";
