<?php

function load_view($name, $data = [], $options = [])
{
    echo view('layout/header', $data, $options);
    echo view('layout/sidebar', $data, $options);
    echo view('layout/navbar', $data, $options);
    echo view('layout/content', $data, $options);
    echo view($name, $data, $options);
    echo view('layout/footer', $data, $options);
}

function load_view_user($name, $data = [], $options = [])
{
    echo view('layout/header', $data, $options);
    echo view($name, $data, $options);
    echo view('layout/footer_user', $data, $options);
}
