<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 22/11/17
 * Time: 19:36
 */

namespace K7Graphic\Factory;


abstract class Creator
{


    abstract function makeGraphic(GraphicInterface $graphic);

    public function create($graphic)
    {
        $graph = $this->makeGraphic($graphic);
         return $graph;
    }

}