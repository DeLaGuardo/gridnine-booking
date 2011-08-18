<?php

namespace Pegas\Gridnine\Xtrip\Formatter;

interface Formatter
{
    public function addHeaders(array $headers);

    public function addRow(array $grabbed);
}
