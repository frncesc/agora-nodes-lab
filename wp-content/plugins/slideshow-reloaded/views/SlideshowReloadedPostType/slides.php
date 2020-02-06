<?php if ($data instanceof stdClass) : ?>

	<p style="text-align: center; font-style: italic"><?php _e('Insert', 'slideshow-reloaded') ?>:</p>
	<p style="text-align: center;">
		<input type="button" class="button slideshow-insert-image-slide" value="<?php _e('Media slide', 'slideshow-reloaded') ?>" />
		<input type="button" class="button slideshow-insert-text-slide" value="<?php _e('Text slide', 'slideshow-reloaded') ?>" />
		<input type="button" class="button slideshow-insert-video-slide" value="<?php _e('Youtube slide', 'slideshow-reloaded') ?>" />
	</p>

	<p style="text-align: center;">
		<a href="#" class="open-slides-button"><?php _e('Open all', 'slideshow-reloaded') ?></a> |
		<a href="#" class="close-slides-button"><?php _e('Close all', 'slideshow-reloaded') ?></a>
	</p>

	<?php if (count($data->slides) <= 0) : ?>
		<p><?php _e('Add slides to this slideshow by using one of the buttons above.', 'slideshow-reloaded') ?></p>
	<?php endif ?>

	<div class="sortable-slides-list">

		<?php

		if (is_array($data->slides)) {
			$i = 0;

			foreach ($data->slides as $slide) {
				$data             = new stdClass();
				$data->name       = SlideshowReloadedSlideshowSettingsHandler::$slidesKey . '[' . $i . ']';
				$data->properties = $slide;

				SlideshowReloadedMain::outputView('SlideshowReloadedSlideshowSlide' . DIRECTORY_SEPARATOR . 'backend_' . $slide['type'] . '.php', $data);

				$i++;
			}
		}

		?>

	</div>

	<?php
		
		// XTEC ************ AFEGIT - get slides from external albums
		// 2014.10.22 @jmeler - 2016.04.22 @sarjona - 2020.02.06 @jmeler
		
		echo '<hr><p style="color:green; font-weight:bold">Si voleu mostrar més de 10 diapositives us recomanem carregar-les des d\'un àlbum extern:</p>
		<strong>Àlbum</strong> (<a target="_blank" href="https://sites.google.com/a/xtec.cat/ajudaxtecblocs/insercio-de-continguts/creacio-de-galeries-d-imatges-amb-album">extensió</a>):
		<textarea name="album_extension">'.get_post_meta( $post->ID, "album_extension", true ).'</textarea>';
		
		//************ FI 

	?>

	<?php SlideshowReloadedMain::outputView('SlideshowReloadedSlideshowSlide' . DIRECTORY_SEPARATOR . 'backend_templates.php') ?>

<?php endif ?>
