
<?php
if ($root->getDepth() === 0) : ?>
<nav class="sidebar">
    <ul class="sidebar-menu">
        <?php endif?>

        <?php foreach ($root->getChildren() as $node) :
            if ($node->get('active')) :
                if ($node->hasChildren()) :
                    echo $view->render('menu-sidebar.php', ['root' => $node]);
                elseif ($node->slug == 'case-studies') :

                    $query = \StandardTextile\CaseStudy\Model\Post::where(['status = ?', 'date < ?'],
                                [\StandardTextile\CaseStudy\Model\Post::STATUS_PUBLISHED,
                                new \DateTime])->where(function ($query) {
                                    return $query->where('roles IS NULL')->whereInSet('roles', \Pagekit\Application::user()->roles, false, 'OR');
                                }
                                )->orderBy('id', 'desc')->related('user');

                    $active = false;
                    if ($app['request']->attributes->get('_route') == '@case-study/id') {
                        $active = $app['request']->attributes->get('id');
                    }

                    foreach ($posts = $query->get() as $post) : ?>

                        <li><a href="<?= $view->url('@case-study/id', ['id' => $post->id]) ?>" class="<?= ($active  == $post->id) ? 'active' : '' ?>"><?= $post->title ?></a></li>

                    <?php endforeach;
                else :
                    foreach ($root->getChildren() as $node) : ?>
                        <li><a class="<?= $node->get('active') ? 'active' : '' ?>" href="<?= $node->getUrl() ?>"><?= $node->title ?></a></li>
                    <?php endforeach;
                endif;
            endif;
        endforeach ?>

        <?php if ($root->getDepth() === 0) : ?>
    </ul>
</nav>
<?php endif ?>
