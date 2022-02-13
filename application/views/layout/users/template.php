<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/users/partials/head') ?>
</head>

<body>
    <?php $this->load->view('layout/users/partials/navbar') ?>
    <?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    if ($content) {
        $this->load->view($content);
    } ?>
    <?php $this->load->view('layout/users/partials/footer') ?>
</body>

</html>