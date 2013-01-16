<?php

$cxn = mysqli_connect('localhost', 'root', 'themoonisblueinjune', 'test');

list($sm, $st) = explode(' ', microtime());
list($sm0, $sm) = explode('.', $sm);
echo "Starting at: ".date('F j Y, \a\t H:i:s', $st).".".$sm;
for($x=0; $x<1000000; $x++) {

$d2 = chr(rand(97, 98));
$d1 = time();

mysqli_query($cxn, "INSERT INTO test.dbtest(data1, data2) VALUES('".$d1."', '".$d2."')");
}

list($e1m, $e2t) = explode(' ', microtime());

$eft = $e2t - $tm;
$efm = $e1m - $sm;
echo "\r\nfinished inserting, took: ".$eft.".".$efm." seconds";

list($s2m, $s2t) = explode(' ', microtime());
list($sm0, $s2m) = explode('.', $s2m);
echo "\r\nGetting 10000 rows. Starting at: ".date('J m T, \a\t h:i:s a', $s2t).".".$s2m;

$get_start = rand(0, 99990);

$r = mysqli_query($cxn, "SELECT * FROM test.dbtest WHERE 1 LIMIT ".$get_start.", 100000");

$file = fopen('data.txt', 'a');
$r = mysqli_fetch_assoc($r);
foreach($r as $o) {
  $datatowrite = $o['id'].','.$o['data1'].','.$o['data2'];
  fwrite($file, $datatowrite);
}
fclose($file);


list($e2m, $e2t) = explode(' ', microtime());
list($sm0, $e2m) = explode('.', $e2m);

$ef2t = $e2t - $s2t;
$ef2m = $e2m - $s2m;

echo "\r\nFinished getting 100000, took: ".$ef2t.".".$ef2m." seconds";

