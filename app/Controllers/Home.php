<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function discount()
    {
           echo view('header');
    echo view('menu');
        echo view('discount');
    echo view('footer');
    }
}
