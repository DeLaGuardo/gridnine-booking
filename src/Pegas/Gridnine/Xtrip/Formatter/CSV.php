<?php

namespace Pegas\Gridnine\Xtrip\Formatter;

class CSV implements Formatter
{
    private $csv = "";

    public function addHeaders(array $headers)
    {
        $this->csv .= $this->convertArray($headers);
    }

    public function addRow(array $grabbed)
    {
        $this->csv .= $this->convertArray($grabbed);
    }

    public function format()
    {
        return $this->csv;
    }

    private function convertArray(array $array)
    {
        foreach ($array as &$row) {
            $row = '"' . str_replace('"', '""', $row) . '"';
        }
        return implode(',', $array) . "\n";
    }
}
