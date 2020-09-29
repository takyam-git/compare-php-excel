# PHPのExcelライブラリの比較

```
[PHP_XLSXWriter]100行 : 平均7ms / 平均2MB
[PHP_XLSXWriter]1000行 : 平均50ms / 平均2MB
[PHP_XLSXWriter]10000行 : 平均526ms / 平均2MB
[PHP_XLSXWriter]100000行 : 平均5039ms / 平均2MB
[csv]100行 : 平均0ms / 平均2MB
[csv]1000行 : 平均1ms / 平均2MB
[csv]10000行 : 平均10ms / 平均4MB
[csv]100000行 : 平均295ms / 平均6MB
[spout]100行 : 平均23ms / 平均2MB
[spout]1000行 : 平均154ms / 平均2MB
[spout]10000行 : 平均1674ms / 平均2MB
[spout]100000行 : 平均15112ms / 平均2MB
```

## usage

- ./check.sh
- php summary.php