<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/A_meta') ?>
</head>

<body>
    <?php $this->load->view('layout/A_sidebar') ?>
    <?php
    if ($content) {
        $this->load->view($content);
    } ?>
    <div class='ignielToTop'> </div>
    <?php $this->load->view('layout/A_footer') ?>

</body>

</html>