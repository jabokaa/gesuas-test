<?php

namespace Gesuas\Test\DataBase;


trait RefreshDatabase
{

    public function refresh()
    {
        $migrate = new Migrate();
        $migrate->down();
        $migrate->up();
    }
}