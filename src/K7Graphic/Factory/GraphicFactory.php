<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 22/11/17
 * Time: 19:44
 */

namespace K7Graphic\Factory;


class GraphicFactory extends Creator
{

    private $grap;


    function makeGraphic(GraphicInterface $graphic)
    {

        $this->grap = $graphic;
        $this->grap->graphicLine();

    }
}