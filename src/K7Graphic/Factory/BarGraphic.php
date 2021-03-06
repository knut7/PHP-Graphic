<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 22/11/17
 * Time: 19:43
 */

namespace K7Graphic\Factory;


class BarGraphic implements GraphicInterface
{

    private $imgHeight;
    private $imgWidth;
    private $graphValues;
    /**
     * @var
     */
    private $image;
    /**
     * @var
     */
    private $colorBlue;

    public function __construct($graphValues, $imgWidth, $imgHeight, $image, $colorBlue, $textColor)
    {

        $this->imgWidth = $imgWidth;
        $this->imgHeight = $imgHeight;
        $this->image = $image;
        $this->colorBlue = $colorBlue;
        $this->textColor = $textColor;
        $this->graphValues = $graphValues;
    }
    /**
     * @return mixed
     */
    public function getImgHeight()
    {
        return $this->imgHeight;
    }

    /**
     * @return mixed
     */
    public function getImgWidth()
    {
        return $this->imgWidth;
    }


    public function graphicLine()
    {
        for ($i = 0; $i < count($this->graphValues); $i++) {

            // imagefilledrectangle($this->image, $i*25, ($this->getImgWidth() -$this->graphValues[$i]), ($i+1)*25, $this->getImgHeight(), $this->colorBlue);
            imagefilledrectangle($this->image, ($i*25)+1, (250-$this->graphValues[$i])+1, (($i+1)*25)-5, 248, $this->colorBlue);
        }

        foreach ($this->graphValues as $i => $value) {

            imagettftext($this->image, 7, 1,  ($i*25)+1, (250-$this->graphValues[$i])+1, $this->textColor, 'Public/fonts/Arial.ttf', "$value %");

           
        }
    }
}