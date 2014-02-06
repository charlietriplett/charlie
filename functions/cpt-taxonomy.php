<? // Create an author assignment each time a new person is created

function create_author_archive() {

	$post_type = get_post_type( $post_id );
    if( 'person' == $post_type ){
        // do something
		
		$title = get_the_title($post_id);
		$the_id = get_the_ID();
		
		wp_insert_term(
			$title,
			'author_archive',
			array(
			  'slug'	=> $the_id // by putting the person ID in the slug, we can now reference it in queries
			)
		);

	} // end if person = post_type


} // end create_author_assignment 

add_action( 'new_to_publish', 'create_author_archive' );
add_action( 'future_to_publish', 'create_author_archive' );
add_action( 'draft_to_publish', 'create_author_archive' );
add_action( 'pending_to_publish', 'create_author_archive' );

?>