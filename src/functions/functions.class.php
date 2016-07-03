<?php

class HT_THEMES
{
	/* Initialize */
	public function __construct() {

		add_action( 'init' , array(&$this , 'init') );
	}

	public function init() {
		$this->add_actions();
	}

	public function add_actions() {
		add_action( 'wp_head' , array(&$this , 'ht_initialize_vars') );
		add_action( 'wp_enqueue_scripts' , array(&$this , 'ht_global_enqueue') );
	}

	public function ht_global_enqueue() {
		if(!is_admin()) {
			wp_enqueue_script( 'main-script', JS_URL . '/main.js', array( 'jquery' ) );
		}
	}
	public function ht_initialize_vars() {
		?>
        <script type="text/javascript">
            var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
        <?php
	}
	public function ht_pagination() {

		if( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="pagination"><ul class="page-numbers">' . "\n";

		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li class="li-navi">%s</li>' . "\n", get_previous_posts_link('← Previous') );

		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
			if($class==' class="active"') {
				printf( '<li%s><span><span>%s</span></span></li>' . "\n", $class, '1' );
			} else {
				printf( '<li%s><a class="page-number" href="%s"><span>%s</span></a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
			}
			

			if ( ! in_array( 2, $links ) )
				echo '<li class="dots"><span>…</span></li>';
		}

		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			if($class==' class="active"') {
				printf( '<li%s><span class="page-number"><span>%s</span></span></li>' . "\n", $class, $link );
			} else {
				printf( '<li%s><a class="page-number" href="%s"><span>%s</span></a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
			}
			
		}

		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li class="dots"><span>…</span></li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			if($class==' class="active"') {
				printf( '<li%s><span class="page-number"><span>%s</span></span></li>' . "\n", $class, $max );
			} else {
				printf( '<li%s><a class="page-number" href="%s"><span>%s</span></a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
			}
			
		}

		/**	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li class="li-navi">%s</li>' . "\n", get_next_posts_link('Next →') );

		echo '</ul><div class="clearfix"></div></div>' . "\n";

	}
	public function ht_entry_categories() {
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
		if ( $categories_list && twentysixteen_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
				$categories_list
			);
		}
	}

}
$HT_THEMES = new HT_THEMES();