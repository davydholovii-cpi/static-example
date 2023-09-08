<?php

namespace ChargePoint\StaticExample;

class FeatureLib
{

    protected static function isTheCoolThingEnabled()
    {
        return true;
    }

    public static function __callStatic($name, $arguments)
    {
        if (sizeof($arguments) == 1) {
            return $arguments[0];
        }

        return self::$name();
    }
}
