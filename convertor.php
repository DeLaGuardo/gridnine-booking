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

$bookings = new Pegas\Gridnine\Xtrip\BookingIterator($dom);

foreach ($bookings as $booking) {
    continue;
}
