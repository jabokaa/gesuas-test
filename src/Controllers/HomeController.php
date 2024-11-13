<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Requests\Request;

class HomeController extends Controller
{
    /**
     * Leva para a home
     * @param Request $request
     * @return array
     */
    public function home(Request $request)
    {
        return $this->render('home');
    }
}
