
<?php


function radio_sop()

{
    add_theme_support('title-tag');
}

add_action('setup', 'add_theme_support');

function linksradio_unsl_estilos()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('unsl_estilo-style', get_template_directory_uri() . "/style.css", array('unsl_estilo-flowbite'), $version, 'all');
    wp_enqueue_style('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css", array(), '1.8.0', 'all');
}

add_action('wp_enqueue_scripts', 'linksradio_unsl_estilos');


function linksradio_unsl_scripts()
{

    wp_enqueue_script('unsl_estilo-flowbite', "https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js", array(), '1.8.0', false);

    wp_enqueue_script('unsl_estilo-fontawesome', "https://kit.fontawesome.com/19e7896a5a.js", array(), '1.0', false);

    wp_enqueue_script('unsl_estilo-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js", array(), '3.6.4', false);
}

add_action('wp_enqueue_scripts', 'linksradio_unsl_scripts');



?>

<?php

function save_contact_form_message_as_comment()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $comment_data = array(
            'comment_post_ID' => 0, // Cambiar a la ID de la publicación o página deseada
            'comment_author' => $name,
            'comment_author_email' => $email,
            'comment_content' => $message,
            'comment_approved' => '0', // Comentario pendiente de aprobación
        );

        wp_insert_comment($comment_data);


    if(is_page_template('front-page.php')){
     echo"pagina principal";
    }else{
    echo"pagina contacto";
    }
}
}

add_action('init', 'save_contact_form_message_as_comment');

?>

<?php

/**
 * Numeric pagination via WP core function paginate_links().
 * @link http://codex.wordpress.org/Function_Reference/paginate_links
 *
 * @param array $args
 *
 * @return string HTML for numneric pagination
 */
function my_pagination($args = array())
{
    global $wp_query;
    $output = '';

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $pagination_args = array(
        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'total'        => $wp_query->max_num_pages,
        'current'      => max(1, get_query_var('paged')),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        //'prev_text'    => __( '&laquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &raquo;', 'text-domain' ),
        //'prev_text'    => __( '&lsaquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &rsaquo;', 'text-domain' ),
        'prev_text'    => sprintf(
            '<i></i> %1$s',
            apply_filters(
                'my_pagination_page_numbers_previous_text',
                __('Newer Posts', 'text-domain')
            )
        ),
        'next_text'    => sprintf(
            '%1$s <i></i>',
            apply_filters(
                'my_pagination_page_numbers_next_text',
                __('Older Posts', 'text-domain')
            )
        ),
        'add_args'     => false,
        'add_fragment' => '',

        // Custom arguments not part of WP core:
        'show_page_position' => false, // Optionally allows the "Page X of XX" HTML to be displayed.
    );

    $pagination_args = apply_filters('my_pagination_args', array_merge($pagination_args, $args), $pagination_args);

    $output .= paginate_links($pagination_args);

    // Optionally, show Page X of XX.
    if (true == $pagination_args['show_page_position'] && $wp_query->max_num_pages > 0) {
        $output .= '<span class="page-of-pages">' .
            sprintf(__('Page %1s of %2s', 'text-domain'), $pagination_args['current'], $wp_query->max_num_pages) .
            '</span>';
    }

    return $output;
}

/**
 * Modify the main query on the posts index or category 
 * page. Set posts per page to 2.
 *
 * @param object $query
 */
function wpse_modify_home_category_query($query)
{

    // Only apply to the main loop on the frontend.
    if (is_admin() || !$query->is_main_query()) {
        return false;
    }

    // Check we're on a posts or category page.
    if ($query->is_home() || $query->is_category()) {
        $query->set('posts_per_page', 2);
    }
}
add_action('pre_get_posts', 'wpse_modify_home_category_query');




?>

<?php

function custom_comment_callback($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment">
            <header class="comment-meta flex gap-5 py-3 mx-3">

            <?php echo get_avatar($comment, 60, '', 'Avatar del usuario', array('class' => 'comment-avatar')); ?>
<div>
                <cite class="font-bold comment-author" ><?php comment_author(); ?></cite>
                <time class="comment-time" style="color:#535353;"><?php comment_date(); ?></time>
                <div class="comment-content">
                <?php comment_text(); ?>
            </div>
                </div>
            </header>
        
      

        </article>
        <style>
            .comment-avatar{
                border-radius:50%;
            }
                .comment-author {
    font-style: normal; 
}
        </style>
    <?php
}

?>
