DatabaseSpeedTest
=================

Built in PHP, this allows you to flood a database with a lot of queries, then recall those queries. Plus it records the time.

Best used on the command line.

The file runs from /code/test.php. After creating a million rows, it calls back 10000 rows. It loads them into the file data.txt