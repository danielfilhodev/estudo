<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Controller\Pages\Page;
use \App\Model\Entity\Organization;

class Home extends Page{

    /**
     * Método responsável por retornar o conteúdo view da home
     * @return string
     */
    public static function getHome(){
        // ORGANIZAÇÃO
        $obOrganization = new Organization;
        // VIEW DA HOME
        $content = View::render('\site\home',[
            'name' => $obOrganization->name,
            'description' => $obOrganization->description
        ]);      

        // VIEW DA PÁGINA TEMPLATE
        return parent::getMain('Home',$content);
    }


}
