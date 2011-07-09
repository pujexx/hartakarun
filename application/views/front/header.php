

<div class="grid_24">   <h2><img style="float: left; margin: 10px;" title="Dolan Dolan" src="<?php echo base_url(); ?>template/images/logodolan.png" alt="Dolan yoo" height="150" />Dolan Yo.... !!!!</h2><p>Game mencari harta karun real base location</p></div>
<div class="grid_24">

    <div id="menuatas">
        <ul >
            <?php if ($this->session->userdata('id_member') != "") {
            ?>
                <li ><a href="<?php echo site_url(); ?>/members/dashboard" >Beranda</a></li>
            <?php } else {
            ?>
                <li ><a href="<?php echo site_url(); ?>/front" >Home</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url(); ?>/member#" >Member</a></li>
            <li><a href="<?php echo site_url(); ?>/daftar#">Daftar</a></li>
            <li><a href="<?php echo site_url(); ?>/about#" >About</a></li>


            <!--			<li><a href="#">Contact</a></li>-->
        </ul>
    </div>


</div>
