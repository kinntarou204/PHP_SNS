<?php
require_once "../../env.php";

class LikeController
{
    public function like()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user_id = $_POST["user_id"];
            $tweet_id = $_POST["tweet_id"];

            // ここでデータベースへの「いいね」の追加処理を実装

            // 以下は仮のレスポンスです。実際の処理に合わせて変更してください。
            echo json_encode([
                "success" => true,
                "liked" => true, // いいねが成功した場合は true
                "like_count" => 10 // いいねの総数を返す
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Invalid request method"
            ]);
        }
    }
}

$controller = new LikeController();
$controller->like();