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
  <link rel="stylesheet" href="<?= base_url() ?>/css/app.css" />
  <link rel="stylesheet" href="<?= base_url() ?>codemirror/codemirror.css">
  <script src="<?= base_url() ?>codemirror/codemirror.js"></script>
</head>
<body>

  <div id="navigation">
    <div class="grid-container">
      <div class="grid-100">
        <ul>
          <li id="nav-home">
            <a href="<?= base_url() ?>">Home</a>
          </li>
          <?php if ($this->vault->isLogged()): ?>
          <li id="nav-new-post">
            <a href="<?= $this->vault->user->permalink('new-post') ?>">
              New post
            </a>
          </li>
          <li id="nav-drafts">
            <a href="<?= $this->vault->user->permalink('drafts') ?>">
              Drafts
            </a>
          </li>
          <li id="nav-logout">
            <a href="<?= site_url('logout') ?>">Logout</a>
          </li>
          <?php else: ?>
          <li id="nav-login">
            <a href="<?= site_url('login') ?>">Login</a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>

  <?= isset($yield) ? $yield : null ?>

  <script src="<?= base_url() ?>/unsemantic/javascripts/jquery.js"></script>
  <script>
    $(function() {
      var cmCounter = 0;
      $('.codemirror').each(function() {
        $(this).attr('id', 'codemirror-' + cmCounter);
        var myTextarea = $('#codemirror-' + cmCounter)[0];
        var editor = CodeMirror.fromTextArea(myTextarea, {
          mode: "text/html"
        });
      })
    });
  </script>
</body>
</html>

