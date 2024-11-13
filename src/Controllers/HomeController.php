<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Requests\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return $this->render('home');
    }
}
