<?php 

require "libs/rb-mysql.php";

R::setup( 'mysql:host=localhost;dbname=miet',
'root', '' );

session_start();
