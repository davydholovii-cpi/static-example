<?php

namespace ChargePoint\StaticExample;
class App
{
    public function main()
    {
        echo 'The result from a normal usage in the code: ';
        var_export(FeatureLib::isTheCoolThingEnabled());
        echo PHP_EOL;
        echo 'The result from a test call, where you can pass the expected result:';
        var_export(FeatureLib::isTheCoolThingEnabled(false));
    }
}
