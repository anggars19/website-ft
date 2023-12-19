<?php 
// session_start();
$timeout = 60; // Set timeout menit
$logout_redirect_url = base_url()."logout"; // Set logout URL

$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Maaf, Silahkan Login kembali!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>