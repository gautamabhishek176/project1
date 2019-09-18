<?php 
require 'login_pageserver.php';
 session_destroy();
 header('location: /project1/login/loginpage.php');
 ?>