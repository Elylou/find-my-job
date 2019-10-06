<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
     ?>

    <div class="container container--narrow page-section">
          <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> News</a> <span class="metabox__main"> Publier par <?php the_author_posts_link(); ?> le <?php the_time('n.j.y'); ?> dans <?php echo get_the_category_list(', '); ?></span></p>
      </div>

      <div class="generic-content"><?php the_content(); ?></div>


<br> <br>
     <p> &#8592; <?php next_post_link('<strong>%link</strong>'); ?><em class="previous"><?php previous_post_link('<strong>%link</strong>'); ?> &#8594;</em></p>

    </div>
    


  <?php }

  get_footer();?>