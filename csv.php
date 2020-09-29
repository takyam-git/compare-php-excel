<?php
$limit = $argv[1] ?? 100000;
$start = microtime(true);
$file = new SplTempFileObject();
file_put_contents('result/csv.csv', '');
$file->fputcsv(['カラム1', 'カラム2', 'カラム3', 'カラム4', 'カラム5', 'カラム6', 'カラム7', 'カラム8', 'カラム9']);
for($i = 0; $i < $limit; $i++) {
    $file->fputcsv([$i, '0123'.$i, '文字列', '2020-08-09', '11:23', 'TRUE', 350.8898, '="0123', '=ROW()']);
}
$file->rewind();
while(!$file->eof()) {
    file_put_contents('result/csv.csv', $file->fread(1024 * 1024), FILE_APPEND);
}
$end = microtime(true);
$memory = memory_get_peak_usage(true);
echo json_encode([
    'ms' => round(($end - $start) * 1000),
    'memory' => round( $memory/ 1024 / 1024, 2)
]);