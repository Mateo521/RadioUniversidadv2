<?php
if (post_password_required()) {
    return;
}
?>



    <?php if (have_comments()) : ?>


   

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link(__('Comentarios anteriores', 'textdomain')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Comentarios más recientes', 'textdomain')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Los comentarios están cerrados.', 'textdomain'); ?></p>
    <?php endif; ?>

    <?php $commenter = wp_get_current_commenter();
$comment_author = $commenter['comment_author'];
$comment_email = $commenter['comment_author_email'];
$comment_content = '';


// Definir los argumentos en variables
$comment_form_args = array(
    'fields' => array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Nombre', 'domain' ) . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="author" type="text" value="' . esc_attr( $comment_author ) . '" size="30"' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domain' ) . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="email" type="text" value="' . esc_attr( $comment_email ) . '" size="30"' . $aria_req . ' /></p>',
    ),
    'comment_field' => '<p class="comment-form-comment">' .
                       '<label for="comment">' . __( 'Comentario', 'domain' ) . '</label>' .
                       '<textarea id="comment" name="comment" cols="45" rows="1" aria-required="true" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required style="padding: 5px 5px 45px 5px;">' . esc_textarea( $comment_content ) . '</textarea>' .
                       '</p>',
                       'title_reply' => '',
    'label_submit' => 'Enviar comentario'
    // Otros argumentos según tus necesidades
);

// Mostrar el formulario de comentarios utilizando los argumentos
comment_form($comment_form_args);
?>
<h2 class="comments-title">
            <?php
            printf(
                _n('Un comentario en "%2$s"', '%1$s comentarios en "%2$s"', get_comments_number()),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>
<ol class="comment-list py-8">
            <?php wp_list_comments(array('callback' => 'custom_comment_callback')); ?>
        </ol>

        
<style>

    .submit{
     
        cursor:pointer;
color:white;
display:inline-flex;
border-radius:5px;
margin:10px 0;
        padding:5px 7px;
        background-color:#07376A;
    }


</style>