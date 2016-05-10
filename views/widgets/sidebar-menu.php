<nav class="sidebar">
    <ul class="sidebar-menu">
        <?php foreach ($root->getChildren() as $node) : ?>
            <li><a class="<?= $node->get('active') ? 'active' : '' ?>" href="<?= $node->getUrl() ?>"><?= $node->title ?></a></li>
        <?php endforeach ?>
    </ul>
</nav>
