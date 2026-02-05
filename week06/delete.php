<?php
// delete.php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "todo_db");

if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
}

// 삭제할 항목의 id와 돌아갈 month 정보를 받습니다.
$id = $_GET['id'];
$month = $_GET['month'];

// 3회차/4회차 복습: DELETE 문을 사용해 특정 id를 가진 행을 삭제합니다.
$sql = "DELETE FROM todo WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    // 삭제 성공 시 다시 해당 월의 캘린더로 돌아갑니다.
    header("Location: calendar.php?month=$month");
    exit;
} else {
    echo "삭제 실패: " . mysqli_error($conn);
}
?>