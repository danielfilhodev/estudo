<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Controller\Pages\Home;
use \App\Model\Entity\Organization;

class Page {

    private $title;
    
    public function __construct($title){
        $obOrganization = new Organization;
        $this->title = $obOrganization->title;
    }
    
    /**
     * Método responsável por retornar o conteúdo da view header
     * @return string
     */
    public static function getHeader(){
        // ORGANIZAÇÃO
        $obOrganization = new Organization;
        return View::render('\template\header',[
            'title' => $obOrganization->title,
            'name'  => $obOrganization->name
        ]);
    }
    
    /**
     * Método responsável por retornar o conteúdo da view footer
     * @return string
     */
    public static function getFooter(){
        return View::render('\template\footer');
    }
    
    /**
     * Método responsável por retornar o conteúdo da view template
     * @return string
     */
    public static function getMain($title,$content){
        // ORGANIZAÇÃO
        $obOrganization = new Organization;      

        return View::render('\template\main',[
                'title'     => $title,
                'header'    => self::getHeader(),
                'content'   => $content,
                'footer'    => self::getFooter()
        ]);
    }
    

}
