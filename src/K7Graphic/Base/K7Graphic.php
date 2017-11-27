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


use K7Graphic\Factory\BarGraphic;
use K7Graphic\Factory\GraphicFactory;
use K7Graphic\Factory\LineGraphic;

class K7Graphic
{


    private $imgHeight;
    private $imgWidth;
    private $graphValues = array(0, 80, 23, 11, 190, 245, 50, 80, 111, 240, 55);
    private $filename;


    function __construct()
    {
        $this->graphValues;
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
    public function setImgHeight($imgHeight)
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
    public function setImgWidth($imgWidth)
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

    public function addValue($type)
    {

        $image = imagecreate($this->getImgWidth(), $this->getImgHeight());
        $colorWhite = imagecolorallocate($image, 255, 255, 255);
        $colorGrey = imagecolorallocate($image, 192, 192, 192);
        $colorBlue = imagecolorallocate($image, 0, 0, 255);

        imageline($image, 0, 0, 0, 250, $colorGrey);
        imageline($image, 0, 0, 250, 0, $colorGrey);
        imageline($image, 249, 0, 249, 249, $colorGrey);
        imageline($image, 0, 249, 249, 249, $colorGrey);


        for ($i = 1; $i < 11; $i++) {
            imageline($image, $i * 25, 0, $i * 25, 250, $colorGrey);
            imageline($image, 0, $i * 25, 250, $i * 25, $colorGrey);
        }

        if("line" == $type) {
            $bar = new GraphicFactory( );
            $bar->create( new LineGraphic($this->getImgWidth(), $this->getImgHeight(), $image, $colorBlue));
            $this->output($image);
        }
        if("bar" == $type) {
            $bar = new GraphicFactory( );
            $bar->create( new BarGraphic($this->getImgWidth(), $this->getImgHeight(), $image, $colorBlue));
            $this->output($image);
        }

        return $this;
    }





    private function output($image)
    {
        header("Content-type: image/png");
        imagepng($image, $this->filename);
        imagedestroy($image);


    }
}