<?php
class ApiController extends Controller
{
    public function tweets()
    {
        $tweet = new Tweet();
        $tweets = $tweet->get();
        echo json_encode($tweets);
    }

    public function likeCount()
    {
        $results['count'] = 0;
        if (isset($_GET["tweet_id"])) {
            $tweet_id = $_GET["tweet_id"];
            $like = new Like();
            $results['count'] = $like->countByTweetId($tweet_id);
        }
        echo json_encode($results);
    }
}
