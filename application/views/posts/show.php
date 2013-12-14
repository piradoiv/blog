
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

    <div class="grid-container article-author">
      <div class="grid-20">
        <img src="<?= $author->avatar(110) ?>" class="avatar" alt="<?= $author->username ?>" />
      </div>
      <div class="grid-80">
        <strong>
          by <a href="<?= $author->permalink() ?>"><?= $author->fullName() ?></a>
        </strong>
        <br />
        <i><?= $author->bio ?></i>
      </div>
    </div>
  </div>
</div>

