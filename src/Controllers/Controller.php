<?php

namespace Gesuas\Test\Controllers;

use Gesuas\Test\Models\citizen;
use PDO;

class Controller
{
    public function render($view, $params = [])
    {
        $content = $this->getContent($view, $params);
        echo $this->getLayout($content);
    }

    protected function getContent($view, $params)
    {
        // ob_start inicia o buffer
        ob_start();
        // extract transforma o array em variaveis
        extract($params);
        require __DIR__ . "/../../views/{$view}.php";
        // ob_get_clean pega o conteudo do buffer e limpa ele
        return ob_get_clean();
    }

    protected function getLayout($content)
    {
        // ob_start inicia o buffer
        ob_start();
        // require do layout
        require __DIR__ . "/../../views/layout/main.php";
        // ob_get_clean pega o conteudo do buffer e limpa ele
        return ob_get_clean();
    }
}
