<?php

namespace App\Utils;

class View{

    /**
     * Método reponsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        // ARQUIVO COM O NOME DA VIEW
        $file = __DIR__ . '/../../resources/view' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo renderizado passando as variáveis para uma view
     * @param string $view
     * @return string
     */
    public static function render($view){
        // CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        // RETORNA O CONTEÚDO RENDERIZADO
        return $contentView; 
    }
}
