<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "club_db");

$id = $_POST['id'];
$department = $_POST['department'];
$name = $_POST['name'];
$student_id = $_POST['student_id'];

$sql = "UPDATE member SET department='$department', name='$name', student_id='$student_id' WHERE id=$id";

mysqli_query($conn, $sql);

header("Location: 회원_데이터베이스.php");
exit;
?>