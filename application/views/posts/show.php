
<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>
      <?= $post->title ?>
      <?php if ($this->vault->isLogged() &&
        $post->user_id == $this->vault->user->id): ?>
      <?php endif ?>
    </h1>
    <h2><?= $post->subtitle ?></h2>
    <p>
      [ <a href="<?= $post->permalink('edit') ?>">Edit</a> ]
    </p>
    <?= $post->render() ?>
  </div>
</div>

