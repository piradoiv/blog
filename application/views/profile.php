<div class="grid-container">
  <div class="grid-50 push-25 centered">
    <img src="<?= $user->avatar(200) ?>" alt="<?= $user->username ?>" class="avatar "/>
    <h1><?= $user->fullName() ?></h1>
    <p><?= $user->bio ?></p>
  </div>
</div>

