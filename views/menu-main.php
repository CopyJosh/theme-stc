<?php if ($root->getDepth() === 2) return; ?>

<?php
if ($root->getDepth() === 0) : ?>
    <ul class="navbar main">
        <?php endif?>

        <?php foreach ($root->getChildren() as $node) :
            $showDropdown = $node->hasChildren() && $root->getDepth() === 0; // we only use +1-level on main menu
            ?>
            <li><a class="<?= $node->get('active') ? 'active' : '' ?>" href="<?= $node->getUrl() ?>"><?= $node->title ?></a>
                <?php if ($showDropdown) : ?>
                    <ul class="navbar main dropdown <?= $node->get('active') ? 'active' : '' ?>" id="sub_<?= $node->slug ?>">
                        <?= $view->render('menu-main.php', ['root' => $node]) ?>
                    </ul>
                <?php endif ?>
            </li>
        <?php endforeach ?>

        <?php if ($root->getDepth() === 0) : ?>
    </ul>
<?php endif ?>
