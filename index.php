<?php get_header(); ?>

<main>
    <article class="">
        <?php
            $posts = get_posts( array(
                'category' => 2
            ));
            $post = $posts[0];
            echo '<h1>'.$post->post_title.'</h1>';
            echo get_the_post_thumbnail($post->ID);
            echo '<p>'.$post->post_content.'</p>';
            echo '<p>'.get_post_custom_values('release_date', $post->ID)[0].'</p>';
        ?>
    </article>
    <section>
        <h4>Soyez averti dès la sortie :</h4>
        <form method="post">
            <input type="text" name="name" placeholder="votre nom">
            <input type="mail" name="mail" placeholder="Votre email">
            <label for="mailformat">Format des mails :</label>
            <select id="mailformat" name="mailformat">
                <option value="html">HTML</option>
                <option value="text">Text</option>
            </select>
            <button type="submit">Ok</button>
        </form>
        <?php
            if(isset($_POST['mail'], $_POST['name'], $_POST['mailformat']) && $_POST['mail'] != '' && $_POST['name'] != '') {

                $html = ($_POST['mailformat'] == 'html') ? 1 : 0;

                $query = $wpdb->insert( 'mails', array(
                    'mail' => $_POST['mail'],
                    'name' => $_POST['name'],
                    'html_mail' => $html
                ));

                if ($query) {
                    echo '<p>'.get_post_custom_values('success_message', $post->ID)[0].'</p>';
                } else {
                    echo '<p>'.get_post_custom_values('error_message', $post->ID)[0].'</p>';
                }

            }
        ?>
    </section>
</main>

<?php get_footer(); ?>
