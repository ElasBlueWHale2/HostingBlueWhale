<?php
$file = fopen('messages.txt', 'r');
if ($file) {
    while (($line = fgets($file)) !== false) {
        echo $line . '<br>';
    }
    fclose($file);
}
?>
