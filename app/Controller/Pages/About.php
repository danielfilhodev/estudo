<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Controller\Pages\Page;
use \App\Model\Entity\Organization;

class About extends Page{

    /**
     * Método responsável por retornar o conteúdo view da home
     * @return string
     */
    public static function getAbout(){
        // MODEL ORGANIZAÇÃO
        $obOrganization = new Organization;
        // VIEW DA ABOUT
        $content = View::render('\site\about',[
            'name' => $obOrganization->name,
            'description' => $obOrganization->description
        ]);      

        // VIEW DA PÁGINA TEMPLATE
        return parent::getMain('Sobre',$content);
    }


}
