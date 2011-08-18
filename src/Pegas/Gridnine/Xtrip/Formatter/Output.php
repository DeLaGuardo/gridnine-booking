<?php

namespace Pegas\Gridnine\Xtrip\Formatter;

class Output implements Formatter
{
    public function addHeaders(array $headers)
    {
        $this->printArray($headers);
    }

    public function addRow(array $grabbed)
    {
        $this->printArray($grabbed);
    }

    private function printArray(array $array)
    {
        echo implode("\t", $array) . "\n";
    }
}
