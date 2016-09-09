<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/address.php";

    session_start();

    if (empty($_SESSION['list_of_addresses'])) {
        $_SESSION['list_of_addresses'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        return $app['twig']->render('home.html.twig', array('address' => Contact::getAddress()));
    });
    $app->post("/new_contact", function() use ($app){
        return $app['twig']->render('new_contact.html.twig', array('address' => Contact::getAddress()));
    });

    return $app;
?>
