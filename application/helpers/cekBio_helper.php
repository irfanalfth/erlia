<?php

function bioCk()
{
    $ci = get_instance();
    $ci->load->model('Global_model');

    $cekBio = $ci->Global_model->get_data(['user_id' => $ci->session->userdata('user_id')], 'pendidik');

    if ($cekBio == null) {
        if ($ci->uri->segment(1) == 'dashboardpendidik') {
            redirect('biodata/bioPendidik');
        } elseif ($ci->uri->segment(1) == 'dashboardsiswa') {
            redirect('biodata/bioSiswa');
        }
    }
}
