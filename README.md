Soal no 3 
<?php
function count($poin, $type) {
    if ($type === 'GOLD') {
        return $poin * 0.8;
    } else if ($type === 'SILVER') {
        return $poin * 0.9;
    } else {
        return $poin;
    }
}

echo count(4, 'GOLD')
?>

untuk nama variabel dibuat sedeskriptif mungkin agar ketika dimaintenance lebih mudah
