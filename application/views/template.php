<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title><?= isset($pageTitle) ? $pageTitle : null ?></title>
<!--[if lt IE 9]>
  <script src="<?= base_url() ?>/unsemantic/javascripts/html5.js"></script>
<![endif]-->
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <link rel="stylesheet" href="<?= base_url() ?>/unsemantic/stylesheets/unsemantic-grid-responsive.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="<?= base_url() ?>/unsemantic/stylesheets/ie.css" />
<![endif]-->
</head>
<body>

  <div id="navigation">
    <div class="grid-container">
      <div class="grid-100">
        <a href="<?= base_url() ?>">Home</a>
        <?php if ($this->vault->isLogged()): ?>
        <a href="<?= $this->vault->user->permalink('new-post') ?>">
          New post
        </a>
        <a href="<?= $this->vault->user->permalink('drafts') ?>">
          Drafts
        </a>
        <a href="<?= site_url('logout') ?>">Logout</a>
        <?php else: ?>
        <a href="<?= site_url('login') ?>">Login</a>
        <?php endif ?>
      </div>
    </div>
  </div>

  <?= isset($yield) ? $yield : null ?>

  <script src="<?= base_url() ?>/unsemantic/javascripts/jquery.js"></script>
</body>
</html>

