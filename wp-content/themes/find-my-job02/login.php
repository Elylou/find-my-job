<?php 
acf_enqueue_scripts();
get_header();
?>
<?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <div class="col-md-4">
            <div class="h-100 bg-light">
                <div class="card-body">
                    <?php if(!get_query_var('hwk_page_lost_password')): ?>
                        <h2 class="mt-1">Connexion</h3>
                        <?php acf_form('hwk_ajax_acf_login'); ?>
                    <?php else: ?>
                        <h2 class="mt-1">Mot de passe perdu</h3>
                        <?php acf_form('hwk_ajax_acf_lost_password'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h2>Créer un compte</h3>
            <?php acf_form('hwk_ajax_acf_register'); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>