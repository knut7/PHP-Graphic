<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 22/11/17
 * Time: 20:46
 */

namespace K7Graphic\Base;


class RegistryGraphic extends \ArrayObject
{

    private static $instance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if( self::$instance == null ) {

            self::$instance = new static();
        }

        return self::$instance;
    }

    public function get($key) {

        $instance = self::getInstance();
        if( ! $instance->offsetExists($key) ) {

            throw new \RuntimeException( sprintf( "Class Factory %s Not Found" , $key ) );
        }
            return $instance->offsetGet($key);

    }

    public function set($key, $object) {
        $instance = self::getInstance();
        if( ! $instance->offsetExists($key)) {
            throw new \RuntimeException(sprintf("Class Factory %s Not Found", $key));

        }
        $instance->offsetSet($key, $object);


    }


}