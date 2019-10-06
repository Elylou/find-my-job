<?php

  get_header();
  pageBanner (array(
    'title' => 'Bienvenue sur notre blog',
    'subtitle' => 'Découvrez nos plus belles news'
  ));?>


<div class="container container--narrow page-section">
<?php
  while(have_posts()) {
    the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="metabox">
        <p>Publié par <?php the_author_posts_link(); ?> le <?php the_time('l j F Y'); ?> dans <?php echo get_the_category_list(', '); ?></p>
      </div>


      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Lire la suite &raquo;</a></p>
      </div>

    </div>
  <?php }
  echo paginate_links();
?>
</div>

<?php get_footer();

?>

