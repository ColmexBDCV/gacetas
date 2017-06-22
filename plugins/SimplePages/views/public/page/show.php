<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div id="primary">
    <?php if (!$is_home_page): ?>
    <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
    <h1><?php 	$NombrePag = metadata('simple_pages_page', 'title');
    		echo $NombrePag; ?></h1>
    <?php endif; ?>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    if ($NombrePag == 'Mapa de ubicación de imprentas'){
    echo $this->shortcodes('[carta id="1"]'); 
    }
    elseif ($NombrePag == 'Mapa de lugares de venta de libros'){
    echo $this->shortcodes('[carta id="2"]'); 
    }
    ?>
</div>

<?php echo foot(); ?>
