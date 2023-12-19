<?php
function cek_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_admin');
    if ($user_session) {
        redirect('main');
    }
}

function cek_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_admin');
    if (!$user_session) {
        redirect('sij-wpa');
    }
}
