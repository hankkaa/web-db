<?php
// DB 접속
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "todo_db");

if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

// calendar.php에서 넘겨준 id와 month 값을 받습니다.
$id = $_GET['id'];
$month = $_GET['month'];

// 데이터를 수정합니다. (조회용 SELECT문이나 $date 변수는 필요 없습니다)
$sql = "UPDATE todo SET is_done = NOT is_done WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    // 수정이 완료되면 다시 캘린더의 원래 보던 달로 돌아갑니다.
    header("Location: calendar.php?month=$month");
    exit;
} else {
    echo "에러 발생: " . mysqli_error($conn);
}
?>