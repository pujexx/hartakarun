<?php echo form_open('members/dashboard/update_password'); ?>
<table>
    <tr>
        <td>Password lama</td><td><input type="password" name="oldpassword" /><i><?php echo form_error('oldpassword');?></i></td>
    </tr>
    <tr>
        <td>Password Baru</td><td><input type="password" name="newpassword" /><i><?php echo form_error('newpassword');?></i></td>
    </tr>
    <tr>
        <td>Tulis ulang password</td><td><input type="password" name="repassword" /><i><?php echo form_error('repassword');?></i></td>
    </tr>
    <tr>
        <td></td><td><input type="submit" value="Ganti password"/></td>
    </tr>
</table>
<?php echo form_close();?>