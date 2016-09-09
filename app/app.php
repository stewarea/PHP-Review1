<?php
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/address.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app){
        return $app['twig']->render('home.html.twig', array('address' => Contact::getContact()));
    });
    $app->post("/new_contact", function() use ($app) {
        $contact = new Contact($_POST['fullName'], $_POST['phone_number'], $_POST['fullAddress']);
        $contact->saveContact();
        return $app['twig']->render('new_contact.html.twig', array('new_contact' => $contact));
    });
    $app->post("/clear_contacts", function() use ($app) {
            Contact::deleteContacts();
            return $app['twig']->render('jobs.html.twig');
    });

    return $app;
?>
