<?php get_header(); ?>

<main>
    <article class="">
        <?php
            $posts = get_posts( array(
                'category' => 2
            ));
            foreach ($posts as $post) {
                echo '<h1>'.$post->post_title.'</h1>';
                echo '<p>'.$post->post_content.'</p>';
                echo '<p>'.get_post_custom_values('release_date', $post->ID)[0].'</p>';
            }
        ?>
    </article>
    <section>
        <h4>Soyez averti dès la sortie :</h4>
        <form method="post">
            <input type="mail" name="mail" placeholder="Votre email">
            <button type="submit">Ok</button>
        </form>
        <?php
            if(isset($_POST['mail'])){
                $_POST['mail'];
                $wpdb->insert( 'mails', array(
                    'mail' => $_POST['mail'],
                ));
            }
        ?>
    </section>
</main>

<?php get_footer(); ?>
