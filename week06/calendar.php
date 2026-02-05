<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>2026 Todo 캘린더</title>
</head>
<body>

<h1>📅 2026년 Todo 캘린더</h1>

<form method="get">
  <select name="month">
    <?php
    for ($m = 1; $m <= 12; $m++) {
        echo "<option value='$m'>{$m}월</option>";
    }
    ?>
  </select>
  <button type="submit">보기</button>
</form>

<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "todo_db");

if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

$year = 2026;
$month = $_GET['month'] ?? 1;

echo "<h2>{$month}월</h2>";
echo "<table border='1' cellpadding='10'>";

// 요일 헤더
echo "<tr>
        <th>일</th>
        <th>월</th>
        <th>화</th>
        <th>수</th>
        <th>목</th>
        <th>금</th>
        <th>토</th>
      </tr>";

echo "<tr>";

// 1일의 요일
$firstDayOfWeek = date("w", strtotime("$year-$month-01"));

for ($i = 0; $i < $firstDayOfWeek; $i++) {
    echo "<td></td>";
}

$lastDay = date("t", strtotime("$year-$month-01"));

for ($day = 1; $day <= $lastDay; $day++) {
    $date = sprintf("%04d-%02d-%02d", $year, $month, $day);

    echo "<td valign='top' style='height:80px; width:100px;'>";
    echo "<a href='todo.php?date=$date' style='text-decoration:none; color:black;'>";
    echo "<strong>$day</strong>";
    echo "</a><br>";

    $sql = "SELECT id, content, is_done FROM todo WHERE todo_date = '$date'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id']; 
        
        echo "• <a href='toggle.php?id=$id&month=$month' style='text-decoration:none; color:black;'>";
        
        if (isset($row['is_done']) && $row['is_done'] == 1) {
            echo "<del>" . $row['content'] . "</del>";
        } else {
            echo $row['content'];
        }
        
        echo " <a href='delete.php?id=$id&month=$month' style='color:red; text-decoration:none;' onclick='return confirm(\"정말 삭제할까요?\")'>[x]</a>";
        echo "</a><br>";
    }

    echo "</td>";

    if ( ($firstDayOfWeek + $day) % 7 == 0 ) {
        echo "</tr><tr>";
    }
}

echo "</tr></table>";
?>

</body>
</html>