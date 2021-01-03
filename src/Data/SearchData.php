<?php

namespace App\Data;

use App\Entity\TypeRecipe;
use App\Entity\Difficulty;
use App\Entity\Cost;
use App\Entity\Particularity;

class SearchData 
{
    /**
     * @var string
     */
    public $q = '';

    /**
     * @var TypeRecipe[]
     */
    public $typeRecipe = [];

    /**
     * @var Difficulty[]
     */
    public $difficulty = [];

    /**
     * @var Cost[]
     */
    public $cost = [];

    /**
     * @var Particularity[]
     */
    public $particularity = [];

}