<?php

use Ci4Common\Libraries\SessionLib;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <title>Rumah Web</title>
</head>

<body>
    <div class="main-container">
        <div class="sidebar">
            <div class="sidebar-logo">
                <i class="logo"></i>
            </div>
            <div class="sidebar-menu">
                <ul class="nav flex-column">
                   
                    <li class="nav-item">
                        <a class="nav-link href="<?= base_url('user') ?>">
                            <div class="icon-menu"><i class="icon-fi-sr-apps"></i></div>
                            <div>User</div>
                        </a>
                    </li>
                     
                </ul>
            </div>
            <div class="dropdown btn-auth">
                <button class="btn btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= SessionLib::get('username')?> <span class="icon-fi-sr-angle-small-down arrow-menu"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= base_url('user/logout')?>">Logout</a>
                </div>
            </div>
        </div>
