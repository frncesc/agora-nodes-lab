<?php
/**
 * The template for displaying post content
 *
 * @package Reactor
 * @subpackage Post-Formats
 * @since 1.0.0
 */

global $column_amplada;
global $card_bgcolor;
$ample = 'large-3';
?>

<?php if ($column_amplada < 12) { ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("large-$column_amplada small-12 columns $card_bgcolor"); ?>>
            <div class="entry-body">

                <header class="entry-header">
                    <?php echo reactor_tumblog_icon(); ?>
                    <?php reactor_post_header(); ?>
                </header>
                <div class="entry-summary">
                    <?php (get_post_meta( get_the_ID(), '_bloc_html', true )!="on")? the_excerpt(): the_content();?>
                </div>
                <footer class="entry-footer">
                    <?php  reactor_post_footer();?>
                </footer>
             </div><!-- .entry-body -->
 	 </article><!-- #post -->
   <?php } else {
            // Targeta ocupa tota l'amplada
            $ample = 'large-12';
            if (get_post_meta( get_the_ID(), '_bloc_html', true ) == "on" ) {
                $bloc_html = true;
            } else {
                $bloc_html = false;
            }
         ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class("large-12 small-12 columns $card_bgcolor"); ?>>
              <div class="row entry-body">
              <div class="<?php echo $ample;?> columns">
                   <header class="entry-header fullwidth">
                       <?php echo reactor_tumblog_icon(); ?>
                       <?php reactor_do_standard_header_titles(); ?>
                       <?php reactor_do_meta_autor_date(); ?>
                   </header>
                   <?php if (!$bloc_html && has_post_thumbnail() ) { ?>
                        <div class="<?php echo $ample;?> columns">
                            <?php reactor_do_standard_thumbnail(); ?>
                        </div>
                    <?php } ?>
                    <div class="entry-summary">
                    <?php ($bloc_html)? the_content() : the_excerpt(); ?>
                    </div>
              </div>

                <div>
                    <footer style="padding:0.8em" class="entry-footer">
                        <?php  reactor_post_footer();?>
                    </footer>
                </div>
              </div><!-- .entry-body -->
           </article><!-- #post -->
<?php }
