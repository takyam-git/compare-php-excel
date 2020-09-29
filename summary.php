<?php
$files = glob('./bench_result/**.json');
$data = [];
foreach($files as $path) {
    preg_match('#\./bench_result/(csv|PHP_XLSXWriter|spout).php_(\d+)_(\d+).json#', $path, $matches);
    $type = $matches[1];
    $rows = $matches[2];
    $num = $matches[3];
    if (!isset($data[$type])) {
        $data[$type] = [];
    }
    if (!isset($data[$type][$rows])) {
        $data[$type][$rows] = [
            'ms' => [],
            'memory' => []
        ];
    }
    $json = json_decode(file_get_contents($path), true);
    $data[$type][$rows]['ms'][] = $json['ms'];
    $data[$type][$rows]['memory'][] = $json['memory'];
}

foreach($data as $type => $rowData) {
    ksort($rowData);
    foreach($rowData as $row => $values) {
        echo '['.$type . ']' . $row . '行 : 平均' . round(array_sum($values['ms']) / count($values['ms'])) . 'ms / 平均' . round(array_sum($values['memory']) / count($values['memory'])) . 'MB' . PHP_EOL;
    }
}