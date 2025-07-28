<?php

namespace App\Controllers;

use FireUp\Application;
use FireUp\Http\Request;

class WelcomeController
{
    /**
     * The application instance.
     *
     * @var Application
     */
    protected $app;

    /**
     * Create a new controller instance.
     *
     * @param  Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Display the welcome page.
     *
     * @param  Request  $request
     * @return string
     */
    public function index(Request $request)
    {
        // Load the welcome view
        ob_start();
        include __DIR__ . '/../../view/welcome.php';
        return ob_get_clean();
    }
} 