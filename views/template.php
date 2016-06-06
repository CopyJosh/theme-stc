<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $view->render('head') ?>
    <?php $view->style('uikit-css', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/2.26.3/css/uikit.min.css') ?>
    <?php $view->style('theme', 'theme:css/theme.css') ?>
    <?php $view->script('theme', 'theme:js/theme.js', ['uikit']) ?>

    <script type="text/javascript">
        $(function() {
            $(".cross").hide();
            $(".hamburger").click(function () {
                $("#ham").slideToggle("fast", function () {
                    $(".hamburger").hide();
                    $(".cross").show();
                });
            });

            $(".cross").click(function () {
                $("#ham").slideToggle("fast", function () {
                    $(".cross").hide();
                    $(".hamburger").show();
                });
            });
        });
    </script>
</head>
<body id="<?= $params['stc_page_id']."_page" ?>">

<!-- hamburger menu -->
<button class="hamburger">&#9776;</button>
<button class="cross">&#735;</button>

<div class="top-bar">
    <nav class="nav" role="navigation">
        <?php if ($view->position()->exists('header-bar')) : ?>
            <?= $view->position('header-bar', 'position-header-bar.php') ?>
        <?php endif; ?>
    </nav> <!-- navbar (account) -->
</div>

<div class="container">

    <header class="header">

        <div class="branding">
            <?php if ($logo = $params['logo']) : ?>
                <a href="<?= $view->url()->get() ?>"><img src="<?= $this->escape($logo) ?>" alt="" /></a>
            <?php endif ?>
            <h1>
                <?php if ($title = $params['title']) : ?>
                    <a id="site_name" href="<?= $view->url()->get() ?>"><?= $this->escape($title) ?>&trade;</a>
                <?php endif ?>
                <?php if ($tagline = $params['stc_tagline']) : ?>
                    <?= $this->escape($params['stc_tagline']) ?>
                <?php endif ?>
            </h1>
        </div><!-- branding -->

        <!-- Render menu position -->
        <?php if ($view->menu()->exists('main')) : ?>
        <nav class="nav" role="navigation">
            <?= $view->menu('main', 'menu-main.php') ?>
        </nav>
        <?php endif ?>

        </nav><!-- navigation -->
    </header> <!-- header -->

    <!-- Render system messages -->
    <?= $view->render('messages') ?>

    <!-- Render content -->
    <!-- Render widget position -->
    <section id="<?= $params['stc_page_id'] ?>" class="page-container">
        <!-- Render menu position -->
        <?php
        if ($params['stc_page_id'] == 'benchmarks'
            || $params['stc_page_id'] == 'best-practices') {
            echo $view->menu('main', 'menu-sidebar.php');
        } elseif ($params['stc_page_id'] == 'case-studies') {
            echo $view->render('case-study:views/category-menu.php');
        }
        ?>
        <?= $view->render('content') ?>
    </section>

    <?php if ($view->position()->exists('footer') || $view->menu()->exists('footer')) : ?>
    <footer class="footer">

          <div class="info">
              <span>
                  <?php if ($stc_copyright = $params['stc_copyright']) : ?>
                      <?= $this->escape($stc_copyright) ?>&nbsp;&nbsp;
                  <?php endif ?>
                  |
                  <?php if ($stc_phone = $params['stc_phone']) : ?>
                      &nbsp;&nbsp;<a href="tel:+<?= $this->escape($stc_phone) ?>"><?= $this->escape($stc_phone) ?></a>
                  <?php endif ?>
              </span>
          </div>

          <!-- Render menu position -->
          <?php if ($view->menu()->exists('footer')) : ?>
          <nav class="nav" role="navigation">
              <?= $view->menu('footer', 'menu-footer.php') ?>
          </nav>
          <?php endif ?>

    </footer>
    <?php endif ?>

</div>

    <!-- Insert code before the closing body tag  -->
    <?= $view->render('footer') ?>

    <?= $view->render('theme:views/analytics.php') ?>

</body>
</html>
