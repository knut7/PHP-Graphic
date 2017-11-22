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


namespace K7Graphic\Graphic;


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

    public function create($filename, $with, $height)
    {
        $this->imgWidth = $with;
        $this->imgHeight = $height;
        $this->filename = $filename;
        $this->addValue();

    }

    public function addValue()
    {

        $image = imagecreate($this->imgWidth, $this->imgHeight);
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
        $this->graphicLine($image, $colorBlue);
        $this->graphicBar($image, $colorBlue);
        $this->output($image);
    }

    private function graphicLine($image, $colorBlue)
    {
        for ($i = 0; $i < 10; $i++) {
            $d = rand(0, 100);
            imageline($image, $i * $d, (250 - $this->graphValues[$i]), ($i + $d) * 25, (250 - $this->graphValues[$i + 1]), $colorBlue);
        }
    }

    private function graphicBar($image, $colorBlue)
    {
        for ($i = 0; $i < 10; $i++) {

            imagefilledrectangle($image, $i*25, (250-$this->graphValues[$i]), ($i+1)*25, 250, $colorBlue);
            imagefilledrectangle($image, ($i*25)+1, (250-$this->graphValues[$i])+1, (($i+1)*25)-5, 248, $colorBlue);
        }
    }



    private function output($image)
    {
        header("Content-type: image/png");
        imagepng($image, $this->filename);
        imagedestroy($image);


    }
}