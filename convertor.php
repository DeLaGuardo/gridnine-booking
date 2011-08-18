<?php

if (!isset($_SERVER['argv'][1])) {
    file_put_contents('php://stderr', "Usage: converter.php BOOKING_XML_PATH\n");
    exit(1);
}

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/src/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    include $file;
});

$dom = new DOMDocument();
$dom->load($_SERVER['argv'][1]);

$bookings = new Pegas\Gridnine\Xtrip\DOM\BookingIterator($dom);

$outputFormatter = new Pegas\Gridnine\Xtrip\Formatter\Output();
$simpleReport = new Pegas\Gridnine\Xtrip\Report\SampleReport($bookings, $outputFormatter);
$simpleReport->make();

$csvFormatter = new Pegas\Gridnine\Xtrip\Formatter\CSV();
$simpleReport->setFormatter($csvFormatter);
$simpleReport->make();
echo $csvFormatter->format();
