<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/U_meta') ?>
</head>

<body>
    <?php $this->load->view('layout/U_navbar') ?>
    <?php
    if ($content) {
        $this->load->view($content);
    } ?>
    <?php $this->load->view('layout/U_footer') ?>
</body>

</html>