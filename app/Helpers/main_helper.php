<?php

function active_url($url = '')
{
    if (url_is($url)) {
        return;
    } else {
        return 'collapsed';
    }
}

function get_status_icon($status)
{
    if ($status == 'diajukan') {
        return '<i class="bi bi-clock text-warning"></i>';
    } elseif ($status == 'disetujui') {
        return '<i class="bi bi-check-circle text-success"></i>';
    } elseif ($status == 'ditolak') {
        return '<i class="bi bi-x-circle text-danger"></i>';
    }
    return '';
}
