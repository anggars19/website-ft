<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
	include("application/views/template/admin/head.php"); 
	include("application/views/template/admin/left.php");   
	$halaman = $data['halaman'];
?>


<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb">
                        <strong><i class="fa fa-angle-right"></i>
                        <?php echo ($halaman == 'menu') ? 'Menu' : 
                     (($halaman == 'sub_menu') ? 'Sub Menu' : (($halaman == 'pages') ? 'Pages' : '')); ?>
                        </strong>
                    </h4>
                    <?php
                        if($halaman == "menu"){
                            echo form_open_multipart(base_url().'menu/add', ['id' => 'updateForm']);
                    ?>
                            <div class="form-horizontal style-form">
                                    <input type="hidden" class="form-control" name="op" value="simpan">
                                    <input type="hidden" class="form-control" name="tampil" value="N">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Menu</label>
                                        <div class="col-sm-10"> 
                                            <input type="text" class="form-control" name="nama" placeholder="nama menu" required >     
                                             <p class="help-block" style="font-size:16px;">* Nama menu tidak boleh sama.</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
                                        <div class="col-sm-10">
                                            <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="user" class="form-control" value="<?php  echo $_SESSION['userlogin'];?>" readonly >
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"> </label>
                                        <div class="col-sm-10">    
                                            <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                                        </div>
                                    </div>
                            </div>
                    <?php echo form_close();
                    }else if($halaman == "sub_menu"){
                            echo form_open_multipart(base_url().'sub_menu/add', ['id' => 'updateForm']);
                    ?>
                             <div class="form-horizontal style-form">
                                    <input type="hidden" class="form-control" name="op" value="simpan">
                                    <input type="hidden" class="form-control" name="tampil" value="N">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Sub Menu</label>
                                        <div class="col-sm-10"> 
                                            <input type="text" class="form-control" name="nama" placeholder="nama sub menu" required >  
                                             <p class="help-block" style="font-size:16px;">* Nama sub menu tidak boleh sama.</p>   
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Menu</label>
                                            <div class="col sm-10">
                                                <select name="menu" id="" class="input " style="width: 145px;margin-left:15px;padding:2px" required> 
                                                    <option value="" disabled selected hidden>pilih menu</option>
                                                <?php foreach ($menu as $tampil) : ?>
                                                    <option value="<?php echo $tampil['id_menu']?>" ><?php echo $tampil['nama']?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
                                        <div class="col-sm-10">
                                            <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="user" class="form-control" value="<?php  echo $_SESSION['userlogin'];?>" readonly >
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"> </label>
                                        <div class="col-sm-10">    
                                            <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                                        </div>
                                    </div>
                            </div>
                    <?php echo form_close(); 
                    }else if($halaman == "pages"){
                        echo form_open_multipart(base_url().'pages/add', ['id' => 'updateForm']);
                    ?>
                        <div class="form-horizontal style-form">
                                        <input type="hidden" class="form-control" name="op" value="simpan">
                                        <input type="hidden" class="form-control" name="tampil" value="N">

                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Pages</label>
                                            <div class="col-sm-10"> 
                                                <input type="text" class="form-control" name="tema" placeholder="Judul pages" required >     
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi</label>
                                            <div class="col-sm-10">
                                                <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="" required>		
                                                </textarea>
                                                <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>						  
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
                                            <div class="col-sm-10" class="btn btn-primary"  > 
                                                <input type="file"  name="data_upload"> Maksimal 2 MB>
                                                <a></a>      
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
                                            <div class="col-sm-10">
                                                <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >    
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Menu</label>
                                            <div class="col sm-10">
                                                <select name="menu" id="menuSelect" class="input " style="width: 145px;margin-left:15px;padding:2px" required> 
                                                    <option value="" disabled selected hidden>pilih menu</option>
                                                <?php foreach ($menu as $tampil) : ?>
                                                    <option value="<?php echo $tampil['id_menu']?>" ><?php echo $tampil['nama']?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <br><br>
                                            <label class="col-sm-2 col-form-label">Sub Menu</label>
                                            <div class="col sm-10">
                                                <select name="sub" id="submenuSelect" class="input " style="width: 145px;margin-left:15px;padding:2px" required> 
                                                    <option value="" disabled selected hidden>pilih sub menu</option>
                                                <?php foreach ($sub as $tampil) : ?>
                                                    <option value="<?php echo $tampil['id_sub']?>" ><?php echo $tampil['nama']?></option>
                                                <?php endforeach; ?>
                                                </select>			
                                                <p class="help-block" style="font-size:16px;margin-left:190px">* Pilih salah satu menu atau sub menu.</p>		  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="user" class="form-control" value="<?php  echo $_SESSION['userlogin'];?>" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 control-label"> </label>
                                            <div class="col-sm-10">    
                                                <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                                            </div>
                                        </div>
                        </div>
                    <?= form_close(); } ?>
                </div>
            </div>
        </div>
    </section>
</section>

<?php 
 include("application/views/template/admin/footer2.php"); 
} ?>