<?php

add_shortcode('arkiv', 'webspeed_arkiv');
function webspeed_arkiv($atts) {
  global $post;
  ob_start();

  // define attributes and their defaults
  extract(shortcode_atts(array(
    'grid' => '1',
    'gap' => '1',
    'type' =>'',
    'class' => 'no-class',
    'number' => '999',
    'offset' => '0',
    'orderby' => 'date',
    'order' => 'DECS'
     ), $atts));


if (!empty($type)) {
    $loop = new WP_Query( array(
        'post_type' => 'webarkiv',
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => $number,
        'offset' => $offset,
        'tax_query' => array(
            array (
                'taxonomy' => 'webarkiv-type',
                'field' => 'slug',
                'terms' => $type,
            )
        ),
    ));
} else {
    $loop = new WP_Query( array(
        'post_type' => 'webarkiv',
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => $number,
        'offset' => $offset,
    ));
}

if( $grid == 2 ) {
    $grid_class = ' g-d-2 ';
} elseif ( $grid == 3) {
    $grid_class = ' g-d-3 ';
} elseif ( $grid == 4) {
    $grid_class = ' g-d-4 ';
}else {
    $grid_class = ' g-d-1 ';
}

if( $gap == 1 ) {
  $gap_class = 'gap-1 ';
  } elseif( $gap == 2 ) {
    $gap_class = 'gap-2 ';
    } elseif ( $gap == 3) {
        $gap_class = 'gap-3 ';
    } elseif ( $gap == 4) {
        $gap_class = 'gap-4 ';
    }else {
    $gap_class = 'no-gap ';
}

if ( $loop->have_posts() ) {

    if( class_exists('ACF') ) {
        echo '<ul class="arkiv grid ' .$class . $grid_class . $gap_class . '">';
            while ( $loop->have_posts() ) : $loop->the_post();

            $file = get_field('fil');

            // $icon = $file['icon'];
            $caption = $file['caption'];
            $title = $file['title'];

            echo '<li>';
                echo '<a href="' . $file['url'] . '" target="_blank" title="' . esc_attr($title) .'"">';
                    echo get_the_title();
                echo '</a>';
            echo '</li>';

            endwhile; wp_reset_query();
        echo '</ul>';
    } else {
        echo '<h3>ACF mangler at blive installeret!</h3>';
    }
}

    $myvariable = ob_get_clean();
        return $myvariable;
}