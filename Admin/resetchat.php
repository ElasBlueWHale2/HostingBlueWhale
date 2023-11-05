<?php
include('Header.php');

$file_path = '../Client/messages.txt';
if (file_exists($file_path)) {
    
    if (file_put_contents($file_path, '') !== false) {
        echo swal('Reset Thành Công!','success');
        echo redirect('./');
    } else {
        echo swal('Không Thể Reset','error');
        echo redirect('./');
    }
    
} else {
    echo swal('Không tìm thấy file chat','error');
        echo redirect('./');
}

include('Header.php');
?>
