<?php
if(isset($_GET['del'])){
    delShift($_GET['del']);
}
if(isset($_GET['display'])){
    displayShift($_GET['display']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-shift-btn'])) {
    $time = $_POST['timeInput'];
    list($hours, $minutes) = explode(':', $time);
    $totalMinutes = ($hours * 60) + $minutes;
    updateShift($_POST['nameShift'],$totalMinutes,$_POST['id_shift']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-shift-btn'])) {
    $time = $_POST['timeInput'];
    list($hours, $minutes) = explode(':', $time);
    $totalMinutes = ($hours * 60) + $minutes;
    addShift($_POST['nameShift'], $totalMinutes);
}
$getAllShift2=getAllShift2();
include_once("app/views/admin/shift.view.php");
