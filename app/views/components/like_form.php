<div class="tweet-nav mb-3">
    <form action="/like.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">

        <?php if (in_array($tweet['id'], $user_likes)) : ?>
            <button class="btn btn-sm" id="likeButton" style="background-color: transparent; border: none;"><img src="../images/svg/heart_active.svg" alt="Liked" style="width: 20px; height: 20px;"></button>
            <span class="like-count"><?= isset($like_counts[$tweet['id']]) ? $like_counts[$tweet['id']] : 0 ?></span>
        <?php else : ?>
            <button class="btn btn-sm" id="likeButton" style="background-color: transparent; border: none;"><img src="../images/svg/heart.svg" alt="Like" style="width: 20px; height: 20px;"></button>
            <span class="like-count"><?= isset($like_counts[$tweet['id']]) ? $like_counts[$tweet['id']] : 0 ?></span>
        <?php endif ?>
    </form>
</div>

<script>
    document.getElementById('likeButton').addEventListener('click', function(e) {
        e.preventDefault();
        var form = this.parentElement;
        var request = new XMLHttpRequest();
        request.open(form.method, form.action, true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.onload = function() {
            if (request.status >= 200 && request.status < 400) {
                var responseData = JSON.parse(request.responseText);
                if (responseData.success) {
                    var likeButton = document.getElementById('likeButton');
                    likeButton.firstElementChild.src = responseData.liked ? '../images/svg/heart_active.svg' : '../images/svg/heart.svg';
                    var likeCount = likeButton.nextElementSibling;
                    likeCount.textContent = responseData.like_count;
                }
            }
        };
        request.onerror = function() {
            // エラーハンドリング
        };
        request.send(new FormData(form));
    });
</script>