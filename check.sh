#!/bin/bash

rm rf ./bench_result/*.json &> /dev/null
for n in $(echo '100 1000 10000 100000'); do
  for i in $(seq 1 10); do
    for f in $(echo 'csv.php PHP_XLSXWriter.php spout.php'); do
      rm rf ./result/*.csv &> /dev/null
      rm rf ./result/*.xlsx &> /dev/null
      php $f $n > "./bench_result/${f}_${n}_${i}.json"
    done;
  done;
done;