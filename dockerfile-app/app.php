<?php

$dbconn = pg_connect('host='.$_ENV['POSTGRES_HOST'].' dbname='.$_ENV['POSTGRES_DB'].' user='.$_ENV['POSTGRES_USER'].' password='.$_ENV['POSTGRES_PASSWORD']);

if (!$dbconn) {
    echo "An error occurred.\n";
    exit;
}

pg_insert($dbconn, 'numbers', ['value' => rand(0, 20)]);

$result = pg_query($dbconn, 'SELECT * FROM numbers');

if (!$result) {
    echo "An error occurred.\n";
    exit;
}

while ($row = pg_fetch_row($result)) {
    echo "$row[0],$row[1]";
    echo "<br />\n";
}
?>