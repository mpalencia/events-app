<?php

if (!function_exists('objectToObject')) {
    /**
     * Convert object to another object
     *
     * @param $instance
     * @param string $className
     * @return mixed
     *
     * https://stackoverflow.com/questions/3243900/convert-cast-an-stdclass-object-to-another-class
     */
    function objectToObject($instance, string $className)
    {
        return unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(strstr(serialize($instance), '"'), ':')
        ));
    }
}
