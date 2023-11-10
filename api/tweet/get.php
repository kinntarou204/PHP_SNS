<?php
require_once "../../env.php";

class ApiController
{
    // ... 他のメソッド

    public function tweets()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $content = $_POST["content"]; // 投稿内容を取得

            // ここでデータベースへの接続を行います（適切な設定が必要です）
            try {
                $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // SQLクエリの準備と実行
                $stmt = $db->prepare("INSERT INTO tweets (content) VALUES (:content)");
                $stmt->bindParam(":content", $content);
                $stmt->execute();

                // 成功メッセージを出力
                echo "投稿が保存されました。";

            } catch (PDOException $e) {
                // エラーが発生した場合、エラーメッセージを出力
                echo "エラー: " . $e->getMessage();
            }
        } else {
            echo "POSTリクエストを送信してください。";
        }
    }
}

$controller = new ApiController();
$controller->tweets();
?>