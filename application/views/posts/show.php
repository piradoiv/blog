
<div class="grid-container">
  <div class="grid-50 push-25">
    <?= isset($yield) ? $yield : null ?>

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

