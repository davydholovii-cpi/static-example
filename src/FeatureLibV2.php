<?php

namespace ChargePoint\StaticExample;

class FeatureLibV2
{
    protected static array $mockedResults = [];

    protected static function isJsonExportEnabled()
    {
        return defined('JSON_EXPORT_ENABLED') && JSON_EXPORT_ENABLED;
    }

    public static function __callStatic($name, $arguments)
    {
        if (str_starts_with($name, 'mock')) {
            return self::mockResult($name, $arguments[0]);
        }

        if (!method_exists(self::class, $name)) {
            throw new \Exception('Method ' . $name . ' does not exist');
        }

        return self::$mockedResults[$name] ?? self::$name(...$arguments);
    }

    private static function mockResult(string $mockMethod, $result)
    {
        // remove prefix 'mock' from the method name
        $methodName = str_replace('mock', '', $mockMethod);
        // method must start with uppercase (risky but that's common practice)
        $methodName = lcfirst($methodName);

        if (!method_exists(self::class, $methodName)) {
            throw new \Exception('Method ' . $methodName . ' does not exist');
        }

        self::$mockedResults[$methodName] = $result;
    }
}
