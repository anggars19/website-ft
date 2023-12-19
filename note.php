<?php 
 <li>
 <a><?=$tampil['nama_menu']?></a>
 <ul class="dropdown">
     <?php if($tampil['nama_menu'] == "Profil"){ ?>
         <li><a href="<?= base_url('profile/sambutan'); ?>">Sambutan</a></li>
         <li><a href="<?= base_url('profile/vimitu'); ?>">Visi, Misi dan Tujuan</a></li>
         <li><a href="<?= base_url('profile/sejarah'); ?>">Sejarah</a></li>
         <li><a href="<?= base_url('profile/so'); ?>">Struktur Organisasi</a></li>
         <li><a href="<?= base_url('view/626'); ?>">Program Studi</a></li>
         <li><a href="<?= base_url('view/625'); ?>">Sarana dan Prasarana</a></li>
         <li><a href="<?= base_url('view/608'); ?>">Kerjasama</a></li>
     <?php }else if($tampil['nama_menu'] =="Kemahasiswaan & Publikasi" ) { ?>
         <li><a href="<?= base_url('prestasi'); ?>">Prestasi</a></li>
     <?php foreach($header_list as $tampil2): 
         if($tampil2['id_menu'] == $tampil['id_menu'] )	{
     ?>
         <li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
     <?php } 
     endforeach; 
     }else{ 
         foreach($header_list as $tampil2): 
         if($tampil2['id_menu'] == $tampil['id_menu'] )	{
     ?>
         <li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
     <?php } endforeach;?>
 </ul>
</li>


///


<?php foreach($header_menu as $tampil): ?>
    <li>
    <a><?=$tampil['nama']?></a>
    <ul class="dropdown">
        <?php if($tampil['nama_menu'] == "Profil"){ ?>
        <li><a href="<?= base_url('profile/sambutan'); ?>">Sambutan</a></li>
        <li><a href="<?= base_url('profile/vimitu'); ?>">Visi, Misi dan Tujuan</a></li>
        <li><a href="<?= base_url('profile/sejarah'); ?>">Sejarah</a></li>
        <li><a href="<?= base_url('profile/so'); ?>">Struktur Organisasi</a></li>
        <li><a href="<?= base_url('view/626'); ?>">Program Studi</a></li>
        <li><a href="<?= base_url('view/625'); ?>">Sarana dan Prasarana</a></li>
        <li><a href="<?= base_url('view/608'); ?>">Kerjasama</a></li>
        <?php }else if($tampil['nama_menu'] == "Akademik"){ ?>
            <li><a href="http://pmb.unipma.ac.id/" target="_blank">Penerimaan Mahasiswa Baru</a>
            <li><a href="<?= base_url('akademik/k_a'); ?>">Kalender Akademik</a></li>
        <?php   foreach($header_list as $tampil2):  
        if($tampil2['id_menu'] == $tampil['id_menu'] )	{
        ?>
        <li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
        <?php } endforeach; }else if($tampil['nama_menu'] =="Kemahasiswaan & Publikasi" ){?>
        <li><a href="<?= base_url('prestasi'); ?>">Prestasi</a></li>
        <?php   foreach($header_list as $tampil2):  
        if($tampil2['id_menu'] == $tampil['id_menu'] )	{
        ?>
        <li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
        <?php }endforeach; }else{  foreach($header_list as $tampil2):
        if($tampil2['id_menu'] == $tampil['id_menu'] )	{	
        ?>
        <li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
        <?php } endforeach; }?>
    </ul>
    </li>
    <?php endforeach; ?>
?>