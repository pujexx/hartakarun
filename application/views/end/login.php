<script type="text/javascript">
    $(document).ready(function(){
        $('#loginform').submit(function (){
            $("#submitlogin").val("procesing....");
        });
    });
</script>
<?php $session = $this->session->userdata('id_admin'); ?>
<?php if (empty($session)) {
?>
<?php echo form_open('admin/login/index', "id='loginform'"); ?>
    <p>Username : <input type="text" name="username_login" /><i style="color: red;"><?php echo form_error('username_login'); ?></i></p>
    <p>Password : <input type="password" name="password_login" /><i style="color: red;"><?php echo form_error('password_login'); ?></i></p>
    <p><i id="prosesslogin">&nbsp;&nbsp;&nbsp;</i><input type="submit" value="Login" id="submitlogin"></p>

<?php echo form_close(); ?>

<?php } ?>