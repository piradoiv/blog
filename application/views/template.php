<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title><?= isset($pageTitle) ? $pageTitle : null ?></title>
<!--[if lt IE 9]>
  <script src="<?= base_url() ?>unsemantic/javascripts/html5.js"></script>
<![endif]-->
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <link rel="stylesheet" href="<?= base_url() ?>unsemantic/stylesheets/unsemantic-grid-responsive.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="<?= base_url() ?>unsemantic/stylesheets/ie.css" />
<![endif]-->
  <link rel="stylesheet" href="<?= base_url() ?>css/app.css" />
  <script src="<?= base_url() ?>codemirror/codemirror.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/php/php.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/xml/xml.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/javascript/javascript.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/css/css.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <script src="<?= base_url() ?>codemirror/mode/clike/clike.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>codemirror/codemirror.css">
  <link rel="stylesheet" href="<?= base_url() ?>codemirror/theme/monokai.css">

</head>
<body>

  <div class="grid-container">
    <div class="grid-50 push-25">
      <div id="header">
        <div class="logo">
          <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>img/blog-icon.png" alt="Untitled" />
          </a>
        </div>
        <div class="blog-name">
          <h1><a href="<?= base_url() ?>">Gracias por el pescado</a></h1>
          <h2 class="author-heading">Un blog de Ricardo Cruz</h2>
        </div>
      </div>
    </div>
  </div>

  <?php if ($flashNotice = $this->notifications->get()): ?>
  <div class="grid-container">
    <div class="grid-100">
      <div class="flash-notice">
        <?= $flashNotice['message'] ?>
      </div>
    </div>
  </div>
  <?php endif ?>

  <?= isset($yield) ? $yield : null ?>

  <script src="<?= base_url() ?>unsemantic/javascripts/jquery.js"></script>
  <script src="<?= base_url() ?>js/app.js"></script>
</body>
</html>

