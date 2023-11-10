<div class="tweet-nav mb-3">
    <form action="/like.php" method="POST" id="likeForm">
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">
        <?php if (in_array($tweet['id'], $user_likes)) : ?>
            <button class="btn btn-sm" id="likeButton" style="background-color: transparent; border: none;"><img src="../images/svg/heart_active.svg" alt="Liked" style="width: 20px; height: 20px;"></button>
            <span class="like-count" id="likeCount"><?= isset($like_counts[$tweet['id']]) ? $like_counts[$tweet['id']] : 0 ?></span>
        <?php else : ?>
            <button class="btn btn-sm" id="likeButton" style="background-color: transparent; border: none;"><img src="../images/svg/heart.svg" alt="Like" style="width: 20px; height: 20px;"></button>
            <span class="like-count" id="likeCount"><?= isset($like_counts[$tweet['id']]) ? $like_counts[$tweet['id']] : 0 ?></span>
        <?php endif ?>
    </form>
</div>

<script>
    var likeForm = document.getElementById('likeForm');
    var likeButton = document.getElementById('likeButton');
    likeButton.addEventListener('click', function (e) {
    e.preventDefault();
    var formData = new FormData(likeForm);
    fetch('/like.php', { // ここをlike.phpの正しいパスに修正
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
        var likeCount = document.getElementById('likeCount');
        likeCount.textContent = data.like_count;
        if (data.liked) {
            likeButton.innerHTML = '<img src="../images/svg/heart_active.svg" alt="Liked" style="width: 20px; height: 20px;">';
        } 
        else {
            ikeButton.innerHTML = '<img src="../images/svg/heart.svg" alt="Like" style="width: 20px; height: 20px;">';
        }
        }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>