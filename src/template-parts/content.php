<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
$HT_THEMES = new HT_THEMES();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php
			if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
				twentysixteen_entry_date();
			}
		?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			$post_format = get_post_format( );
			switch($post_format)
			{
				case 'video': case 'audio': case 'quote':
					the_content();
				break;

				default: the_excerpt(); 

			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
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
				echo '<span class="separator">//</span>';
				printf( __('<span class="author-link">by <a href="%1$s">%2$s</a></span>', 'twentysixteen'), get_the_author_link(), get_the_author( ) );
				
			?>
		</div>
		<div class="share" align="center">

			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="genericon genericon-facebook"></i></a>

		</div>
		<div class="clearfix"></div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
