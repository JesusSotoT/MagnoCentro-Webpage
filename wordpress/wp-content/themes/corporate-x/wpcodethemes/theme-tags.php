<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Corporate_X
 */

if( ! function_exists( 'corporate_x_get_author' ) ) :

	function corporate_x_get_author() {
		if ( 'post' === get_post_type() ) {
			printf(
				/* translators: %s: post author. */
				esc_html_x( ' %s', 'post author', 'corporate-x' ),	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}

	}
endif;

if( ! function_exists( 'corporate_x_get_date' ) ) :

	function corporate_x_get_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'corporate-x' ),'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );
	}
endif;


if( ! function_exists( 'corporate_x_get_categories' ) ) :

	function corporate_x_get_categories() {

		//Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'corporate-x' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'corporate-x' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if( ! function_exists( 'corporate_x_get_comments_no' ) ) :

	function corporate_x_get_comments_no() {

		// get_comments_number returns only a numeric value
		$num_comments = get_comments_number(); 

		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				/* translators: 1: no of comments. */
				printf( '<span class="comments-link"><a href="' . esc_url( get_comments_link() ) .'">' . esc_html__( ' %1$s', 'corporate-x' ) . '</span>', absint( $num_comments ) );
			} elseif ( $num_comments > 1 ) {
				/* translators: 1: no of comments. */
				printf( '<span class="comments-link"><a href="' . esc_url( get_comments_link() ) .'">' . esc_html__( ' %1$s', 'corporate-x' ) . '</span>', absint( $num_comments ) );
			} else {
				/* translators: 1: no of comments. */
				printf( '<span class="comments-link"><a href="' . esc_url( get_comments_link() ) .'">' . esc_html__( ' %1$s', 'corporate-x' ) . '</span>', absint( $num_comments ) );
			}
		} else {
			echo esc_html__( 'Comment Closed', 'corporate-x' );
		}

	}

endif;
?>