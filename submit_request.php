
<?php
// データベース接続情報
$servername = "localhost";
$username = "root";  // XAMPPのデフォルトユーザー名
$password = "";  // XAMPPのデフォルトではパスワードは空
$dbname = "ich_database";

// 接続の作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続のチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// フォームデータの取得
$company = $_POST['company'];
$requirements = $_POST['requirements'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// SQLクエリの実行
$sql = "INSERT INTO requests (company, requirements, phone, email) VALUES ('$company', '$requirements', '$phone', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "新しいレコードが作成されました";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 接続を閉じる
$conn->close();
?>
