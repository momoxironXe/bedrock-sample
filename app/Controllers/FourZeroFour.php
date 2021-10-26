<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FourZeroFour extends Controller
{
    
    /**
     * Dedicated 404 Controller
     *
     * @var string
     */
    protected $template = '404';
    
    /**
     * ACF Field Values
     *
     * @var string[]
     */
    protected $acf = [];
}
