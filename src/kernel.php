<?php

namespace App;

class kernel
{
    public function __construct()
    {
        $logManager = new LogManager();
        $logManager->info("Arrancando la apliación");
        $viewManager = new ViewManager();
        $viewManager->renderTemplate("index.view.html");
    }
}
