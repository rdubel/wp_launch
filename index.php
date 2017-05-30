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
                echo '<p>01/06/2017</p>';
            }
        ?>
    </article>

    <?php get_footer(); ?>
</main>
