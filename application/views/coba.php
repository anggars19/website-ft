<?php
$folder_url = "https://anggariyandisaputra.my.id/ft/assets/img/berita/05_07_12_2023_01_37_1590.PNG";
$folder_path = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($folder_url, PHP_URL_PATH));

echo $folder_path;
?>