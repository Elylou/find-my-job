<?php

get_header();
pageBanner(array(
  'title' => 'Tous les événements',
  'subtitle' => 'Nos plus beaux événements avec nous'
));
 ?>

<div class="container container--narrow page-section">
<?php
  
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content-event');
   }
  echo paginate_links();
?>

<hr class="section-break">

<p>Regarder les événements passés <a href="<?php echo site_url('/past-events') ?>"> Voir ici !</a>.</p>

</div>

<?php get_footer();

?>