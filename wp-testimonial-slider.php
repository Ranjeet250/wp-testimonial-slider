<?php
/**
 * Plugin Name: WP Testimonial Slider
 * Description: A simple WordPress plugin that displays testimonials in a slider.
 * Version: 1.0
 * Author: Ranjeet Yadav
 */

// Enqueue CSS & JS
function wp_testimonial_slider_enqueue_scripts() {
    wp_enqueue_style('testimonial-slider-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('testimonial-slider-script', plugin_dir_url(__FILE__) . 'slider.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'wp_testimonial_slider_enqueue_scripts');

// Register shortcode
function wp_testimonial_slider_shortcode() {
    $testimonials = array(
        array("text" => "This platform changed my life!", "author" => "Alice"),
        array("text" => "Excellent support and fast delivery!", "author" => "Bob"),
        array("text" => "Highly recommend to everyone.", "author" => "Charlie"),
    );

    $output = '<div class="testimonial-slider">';
    foreach ($testimonials as $t) {
        $output .= '<div class="testimonial">';
        $output .= '<p>"' . esc_html($t['text']) . '"</p>';
        $output .= '<div class="author">– ' . esc_html($t['author']) . '</div>';
        $output .= '</div>';
    }
    $output .= '</div>';

    return $output;
}
add_shortcode('testimonial_slider', 'wp_testimonial_slider_shortcode');
