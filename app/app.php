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
        return $app['twig']->render('home.html.twig', array('contacts' => Contact::getContacts()));
    });
    $app->post("/create_contact", function() use ($app) {
        $contact = new Contact($_POST['fullName'], $_POST['phoneNumber'], $_POST['fullAddress']);
        $contact->saveContact();
        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
    });
    $app->post("/delete_contacts", function() use ($app) {
            Contact::deleteContacts();
            return $app['twig']->render('clear_contacts.html.twig');
    });

    return $app;
?>
