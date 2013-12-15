
<div class="grid-container">
  <div class="grid-50 push-25">
    <?= isset($yield) ? $yield : null ?>

    <div class="grid-container article-author">
      <div class="grid-20">
        <img src="<?= $author->avatar(110) ?>" class="avatar" alt="<?= $author->username ?>" />
      </div>
      <div class="grid-80">
        <h3>
          <a href="<?= $author->permalink() ?>"><?= $author->fullName() ?></a>
        </h3>
        <p><?= $author->bio ?></p>
      </div>
    </div>
  </div>
</div>

