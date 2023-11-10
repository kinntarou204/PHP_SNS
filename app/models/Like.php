<?php
class Like extends Model
{
    public string $table = "likes";

    function has($tweet_id, $user_id)
    {
        $sql = "SELECT * FROM {$this->table} 
                WHERE tweet_id = \"{$tweet_id}\"
                AND user_id = \"{$user_id}\";";
        $like = $this->fetchBySQL($sql);
        return $like;
    }

    function counts()
    {
        $sql = "SELECT tweet_id, count(tweet_id) AS counts 
                FROM likes
                GROUP BY tweet_id;";
        $likes = $this->fetchAllBySQL($sql);
        $columns = array_column($likes, 'tweet_id');
        $values = array_column($likes, 'counts');
        $counts = array_combine($columns, $values);
        return $counts;
    }
    function countByTweetId($tweet_id)
    {
        $sql = "SELECT count(tweet_id) AS count 
                FROM likes
                WHERE tweet_id = {$tweet_id}
                GROUP BY tweet_id;";
        $results = $this->fetchBySQL($sql);
        return $results['count'];
    }

    function valuesByUser($user)
    {
        $sql = "SELECT * FROM likes 
                WHERE user_id = {$user['id']};";
        $values = $this->fetchAllBySQL($sql);
        $values = array_column($values, 'tweet_id');
        return $values;
    }

}
