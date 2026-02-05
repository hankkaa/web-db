<?php
$conn = mysqli_connect("localhost", "root", "Gahyeon*4722", "todo_db");

$date = $_GET['date'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $date = $_POST['date'];

    $sql = "INSERT INTO todo (content, todo_date) VALUES ('$content', '$date')";
    mysqli_query($conn, $sql);

    header("Location: calendar.php?month=" . date("n", strtotime($date)));
    exit;
}
?>

<h2>📌 Todo 추가 (<?= $date ?>)</h2>

<form method="post">
  <input type="hidden" name="date" value="<?= $date ?>">
  <input type="text" name="content" required>
  <button>추가</button>
</form>