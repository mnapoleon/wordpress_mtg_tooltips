<?php



function pw_bbp_shortcodes( $content, $reply_id ) {
	
	$reply_author = bbp_get_reply_author_id( $reply_id );

	if( user_can( $reply_author, pw_bbp_parse_capability() ) )
		return do_shortcode( $content );

	return $content;
}
add_filter('bbp_get_reply_content', 'pw_bbp_shortcodes', 10, 2);
add_filter('bbp_get_topic_content', 'pw_bbp_shortcodes', 10, 2);

function pw_bbp_parse_capability() {
	return apply_filters( 'pw_bbp_parse_shortcodes_cap', 'publish_forums' );
}