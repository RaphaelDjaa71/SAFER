<?php

namespace App\Classe;

use App\Entity\Category;

class Search
{
    /*class search permet de representer notre recherche de biens sous formes d'objets qui permettra de cree un formulaire SearchType.php et de 
    lier ce formulaire dans la fonction configureOptions en data class a ma class Search  */
    /**
     * @var string
     */
    public $string = '';
    /**
     * Summary of 
     * @var Category
     */
    public $Categories = [];
}
