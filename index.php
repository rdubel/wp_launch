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
        <h4>Newsletter</h4>
        <form method="post">
            <input type="mail" name="mail" placeholder="enter your email">
            <button type="submit">ok</button>
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


    <?php get_footer(); ?>
</main>
