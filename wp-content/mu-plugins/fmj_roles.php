<?php

function register_role_cap(){
	add_role('Event Planner', 'Event Planner', [
        'read' => true,
        'edit_events' => true,
        'publish_events' => true,
        'delete_events' => true,
        
	]);
	add_role('Campus Manager', 'Campus Manger', [
        'read' => true,
        'edit_campuses' => true,
        'publish_campuses' => true,
        'delete_campuses' => true,
	]);
	
}

add_action('init', 'register_role_cap');