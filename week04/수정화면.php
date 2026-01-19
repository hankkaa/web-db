<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "club_db");
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM member WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<form action="수정.php" method="post">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">

  학과: <input type="text" name="department" value="<?= $row['department'] ?>"><br>
  이름: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
  학번: <input type="text" name="student_id" value="<?= $row['student_id'] ?>"><br>

  <button type="submit">수정</button>
</form>