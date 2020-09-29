<?php
$limit = $argv[1] ?? 100000;
require_once __DIR__ .'/vendor/autoload.php';
$path = 'result/php_xlsxwriter.xlsx';
if (file_exists($path)) {
    unlink($path);
}
$start = microtime(true);
$writer = new XLSXWriter();
$writer->writeSheetHeader('Sheet1', [
    'カラム1' => 'integer',
    'カラム2' => 'string',
    'カラム3' => 'string',
    'カラム4' => 'date',
    'カラム5' => 'time',
    'カラム6' => 'string',
    'カラム7' => '0.0',
    'カラム8' => 'integer',
    'カラム9' => 'integer',
]);
for($i = 0; $i < $limit; $i++) {
    $writer->writeSheetRow('Sheet1', [
        $i,
        '0123'.$i,
        '文字列',
        '2020-08-09',
        '11:23',
        'TRUE',
        350.8898,
        '="0123"',
        '=ROW()'
    ]);
}
$writer->writeToFile($path);
$end = microtime(true);
$memory = memory_get_peak_usage(true);
echo json_encode([
    'ms' => round(($end - $start) * 1000),
    'memory' => round( $memory/ 1024 / 1024, 2)
]);