<?php

namespace Gesuas\Test\Controllers;

class Controller
{

    
    /**
     * Renderiza a view
     * @param string $view uri da view
     * @param array $params
     * @return array
     */
    public function render(string $view, array $params = []): array
    {
        // verifica se esta executando teste unitario
        if (defined('PHPUNIT_RUNNING')) {
            return $params;
        }
        $content = $this->getContent($view, $params);
        if ($view === 'error') {
            echo $this->getLayout($content, 'error_main');
            return $params;
        }
        echo $this->getLayout($content);
        return $params;
    }

    /**
     * Pega o conteudo da view
     * @param string $view uri da view
     * @param array $params
     * @return string
     */
    protected function getContent(string|bool $view, $params): string|bool
    {
        // ob_start inicia o buffer
        ob_start();
        // extract transforma o array em variaveis
        extract($params);
        require __DIR__ . DIRECTORY_SEPARATOR . "..".DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."views".DIRECTORY_SEPARATOR ."{$view}.php";
        // ob_get_clean pega o conteudo do buffer e limpa ele
        return ob_get_clean();
    }

    /**
     * Pega o layout
     * @param string $content
     * @return string
     */
    protected function getLayout(string $content, $main = 'main'): string
    {
        // ob_start inicia o buffer
        ob_start();
        // require do layout
        require __DIR__ . DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."..".DIRECTORY_SEPARATOR ."views".DIRECTORY_SEPARATOR ."layout".DIRECTORY_SEPARATOR ."{$main}.php";
        // ob_get_clean pega o conteudo do buffer e limpa ele
        return ob_get_clean();
    }
}
