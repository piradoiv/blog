
<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>
      <?= $post->title ?>
    </h1>
    <h2><?= $post->subtitle ?></h2>

    <?php if ($this->vault->isLogged() &&
      $post->user_id == $this->vault->user->id): ?>
    <p>
      [ <a href="<?= $post->permalink('edit') ?>">Edit</a> ]
    </p>
    <?php endif ?>

    <?= $post->render() ?>
  </div>
</div>

