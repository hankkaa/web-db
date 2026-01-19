<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "club_db");

$id = $_GET['id'];

$sql = "DELETE FROM member WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: 회원_데이터베이스.php");
exit;
?>