<?php
$limit = $argv[1] ?? 100000;
require_once __DIR__ .'/vendor/autoload.php';
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
$path = 'result/spout.xlsx';
if (file_exists($path)) {
    unlink($path);
}

$start = microtime(true);

$writer = WriterEntityFactory::createXLSXWriter();
$writer->openToFile($path);
$writer->addRow(WriterEntityFactory::createRowFromArray([
    'カラム1', 'カラム2', 'カラム3', 'カラム4', 'カラム5', 'カラム6', 'カラム7', 'カラム8', 'カラム9'
]));
for($i = 0; $i < $limit; $i++) {
    $writer->addRow(WriterEntityFactory::createRowFromArray([
        $i,
        '0123'.$i,
        '文字列',
        '2020-08-09',
        '11:23',
        'TRUE',
        350.8898,
        '="0123"',
        '=ROW()'
    ]));
}
$writer->close();
$end = microtime(true);
$memory = memory_get_peak_usage(true);
echo json_encode([
    'ms' => round(($end - $start) * 1000),
    'memory' => round( $memory/ 1024 / 1024, 2)
]);