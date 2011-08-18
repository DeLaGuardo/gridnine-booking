<?php

namespace Pegas\Gridnine\Xtrip\Formatter;

class Json implements Formatter
{
    private $rows = array();

    public function addHeaders(array $headers)
    {
        $this->rows[] = $headers;
    }

    public function addRow(array $grabbed)
    {
        $this->rows[] = $grabbed;
    }

    public function format()
    {
        return json_encode($this->rows);
    }
}
