<?php

namespace ChargePoint\StaticExample;

class FridgeMessages
{
    protected array $messages = [];

    public function addMessage(string $message): self
    {
        $this->messages[] = $message;

        return $this;
    }

    public function export(): string
    {
        if (FeatureLib::isJsonExportEnabled()) {
            return json_encode($this->messages);
        }

        return implode("\n", $this->messages);
    }

    public function exportV2(): string
    {
        if (FeatureLibV2::isJsonExportEnabled()) {
            return json_encode($this->messages);
        }

        return implode("\n", $this->messages);
    }
}
