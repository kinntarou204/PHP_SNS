<?php include(VIEW_DIR . 'components/tweet_form.php') ?>

<div class="tweet-contents">
    <?php foreach ($tweets as $tweet) : ?>
        <div>
            <div class="tweet-body">
                <div class="tweet d-flex">
                    <!-- profile image -->
                    <div class="profile-image">
                        <img src="../images/me.png">
                    </div>

                    <div class="tweet-body">
                        <div>
                            <span class="ms-1 text-secondary">@<?= $tweet['user_name'] ?></span>
                            <span class="ms-1 text-secondary"><?= date('Y/m/d H:i', strtotime($tweet['created_at'])) ?></span>
                        </div>
                        <div class="tweet-text mt-2 mb-2">
                            <?= nl2br($tweet['message']) ?>
                        </div>

                        <!-- いいねフォーム -->
                        <?php include(VIEW_DIR . 'components/like_form.php'); ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>