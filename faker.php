<?php
include 'koneksi.php';
// require the Faker autoloader
require_once 'vendor/fzaninotto/Faker/src/autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create('id_ID');

// generate data by accessing properties
// echo $faker->name;
  // 'Lucy Cechtelar';
// echo $faker->address;
  // "426 Jordy Lodge
  // Cartwrightshire, SC 88120-6700"
// $nim = 12017001;
for($a=0;$a<5;$a++){
  // $n = $nim++;
	// mysqli_query($koneksi,"INSERT INTO mahasiswa values(NULL,'$n', '$faker->name', '$faker->paragraph($nbSentences = 3, $variableNbSentences = true)')");
  // mysqli_query($koneksi,"INSERT INTO halaman values(NULL,'$faker->sentence($nb=3)', '444103481car.png', '$faker->paragraph($nbSentences = 3, $variableNbSentences = true)')");
	// mysqli_query($koneksi,"INSERT INTO kategori values(NULL,'$faker->word')");
	// mysqli_query($koneksi,"INSERT INTO artikel values(NULL, '$tanggal', '$kalimat', '$nomor', '$kk', '1128105000Screen Shot 2019-03-20 at 2.33.21 PM.png')");
}
  // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
  // et sit et mollitia sed.
  // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
  // sit minima sint.