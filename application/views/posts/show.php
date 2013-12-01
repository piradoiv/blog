
<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>
      <?= $post->title ?>
      <?php if ($this->vault->isLogged() &&
        $post->user_id == $this->vault->user->id): ?>
      <a href="<?= $post->permalink('edit') ?>">Edit</a>
      <?php endif ?>
    </h1>
    <h2><?= $post->subtitle ?></h2>
    <?= $post->render() ?>
  </div>
</div>

