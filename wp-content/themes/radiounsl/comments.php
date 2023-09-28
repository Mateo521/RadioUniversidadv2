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



<!-- SECCION FORMULARIO -->
<!--  
<h1 class="my-6 md:text-4xl text-2xl font-bold text-center" style="color:#07376A;">Dejanos un mensaje</h1>
<div class="flex justify-center">

    <div style="max-width: 640px;width: 100%;">

        <form class="p-6" method="post" action="">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu nombre" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail</label>
                <input name="email" type="email" id="mail" placeholder="Tu mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="mensaje" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                <textarea name="message" placeholder="Tu mensaje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required style="padding: 5px 5px 45px 5px;"></textarea>
            </div>
            <button name="contact_form_submit" style="position: relative; left: 50%; transform: translateX(-50%); background-color: #07376A; margin: 50px 0 100px 0;" type="submit" class=" text-white text-center  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">Enviar
                mensaje</button>
        </form>
    </div>
</div>
-->
<!-- FINSECCION FORMULARIO -->

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