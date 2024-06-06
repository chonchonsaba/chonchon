<?php
// データベース接続情報
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// 接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続のチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQLクエリの実行
$sql = "SELECT id, company, requirements, phone, email, created_at FROM requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>依頼主</th><th>要件</th><th>電話番号</th><th>メールアドレス</th><th>日付</th></tr>";
    // データの出力
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["company"]."</td><td>".$row["requirements"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["created_at"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// 接続を閉じる
$conn->close();
?>
