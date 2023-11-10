<main class="m-auto w-50">
    <h2 class="p-2 text-center">会員登録確認</h2>
    <form action="add.php" method="post">
        <div class="form-group mt-3">
            <label class="form-label" for="">氏名</label>
            <p><?= $posts["name"] ?></p>
        </div>

        <div class="form-group mt-3">
            <label class="form-label" for="">Email</label>
            <p><?= $posts["email"] ?></p>
        </div>

        <div class="d-flex mt-3">
            <button class="btn btn-primary w-50 me-1">登録</button>
            <a href="./input.php" class="btn btn-outline-primary w-50">戻る</a>
        </div>
    </form>
</main>