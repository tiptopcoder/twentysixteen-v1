<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$HT_THEMES = new HT_THEMES();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			if( !is_single() ) {
				the_excerpt();
			} else {
				the_content();
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
				if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<span class="comments-link">';
					comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentysixteen' ), get_the_title() ) );
					echo '</span>';
				}
				echo '<span class="separator">//</span>';
				if ( 'post' === get_post_type() ) {
					$HT_THEMES->ht_entry_categories();
				}
			?>
		</div>
		<div class="share" align="center">

			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="genericon genericon-facebook"></i></a>

		</div>
		<div class="clearfix"></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
