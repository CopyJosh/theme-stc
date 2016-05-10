<?php
if ($root->getDepth() === 0) : ?>
    <ul class="navbar footer-menu">
        <?php endif ?>

        <?php foreach ($root->getChildren() as $node) : ?>
            <li><a href="<?= $node->getUrl() ?>"><?= $node->title ?></a></li>
        <?php endforeach ?>

        <?php if ($root->getDepth() === 0) : ?>
    </ul>
<?php endif ?>
