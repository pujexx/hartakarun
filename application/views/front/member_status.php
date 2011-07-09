<?php foreach ($status as $sts) { ?>

    <div class="statusitem">
        <p><i>

            <?php
            $img = get_filenames('members/');
            if (in_array($sts['id_member'] . ".jpg", $img)) {
                echo img('members/' . $sts['id_member'] . ".jpg");
            } else {
                echo img('template/images/new_member_icon.jpg');
            }
            ?>


        </i><?php echo $sts['post'] ?></p>
</div>
<?php } ?>