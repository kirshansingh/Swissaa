<?php

// Current year shortcode
function current_year_shortcode() {
    return date('Y');
}
add_shortcode( 'current_year', 'current_year_shortcode' );

// Copyright year shortcode
function copyright_year_shortcode() {
    $development_date = '2020';
    if($development_date == date('Y')) {
        return $development_date;
    }
    else {
        return $development_date . ' - ' . date('Y');
    }
}
add_shortcode( 'copyright_year', 'copyright_year_shortcode' );

// Button shortcode
function button_shortcode($atts, $content=null, $code="") {
    $a = shortcode_atts( array(
        'url' => '#',
        'class' => '',
    ), $atts );
    return '<p><a class="btn ' . $a['class'] . '" href="' . $a['url'] . '">' . $content . '</a></p>';
}
add_shortcode( 'button', 'button_shortcode' );
