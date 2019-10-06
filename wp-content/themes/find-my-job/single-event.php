<?php
  
  get_header();
  while(have_posts()) {
    the_post();
    pageBanner();
     ?>

    <div class="container container--narrow page-section">
          <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Evénements</a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>
      <div> 
      <hr>
        <p> <strong>Date de l'événement:</strong>  <?php display_french_date(get_field('event_date', $p->ID)); ?> </p>
        <p> <strong>Debut de l’événement:</strong> <?php display_french_date(get_field('debut', $p->ID)); ?> à <?php display_time(get_field('debut', $p->ID)); ?></p>
        <p> <strong>Fin de l’événement: </strong>  <?php display_french_date(get_field('fin', $p->ID)); ?> à <?php display_time(get_field('fin', $p->ID)); ?></p>

        <hr>
      </div>
      <div class="generic-content"><?php the_content(); ?></div>

      <?php

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
          echo '<hr class="section-break">';
          echo '<h2 class="headline headline--medium">Programme</h2>';
          echo '<ul class="link-list min-list">';
          foreach($relatedPrograms as $formation) { ?>
            <li><a href="<?php echo get_the_permalink($formation); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php }
          echo '</ul>';
        }

      ?>

    </div>
    

    
  <?php } get_footer();?>