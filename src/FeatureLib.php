<?php

namespace ChargePoint\StaticExample;

class FeatureLib
{

    protected static function isTheCoolThingEnabled()
    {
        return true;
    }

    protected static function isJsonExportEnabled()
    {
        return defined('JSON_EXPORT_ENABLED') && JSON_EXPORT_ENABLED;
    }

    public static function __callStatic($name, $arguments)
    {
        if (sizeof($arguments) == 1) {
            return $arguments[0];
        }

        return self::$name();
    }
}
