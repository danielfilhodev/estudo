<?php

namespace App\Utils;

class View{

    /**
     * Variaves padrões da view
     * @var array
     */
    private static $vars = [];
    /**
     * Método responsável por definir os dados iniciais da classe
     * @param array $vars
     */
    public static function init($vars = []){
        self::$vars = $vars;        
    }

    /**
     * Método reponsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        // ARQUIVO COM O NOME DA VIEW
        $file = __DIR__ . '/../../resources/view' . $view . '.html';
        return file_exists($file) ? file_get_contents($file) : 'View não foi criada/encontrada';
    }

    /**
     * Método responsável por retornar o conteúdo renderizado passando as variáveis para uma view
     * @param string $view
     * @param array $vars {string/numeric}
     * @return string
     */
    public static function render($view, $vars = []){
        // CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);

        // MERGE DE VARIAVEIS DA VIEW
        $vars = array_merge(self::$vars, $vars);

        // CHAVES DO ARRAY DE VARIAVEIS
        $keys = array_keys($vars);       
        
        // ADICIONA O DOUBLE MUSTACHE NAS VARIÁVEIS
        $keys = array_map(function ($item) {
            return '{{'.$item.'}}';
        },$keys);

        $values = array_values($vars);

        // RETORNA O CONTEÚDO RENDERIZADO
        return str_replace($keys,$values,$contentView); 
    }
}
