<?php
/**
 * KNUT7 K7F (http://framework.artphoweb.com/)
 * KNUT7 K7F (tm) : Rapid Development Framework (http://framework.artphoweb.com/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link      http://github.com/zebedeu/artphoweb for the canonical source repository
 * @copyright (c) 2015.  KNUT7  Software Technologies AO Inc. (http://www.artphoweb.com)
 * @license   http://framework.artphoweb.com/license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 * @version   1.0.0
 */


namespace K7Graphic\Base;


use Ballybran\Exception\ClassNotFoundException;
use K7Graphic\Factory\BarGraphic;
use K7Graphic\Factory\GraphValues;
use K7Graphic\Factory\GraphicFactory;
use K7Graphic\Factory\LineGraphic;
use Ballybran\Exception\Exception;

class K7Graphic
{


    private $imgHeight;
    private $imgWidth;
    private $graphValues= array();
    private $filename;


    function __construct(array $value)
    {
        $this->graphValues = $value;
    }


    /**
     * @return mixed
     */
    public function getImgHeight()
    {
        return $this->imgHeight;
    }

    /**
     * @param mixed $imgHeight
     */
    private function setImgHeight($imgHeight)
    {
        $this->imgHeight = $imgHeight;
    }

    /**
     * @return mixed
     */
    public function getImgWidth()
    {
        return $this->imgWidth;
    }

    /**
     * @param mixed $imgWidth
     */
    private function setImgWidth($imgWidth)
    {
        $this->imgWidth = $imgWidth;
    }


    public function create($filename, $with, $height)
    {
        $this->setImgWidth($with);
        $this->setImgHeight($height);
        $this->filename = $filename;

        return $this;

    }

    
    public function addValue($typeOfTheGraphic)
    {

        $image = imagecreate($this->getImgWidth()* (count($this->graphValues) / 39 ), $this->getImgHeight());
        $colorWhite = imagecolorallocate($image, 255, 255, 255);
        $colorGrey = imagecolorallocate($image, 192, 192, 192);
        $colorBlue = imagecolorallocate($image, 0, 0, 255);
        $red = imagecolorallocate($image, 0xFF, 0x00, 0x00);


        imageline($image, 0, 0, 0, 250, $colorGrey);
        imageline($image, 0, 0, 250, 0, $colorGrey);
        imageline($image, 249, 0, 249, 249, $colorGrey);
        imageline($image, 0, 249, 249, 249, $colorGrey);

        $data = count($this->graphValues);
        for ($i = 1; $i < $data + 1; $i++) {
            // y
            imageline($image, $i * 25, 0, $i * 25, 250, $colorGrey);
            // x
            imageline($image, 1, $i * 25, $data * 25, $i * 25, $colorBlue);

        }

        if("line" == $typeOfTheGraphic) {
            $line = new GraphicFactory();
            $line->create( new LineGraphic($this->graphValues, $this->getImgWidth(), $this->getImgHeight(), $image, $colorBlue, $red));
            $this->output($image);
        }
        if("bar" == $typeOfTheGraphic ) {
            $bar = new GraphicFactory();
            $bar->create( new BarGraphic($this->graphValues, $this->getImgWidth(), $this->getImgHeight(), $image, $colorBlue, $red));
            $this->output($image);
        }

        return $this;
    }

    private function output($image)
    {
        imagepng($image, $this->filename);
        imagedestroy($image);


    }
}