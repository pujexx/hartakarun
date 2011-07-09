<br>
<?php
$img= get_filenames('members/');
if(in_array($this->session->userdata('id_member').".jpg",$img )){
    echo img('members/'.$this->session->userdata('id_member').".jpg");
}
else {
    echo img('template/images/new_member_icon.jpg');
}

?>
<?php echo form_open_multipart('members/dashboard/upload');?>

<input type="file" name="userfile" size="20" />
<input type="submit" value="upload" />
<?php echo form_close();?>