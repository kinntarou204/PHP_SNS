<main class="m-auto w-50">
    <h2 class="p-2 text-center">ログイン</h2>
    <form action="auth.php" method="post">
        <div class="form-floating mt-3">
            <input class="form-control" type="email" name="email" value="<?= @$member['email'] ?>">
            <label class="form-label" for="">Email</label>
            <p class="text-danger"><?= @$errors["email"] ?></p>
        </div>

        <div class="form-floating mt-3">
            <input class="form-control" type="password" name="password" value="<?= @$member['password'] ?>">
            <label class="form-label" for="">パスワード</label>
            <p class="text-danger"><?= @$errors["password"] ?></p>
        </div>

        <div class="text-center mt-3">
            <button class="btn btn-primary w-100 me-1 mb-3">ログイン</button>
            <a href="../regist/" class="btn btn-outline-primary w-100">新規会員登録</a>
        </div>
    </form>
</main>