<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/admin/partials/head') ?>

</head>

<body>
    <?php $this->load->view('layout/admin/partials/sidebar') ?>
    <?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    if ($content) {
        $this->load->view($content);
    } ?>
        <div class='ignielToTop'> </div>
    <?php $this->load->view('layout/admin/partials/footer') ?>

</body>

</html>