<?php get_header(); ?>
<main>
<?php $posts = get_posts( array(
    'category' => 2
) );
foreach ($posts as $post) { ?>
<h1><?php echo $post->post_title ?></h1>
<p><?php echo $post->post_content ?></p>
<p>01/06/2017</p>
<?php } ?>

<?php get_footer(); ?>
</main>
