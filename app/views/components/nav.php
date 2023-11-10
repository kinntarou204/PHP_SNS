<nav id="side-menu">
  <ul>
    <li>
      <img src="../images/svg/home.svg">
      <a href="../">ホーム</a>
    </li>
    <li>
      <img src="../images/svg/profile.svg">
      <a href="../user/">プロフィール</a>
    </li>
    <li>
      <a href="../user/logout.php">Sign out</a>
    </li>
  </ul>
  <p class="fw-bold">
  <p class="profile-image">
    <span class="fw-bold">@<?= @$user['name'] ?></span>
  </p>
  </p>
</nav>