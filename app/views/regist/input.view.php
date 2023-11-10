<main class="m-auto w-50">
    <h2 class="p-2 text-center">会員登録</h2>
    <form action="confirm.php" method="post">
        <div class="form-floating mt-3">
            <input class="form-control" type="text" name="name" value="<?= @$member['name'] ?>">
            <label class="form-label" for="">氏名</label>
            <p class="text-danger"><?= @$errors["name"] ?></p>
        </div>

        <div class="form-floating mt-3">
            <input class="form-control" type="email" name="email" value="<?= @$member['email'] ?>">
            <label class="form-label" for="">Email</label>
            <p class="text-danger"><?= @$errors["email"] ?></p>
        </div>

        <div class="form-floating mt-3">
            <input class="form-control" type="password" name="password">
            <label class="form-label" for="">パスワード</label>
            <p class="text-danger"><?= @$errors["password"] ?></p>
        </div>

        <div class="d-flex mt-3">
            <button class="btn btn-primary w-50 me-1">確認</button>
            <a href="../" class="btn btn-outline-primary w-50">戻る</a>
        </div>
    </form>
</main>