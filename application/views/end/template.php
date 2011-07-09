
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>960 Grid System &mdash; Demo</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/reset.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/text.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/960_24_col.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/style.css" />
        <!--script js-->

        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/script.js"></script>


    </head>
    <body>

        <div class="container_24 main">
            <?php $this->load->view('end/header'); ?>

            <div class="clear"></div>
            <div class="grid_24">
                <i style="color: red"><?php echo $this->session->flashdata('notif'); ?></i>
                <?php if (!empty($content)) {
                ?>
                <?php $this->load->view("end/" . $content); ?>
                <?php
                } else {
                    echo "Kosong";
                }
                ?>

            </div>
          
            <div class="clear"></div>

            <div class="grid_24 footer">
                &copy; puji rahmadiyanto design<br>
                Game Mencari Harta Karun<br>

            </div>

            <!-- end .grid_12.pull_12 -->
            <div class="clear"></div>
        </div>
        <!-- end .container_24 -->
    </body>
</html>