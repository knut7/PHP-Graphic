<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 22/11/17
 * Time: 19:43
 */

namespace K7Graphic\Factory;


class LineGraphic implements GraphicInterface
{

    private $imgHeight;
    private $imgWidth;
    private $graphValues = array(0, 80, 23, 11, 190, 245, 50, 80, 111, 240, 55);
    /**
     * @var
     */
    private $image;
    /**
     * @var
     */
    private $colorBlue;

    public function __construct($imgWidth, $imgHeight, $image, $colorBlue)
    {

        $this->imgWidth = $imgWidth;
        $this->imgHeight = $imgHeight;
        $this->image = $image;
        $this->colorBlue = $colorBlue;
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
        for ($i = 0; $i < 10; $i++) {
            imageline($this->image, $i * 25, ($this->getImgWidth() - $this->graphValues[$i]), ($i + 1) * 25, ($this->getImgHeight() - $this->graphValues[$i + 1]), $this->colorBlue);
        }
    }
}