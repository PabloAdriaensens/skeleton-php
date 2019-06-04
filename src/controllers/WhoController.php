<?php
/* porque esta dentro de una carpeta de app */
namespace App\controllers;
use App\ViewManager;

class WhoController
{
    public function index() {
        $viewManager = new ViewManager();
        $viewManager->renderTemplate("who.view.html");
    }
}