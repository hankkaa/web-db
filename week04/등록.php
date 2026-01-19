<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "club_db");

if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

$department = $_POST['department'];
$name = $_POST['name'];
$student_id = $_POST['student_id'];

$sql = "INSERT INTO member (department, name, student_id)
        VALUES ('$department', '$name', '$student_id')";

mysqli_query($conn, $sql);

header("Location: 회원_데이터베이스.php");
exit;

?>