<?php

function active_url($url = '')
{
    if (url_is($url)) {
        return;
    } else {
        return 'collapsed';
    }
}
