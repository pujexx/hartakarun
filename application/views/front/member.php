
<?php foreach ($members as $member):?>
<div class="members" ><a href="<?php echo site_url('member/get/'.$member['id'].md5('rahasia'));?>">
<?php $img= get_filenames('members/');
if(in_array($member['id'].".jpg",$img )){
    echo img('members/'.$member['id'].".jpg");
}
else {
    echo img('template/images/new_member_icon.jpg');
}
?>


        <p><?php echo $member['nama']?></p></a></div>
<?php endforeach;?>
<?php echo $pagination;?>