<?php
function headless_shortcode( $atts , $content = null ) {
	// Attributes
	$args = shortcode_atts( array(
        "link" => "",
        "target" => "_self",
        "rel" => "",
        "class" => "",
    ), $atts );

    return '<a href="' . $args['link'] . '" target="' . $args['target'] . '" rel="' . $args['rel'] . '" class="btn ' . $args['class'] . '">' . $content . '</a>';

}
add_shortcode( "headless", "headless_shortcode" );
add_filter("acf/format_value/type=textarea", "do_shortcode");
?>