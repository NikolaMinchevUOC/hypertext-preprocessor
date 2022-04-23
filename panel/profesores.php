<?php
session_start();
if ($_SESSION['isAdmin'] == 1) {
	include('../templates/panel/core/topAdmin.php');
	include('../templates/panel/profesores.php');
} elseif ($_SESSION['isAdmin'] == 0) {
	include('../templates/panel/core/topStudent.php');
}

include('../templates/panel/core/bottom.php');
