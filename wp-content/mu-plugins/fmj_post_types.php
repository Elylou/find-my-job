<?php

function fmj_post_types(){
     //campus post type
     register_post_type ('campus', array(
        'capability-type' => 'campus',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array ('slug' => 'campuses'),
        'has_archive'=> true,
        'public' => true,
        'labels' => array(
         'name' => 'Centres de formation',
         'add_new_item' => 'Ajouter un centre de formation',
         'edit_item' => 'Editer un Centre de formation',
         'all_items' => 'Tous les Centres de formation',
        'singular_name' => 'Centre de formation',
        ),
        'menu_icon' => 'dashicons-location-alt'   
    ));
    //Event Post Type
    register_post_type ('event', array(
        'show_in_rest' => true,
        'capability-type' => 'event',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array ('slug' => 'events'),
        'has_archive'=> true,
        'public' => true,
        'labels' => array(
         'name' => 'Evénements',
         'add_new_item' => 'Ajouter un Evénement',
         'edit_item' => 'Editer un Evénement',
         'all_items' => 'Tous les Evénements',
        'singular_name' => 'Evénement',
        ),
        'menu_icon' => 'dashicons-calendar'   
    ));
    //Program post type
    register_post_type ('program', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'rewrite' => array ('slug' => 'programs'),
        'has_archive'=> true,
        'public' => true,
        'labels' => array(
         'name' => 'Formation',
         'add_new_item' => 'Ajouter une formation',
         'edit_item' => 'Editer une formation',
         'all_items' => 'Toutes les formations',
        'singular_name' => 'Formation',
        ),
        'menu_icon' => 'dashicons-awards'   
    ));

        //Professor post type
        register_post_type ('professor', array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'public' => true,
            'labels' => array(
             'name' => 'Professeurs',
             'add_new_item' => 'Ajouter un professeur',
             'edit_item' => 'Editer un professeur',
             'all_items' => 'Tous les professeurs',
            'singular_name' => 'professeur',
            ),
            'menu_icon' => 'dashicons-welcome-learn-more'   
        ));

        //Note Post Type
        register_post_type ('note', array(
            'capability_type' => 'note',
            'map_meta_cap' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor'),
            'public' => false, // privat
            'show_ui' => true, //show in admin dashboard
            'labels' => array(
             'name' => 'Notes',
             'add_new_item' => 'Ajouter une note',
             'edit_item' => 'Editer une note',
             'all_items' => 'Toutes les notes',
            'singular_name' => 'Note',
            ),
            'menu_icon' => 'dashicons-welcome-write-blog'   
        ));

         //Like Post Type
         register_post_type ('like', array(
            'supports' => array('title'),
            'public' => true,
            'show_ui' => true, //show in admin dashboard
            'labels' => array(
             'name' => 'J\'aimes',
             'add_new_item' => 'Ajouter un j\'aime',
             'edit_item' => 'Editer un j\'aime',
             'all_items' => 'Tous les j\'aimes',
            'singular_name' => 'J\aime',
            ),
            'menu_icon' => 'dashicons-heart'
        ));
}
add_action ('init', 'fmj_post_types');