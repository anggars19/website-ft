<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location = 'beranda';</script>";		
}else{
	include("application/views/template/admin/head.php"); 
	include("application/views/template/admin/left.php");   
	$tema = $data['tema'];
?>


<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb">
                        <strong><i class="fa fa-angle-right"></i><?php echo $tema?> </strong>
                    </h4>
                    <?php
                        foreach($list as $tampil) : 
                            echo form_open_multipart(base_url().'page/edit', ['id' => 'updateForm']);
                    ?>
                            <div class="form-horizontal style-form">
                                    <input type="hidden" class="form-control" name="op" value="edit">
                                    <input type="hidden" class="form-control" name ="tema" value="<?php echo $tampil['tema'];?>" required >
                                    <input type="hidden" class="form-control" name ="id_list" value="<?php echo $tampil['id_list'];?>" required >	

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi <?= $tema ?></label>
                                        <div class="col-sm-10">
                                            <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="" required>		
                                            <?php echo $tampil['isi'];?>
                                            </textarea>
                                            <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>						  
                                        </div>
                                    </div>	
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
                                        <div class="col-sm-10" class="btn btn-primary"  > 
                                            <input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
                                            <a></a>      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
                                        <div class="col-sm-10">
                                            <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value = "<?php echo $tampil['tgl_posting'];?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
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
                    <?php echo form_close(); endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</section>

<?php 
 include("application/views/template/admin/footer2.php"); 
} ?>