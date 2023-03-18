<?php
if (!function_exists('settings')) {
    function settings()
    {
        $root = "http://localhost/hotelbooking/";
        return [
            'companyname' => 'Ocean View',
            'logo' => $root . "admin/assets/img/logo.svg",
            'homepage' => $root,
            'adminpage' => $root . 'admin/',
            'hostname' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'hotelreservation'
        ];
    }
}
if (!function_exists('testfunc')) {
    function testfunc()
    {
        return "<h3>testing common functions</h3>";
    }
}
