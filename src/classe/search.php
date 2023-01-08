<?php

namespace App\classe;

use App\Entity\Categorie;
use App\Entity\Type;

class search
{
    /**
     * @var $string
     */
    public $string = '';

    /**
     * @var Categorie[]
     */
    public $categories = [];

    /**
     * @var Type[]
     */
    public $types = [];
}
