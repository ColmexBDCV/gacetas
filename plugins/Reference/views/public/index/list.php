<?php
$pageTitle = __('Buscar elementos por "%s"', $slugData['label']); //Browse Items by
echo head(array(
    'title' => $pageTitle,
    'bodyclass' => 'reference browse list',
)); ?>
<div id="primary" class="reference">
    <h1><?php echo __('Buscar elementos por "%s" (%d ocurrencias)', $slugData['label'], count($references)); ?></h1>
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>
    <?php
    if (count($references)) :
        echo $this->reference()->displayList($references, array(
            'slug' => $slug,
        ));
    else:
        echo '<p>' . __('There is no references for "%s".', $slugData['label']) . '</p>';
    endif;
    ?>
</div>
<?php echo foot();