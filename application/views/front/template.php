
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
        <?php
        if ($this->session->userdata('id_member') != "") {
            $this->load->model('h_member_model');

            $setting_members = $this->h_member_model->get_one($this->session->userdata('id_member'));
        }

        //  $member_kecil = $this->h_member_model->get_all();
        ?>
        <div class="container_24 main">
            <?php $this->load->view('front/header'); ?>

            <div class="clear"></div>
            <div class="grid_16">
                <i style="color: red"><?php echo $this->session->flashdata('notif'); ?></i>
                <?php if (!empty($content)) {
                ?>
                <?php $this->load->view("front/" . $content); ?>
                <?php
                } else {
                    echo "Kosong";
                }
                ?>

            </div>
            <div class="grid_8">
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#loginform').submit(function (){
                            $("#submitlogin").val("procesing....");
                        });
                    });
                </script>
                <?php $session = $this->session->userdata('id_member'); ?>
                <?php if (empty($session)) {
                ?>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#buttonLogin").click(function(){
                                $("#loginpanel").slideToggle();
                            });
                        }) ;
                    </script>
                    <div id="buttonLogin" style="width: 100%; height: 30px; background: #00cccc; padding-top: 3px; text-align: center;">login</div>
                    <div id="loginpanel" style="display: none;">
                    <?php echo form_open('front/login', "id='loginform'"); ?>
                    <p>Username : <input type="text" name="username_login" /><i style="color: red;"><?php echo form_error('username_login'); ?></i></p>
                    <p>Password : <input type="password" name="password_login" /><i style="color: red;"><?php echo form_error('password_login'); ?></i></p>
                    <p><i id="prosesslogin">&nbsp;&nbsp;&nbsp;</i><input type="submit" value="Login" id="submitlogin"></p>

                    <?php echo form_close(); ?>

                    <hr>
                </div>
                <p>Member Registered</p>
                <div style="width: 100%">

                </div>
                <?php } else {
 ?>

                <?php
                    $img = get_filenames('members/');
                    if (in_array($this->session->userdata('id_member') . ".jpg", $img)) {
                        echo img('members/' . $this->session->userdata('id_member') . ".jpg");
                    } else {
                        echo img('template/images/new_member_icon.jpg');
                    }
                ?>
                    <hr>
                    <p><?php echo $this->session->userdata('nama'); ?></p>
                    <p><?php echo anchor('front/logout', 'Logout'); ?></p>
                    <hr>
                    <p><?php echo anchor('members/dashboard/lokasi', 'lokasi HP saya'); ?></p>
                    <p><?php echo anchor('members/dashboard/profil', 'Profil'); ?></p>
                    <p><?php echo anchor('members/dashboard/form_password', 'Ganti Password'); ?></p>
                    <p><?php echo anchor('members/dashboard/foto_profil', 'Ganti foto profil'); ?></p>
<?php } ?>

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