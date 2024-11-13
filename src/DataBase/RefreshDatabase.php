<?php

namespace Gesuas\Test\DataBase;


trait RefreshDatabase
{

    /**
     * Atualiza o banco de dados de teste
     * @return void
     */
    public function refresh(): void
    {
        $migrate = new Migrate();
        $migrate->down();
        $migrate->up();
    }
}