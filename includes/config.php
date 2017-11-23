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

//echo THIS_PAGE;

//echo basename($_SERVER['PHP_SELF']);
//die;
    



?>