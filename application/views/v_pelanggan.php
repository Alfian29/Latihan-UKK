<section class="content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <h1 class=>Pelanggan</h1>
                </div>
            </div>
            <div class="body">
                <div class="row">
                <a style="margin-bottom : 10px" href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>NO</th><th>ID PELANGGAN</th><th>NAMA</th><th>JENIS KELAMIN</th><th>NO HP</th><th>ALAMAT</th><th>AKSI</th>
                        </tr>
                        <?php
                            $i = 0;
                            foreach ($AllDataPelanggan as $pelanggan) {
                                $i++;
                                echo "<tr>
                                        <th scope='row'>$i</th>
                                        <td>$pelanggan->id_pelanggan</td>
                                        <td>$pelanggan->nama_pelanggan</td>
                                        <td>$pelanggan->jenis_kelamin</td>
                                        <td>$pelanggan->no_hp</td>
                                        <td>$pelanggan->alamat</td>
                                        <td>
                                            <button class='btn btn-success waves-effect' type='button' data-toggle='modal' data-target='#defaultModal".$i."'>Edit</button>
                                            <a class='btn btn-danger waves-effect' href='".base_url('index.php/pelanggan/HapusDataPelanggan/'.$pelanggan->id_pelanggan.'')."'>Delete</a>
                                        </td>
                                    </tr>
                                    
                                    <div class='modal fade' id='defaultModal".$i."' tabindex='-1' role='dialog'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h4 class='modal-title' id='defaultModalLabel'>Edit Pelanggan</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <form id='form_validation' method='POST' action='".base_url('index.php/pelanggan/SendUpdateDataPelanggan')."'>
                                                    <input type='text' style='display:none' name='ID' value='".$pelanggan->id_pelanggan."'>
                                                    <div class='form-group form-float'>
                                                        <div class='form-line'>
                                                            <input type='text' class='form-control' name='NamaPelanggan' value='".$pelanggan->nama_pelanggan."'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group form-float'>
                                                        <div class='form-line'>
                                                            <input type='text' class='form-control' name='JenisKelamin' value='".$pelanggan->jenis_kelamin."'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group form-float'>
                                                        <div class='form-line'>
                                                            <input type='text' class='form-control' name='NoHp' value='".$pelanggan->no_hp."'>
                                                        </div>
                                                    </div>
                                                    <div class='form-group form-float'>
                                                        <div class='form-line'>
                                                            <textarea name='Alamat' cols='30' rows='5' class='form-control no-resize'>".$pelanggan->alamat."</textarea>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button class='btn btn-primary waves-effect' type='submit'>SAVE CHANGES</button>
                                                    <button type='button' class='btn btn-danger waves-effect' data-dismiss='modal'>CLOSE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }
                        ?>
                    </table>
                    <?php 
                        $notifikasi = $this->session->flashdata('notif');
                        if($notifikasi != null){
                            echo '<div class="alert alert-danger">'.$notifikasi.'</div>';
                        }
                    ?>
                </div>       
            </div>
        </div>
    </div>
</div>
</section>
<!-- Tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pelanggan</h4>
            </div>
        <div class="modal-body">
            <form action="<?=base_url('index.php/pelanggan/simpan_pelanggan')?>" method="post">
                <label>Nama Pelanggan</label>
            <input type="text" name="NamaPelanggan" class="form-control" placeholder=""><br>
                <label>Jenis Kelamin (L/P)</label>
            <input type="text" name="JenisKelamin" class="form-control" placeholder=""><br>
                <label>No Hp</label>
            <input type="text" name="NoHp" class="form-control" placeholder=""><br>
                <label>Alamat</label>
            <input type="text" name="Alamat" class="form-control" placeholder=""><br>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>