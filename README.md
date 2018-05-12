# PHP-Graphic
This is a package to create dynamic graphics in php. Simple and easy to use.


```php

<?php

  $graph = new \K7Graphic\Base\K7Graphic([1, 10, 20, 40, 60, 80, 100, 100, 56,34,12,98,5,43, 200, 54, 238, 76,23,98,54,65,78,160, 1, 10, 20, 40, 60, 80, 100, 100,]);
  $graph->create('graphicBar.jpg', 1000, 600)->addValue('bar');
  $graph->create('graphicLine.jpg', 1000, 600)->addValue('line');

  ?>
  ```

Methods
string
int
int
create($imageName, $width, $height )

Methods
string (bar or line)
addValue($type )
