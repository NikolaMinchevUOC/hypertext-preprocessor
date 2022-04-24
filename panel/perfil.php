<?php
session_start();
if ($_SESSION['isAdmin'] == 1) {
	include('../templates/panel/core/topAdmin.php');
	include('../templates/panel/perfilAdmin.php');
} elseif ($_SESSION['isAdmin'] == 0) {
	include('../templates/panel/core/topStudent.php');
	include('../templates/panel/perfilStudent.php');
}


include('../templates/panel/core/bottom.php');
