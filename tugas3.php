<?php 
// Array Function
// is_array()
// count()
// sort()
// shuffle()

$buah = ['anggur', 'pisang', 'semangka', 'kiwi'];

// is_array()
if (is_array($buah)) {
    echo "Variabel adalah array\n\n";
}

// count()
echo "Jumlah data: " . count($buah) . "\n\n";

// sort()
sort($buah);
echo "Setelah diurutkan:\n";
print_r($buah);
echo "\n";

// shuffle()
shuffle($buah);
echo "Setelah diacak:\n";
print_r($buah);
?>