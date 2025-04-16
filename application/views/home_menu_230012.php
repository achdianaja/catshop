<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATSHOP 230012</title>
</head>
<body>
    <h1>CATSHOP 230012</h1>
    <h3>APPS MENU</h3>
    <div style="color: green"><?= $this->session->flashdata('msg') ?></div>
    <hr>
    <ul>
        <li><a href="<?= site_url('cats230012') ?>">Manage Cats</a></li>
        <li><a href="<?= site_url('category230012') ?>">Manage Category</a></li>
        <?php if ($this->session->userdata('usertype_230012') == 'Manager') : ?>
            <li><a href="<?= site_url('user230012') ?>">Manage Users</a></li>
            <li><a href="<?= site_url('cats230012/sales') ?>">Sales Report</a></li>
        <?php endif; ?>
    </ul>

    <hr>

    <h3>Welcome <?= $this->session->userdata('fullname_230012') ?>, you are login as <?= $this->session->userdata('usertype_230012') ?></h3>
    <ul>
        <li><a href="<?= site_url('auth230012/changepassword') ?>">Change Password</a></li>
        <li><a href="<?= site_url('auth230012/logout') ?>">Logout</a></li>
    </ul>
</body>
</html>