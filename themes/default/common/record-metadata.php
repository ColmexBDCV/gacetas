<?php 
//este código se logró con apoyo de la siguiente liga
//http://omeka.org/forums-legacy/topic/customizing-item-output
//http://omeka.org/forums-legacy/topic/customizz-dc-fields
//http://omeka.org/forums-legacy/topic/how-to-display-the-item-type-value-on-items-showphp
if (metadata('item','item_type_name') == 'Publicación2'): ?>
<?php	//echo metadata('item','item_type_name');
	$ordenElementos = array();
	//$ordenElementos['Título'] = $elementsForDisplay['Dublin Core']['Title'];
	$ordenElementos['Autor'] = $elementsForDisplay['Dublin Core']['Creator'];
	$ordenElementos['Cargo / Actividad / Orden'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Cargo / Actividad / Orden'];
	$ordenElementos['VIAF'] = $elementsForDisplay['Publicación2 Item Type Metadata']['VIAF'];
	$ordenElementos['Autor secundario'] = $elementsForDisplay['Dublin Core']['Contributor'];
	$ordenElementos['Temas'] = $elementsForDisplay['Dublin Core']['Subject'];
	$ordenElementos['Lugar de publicación'] = $elementsForDisplay['Dublin Core']['Coverage'];
	$ordenElementos['Impresor'] = $elementsForDisplay['Dublin Core']['Publisher'];
	$ordenElementos['Ubicación de la imprenta'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Ubicación de la imprenta'];
	$ordenElementos['Año de publicación'] = $elementsForDisplay['Dublin Core']['Date'];
	$ordenElementos['Número de volúmenes'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Número de volúmenes'];
	$ordenElementos['Lugar de venta'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Lugar de venta'];
	$ordenElementos['Precio'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Precio'];
	$ordenElementos['Catálogos'] = $elementsForDisplay['Dublin Core']['Identifier'];
	$ordenElementos['PDF Disponible'] = $elementsForDisplay['Publicación2 Item Type Metadata']['PDF Disponible'];
	$ordenElementos['Dirección PDF'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Dirección PDF'];
	$ordenElementos['Fecha de la Gaceta'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Fecha de la Gaceta'];
	$ordenElementos['Número de la Gaceta'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Número de la Gaceta'];
	$ordenElementos['Página de la Gaceta'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Página de la Gaceta'];
	$ordenElementos['Nombre de la sección'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Nombre de la sección'];
	$ordenElementos['Notas'] = $elementsForDisplay['Publicación2 Item Type Metadata']['Notas'];
	$flg = 0;
	?>
	<div class="element-set">
	    <?php foreach ($ordenElementos as $elementName => $elementInfo): ?>
		    <?php if ($flg == 0):?>
			    <h2><?php echo ('Datos sobre el autor'); ?></h2>
			<?php elseif ($flg == 4): ?>
			    <h2><?php echo ('Datos sobre el libro'); ?></h2>
			<?php elseif ($flg == 15): ?>
			    <h2><?php echo ('Datos sobre la Gaceta'); ?></h2>
		    <?php endif;?>
	    <?php if (!empty($elementInfo)):?>
	    <div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
		<h3><?php 
			$label = __($elementName);
			echo html_escape(__($label));
			//echo html_escape(__($elementName)); ?></h3>
		<?php foreach ($elementInfo['texts'] as $text): ?>
		    <div class="element-text"><?php 
		    	 if ($label == 'VIAF'):?>
		    	 <?php echo "Más información sobre el autor: "; ?>
		    		<a href="<?= $text ?>" target = "_blank"> <?= $text ?> </a>
		    	 <?php elseif ($label == 'Dirección PDF'):?>
		    	 <?php echo "Texto completo: "; ?>
		    	<p> <a href="<?= $text ?>" target = "_blank"> <?= $text ?> </a> </p>
		      <?php else:
		    	echo $text; 
		    	endif;?></div>
		<?php endforeach; ?>
	    </div><!-- end element -->
	    	<?php endif; ?>
	    <?php $flg++;
	    	//echo $flg;
	   	 endforeach; ?>
	</div><!-- end element-set -->
<?php /*elseif(metadata('item','item_type_name') == 'Ubicación Imprentas'):?>
	<?php //echo 'it ubicacion imprentas'; ?>		
	<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php $ocultaTitle = __($elementName);
        	if (html_escape($ocultaTitle) <> 'Título'){
        	echo html_escape($ocultaTitle); }?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php 
            	if($ocultaTitle <> 'Título'){
            		echo $text; }?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;?>
<?php echo $this->shortcodes('[carta id="1"]'); */?>	
<?php else: ?>
	<?php //echo 'it is false'; ?>
	<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;?>	
<?php endif; ?>
