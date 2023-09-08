<?php

namespace Tests;

use ChargePoint\StaticExample\FeatureLibV2;

class FridgeMessagesTest extends \PHPUnit\Framework\TestCase
{
    public function testMessagesExport()
    {
        $fridgeMessages = new \ChargePoint\StaticExample\FridgeMessages();
        $fridgeMessages->addMessage('My first message');
        $fridgeMessages->addMessage('My second message');

        $this->assertEquals("My first message\nMy second message", $fridgeMessages->export());
    }

    // Now I added my JSON export and I want to test it together with default export

    // This test will fail because I can't tell my FridgeMessages to pass true when FeatureLib::isJsonExportEnabled() is called
    public function testMessagesExportToJson()
    {
        $fridgeMessages = new \ChargePoint\StaticExample\FridgeMessages();
        $fridgeMessages->addMessage('My first message');
        $fridgeMessages->addMessage('My second message');

        $this->assertEquals('["My first message","My second message"]', $fridgeMessages->export());
    }

    // With FeatureLibV2 we can actually mock the expected result! Cool idea with __callStatic
    public function testMessagesExportV2()
    {
        $fridgeMessages = new \ChargePoint\StaticExample\FridgeMessages();
        $fridgeMessages->addMessage('My first message');
        $fridgeMessages->addMessage('My second message');

        $this->assertEquals("My first message\nMy second message", $fridgeMessages->exportV2());
    }

    public function testMessagesExportJsonV2()
    {
        FeatureLibV2::mockIsJsonExportEnabled(true);
        $fridgeMessages = new \ChargePoint\StaticExample\FridgeMessages();
        $fridgeMessages->addMessage('My first message');
        $fridgeMessages->addMessage('My second message');

        $this->assertEquals('["My first message","My second message"]', $fridgeMessages->exportV2());
    }
}
