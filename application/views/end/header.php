

<div class="grid_24">   <h3>Mencari Harta Karun</h3></div>
<div class="grid_24">

    <div id="menuatas">
        <ul >
            <li ><a href="<?php echo site_url(); ?>/admin" >Home</a></li>
            <?php if ($this->session->userdata('id_admin') != "") {
            ?>
                <li ><a href="<?php echo site_url(); ?>/admin/lokasi" >Lokasi</a></li>
                <li ><a href="<?php echo site_url(); ?>/admin/pertanyaan" >Pertanyaan</a></li>
                <li ><a href="<?php echo site_url(); ?>/admin/game" >Game</a></li>
                <li ><a href="<?php echo site_url(); ?>/admin/profil" >Profil</a></li>
                <li ><a href="<?php echo site_url(); ?>/admin/login/logout" >logout</a></li>
            <?php } ?>
            <!--			<li><a href="#">Contact</a></li>-->
        </ul>
    </div>


</div>
