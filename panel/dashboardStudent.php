<?php
session_start();
if ($_SESSION['isAdmin'] == 1) {
    include('../templates/panel/core/topAdmin.php');
} elseif ($_SESSION['isAdmin'] == 0) {
    include('../templates/panel/core/topStudent.php');
}
include('../templates/panel/studentPanel.php');
include('../templates/panel/core/bottom.php');

echo "<p>USER PANEL</p>";
