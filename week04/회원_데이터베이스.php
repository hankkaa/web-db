<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "club_db");

$sql = "SELECT * FROM member";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>동아리 회원 목록</title>
</head>
<body>

<h1>동아리 회원 목록</h1>

<table border="1">
  <tr>
    <th>학과</th>
    <th>이름</th>
    <th>학번</th>
  </tr>

  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['department']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['student_id']}</td>";
    echo "<td>
          <a href='삭제.php?id={$row['id']}'
             onclick=\"return confirm('정말 삭제할까요?');\">
             삭제
          </a>
        </td>";
    echo "<td>
          <a href='수정화면.php?id={$row['id']}'>
            수정
          </a>
        </td>";
    echo "</tr>";
  }
  ?>

</table>

</body>
</html>
