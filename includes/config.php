<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start(); //starts output buffering 

define('DEBUG',true); #we want to see all errors

include 'credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'sprock2';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF


//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Sprockets';


switch(THIS_PAGE){
    case 'contact.php':
        $config->title = 'Contact Us';
    break;
        
    case 'appointment.php':
        $config->title = 'Schedule An Appointment';
        $config->banner = 'Das Sprokits';
    break;
        
    case 'index.php':
        $config->title = 'Home Page';
    break;
        
    case 'customers.php':
        $config->title = 'A Customer List';
    break;
    
    case 'game_library.php':
        $config->title = 'PS4 Games';
    break;
    
    case 'game_view.php':
        $config->title = 'PS4 Game Details';
    break;
        
    case 'daily.php':
        $config->title = 'Daily Specials';
    break;
        
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF


?>