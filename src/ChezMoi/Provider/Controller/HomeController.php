<?php

namespace ChezMoi\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController implements ControllerProviderInterface {

    public function connect(Application $app) {
        $controllers = $app['controllers_factory'];

        // Bind sub-routes
        $controllers->match('/', array($this, 'home'))->method('GET')->bind('home');
        return $controllers;
    }

    public function home(Application $app) {
      $occupied = rand(0, 3);
      $data = array(
        'name' => 'Pj\'s awesome parking!',
        'address' => 'Maria-Hendrikaplein 1',
        'city' => '9000 Gent',
        'telephone' => '0498/ 76 43 21',
        'description' => 'This is Pj\'s awesome parking space!',
        'maxSpace' => 3,
        'occupied' => $occupied,
        'longitude' => 51,
        'latitude' => 15
      );

      return $app['twig']->render('static/layout.twig', array(
        'data' => $data
      ));
    }

}
