<section class="content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <h1 class=>Menu</h1>
                </div>
            </div>
            <div class="body">
                <div class="row">
                <a style="margin-bottom : 10px" href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>NO</th><th>ID MENU</th><th>NAMA</th><th>HARGA</th><th>AKSI</th>
                        </tr>
                        <?php
                            $i = 0;
                            foreach ($AllDataMenu as $menu) {
                                $i++;
                                echo "<tr>
                                        <th scope='row'>$i</th>
                                        <td>$menu->id_menu</td>
                                        <td>$menu->nama_menu</td>
                                        <td>$menu->harga</td>
                                        <td>
                                            <button class='btn btn-success waves-effect' type='button' data-toggle='modal' data-target='#defaultModal".$i."'>Edit</button>
                                            <a class='btn btn-danger waves-effect' href='".base_url('index.php/menu/HapusDatamenu/'.$menu->id_menu.'')."'>Delete</a>
                                        </td>
                                    </tr>
                                    
                                    <div class='modal fade' id='defaultModal".$i."' tabindex='-1' role='dialog'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h4 class='modal-title' id='defaultModalLabel'>Edit menu</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <form id='form_validation' method='POST' action='".base_url('index.php/menu/SendUpdateDataMenu')."'>
                                                        <input type='text' style='display:none' name='ID' value='".$menu->id_menu."'>
                                                        <div class='form-group form-float'>
                                                            <div class='form-line'>
                                                                <input type='text' class='form-control' name='NamaMenu' value='".$menu->nama_menu."'>
                                                            </div>
                                                        </div>
                                                        <div class='form-group form-float'>
                                                            <div class='form-line'>
                                                                <input type='text' class='form-control' name='Harga' value='".$menu->harga."'>
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
                                    </div>";
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
                <h4 class="modal-title">Tambah Menu</h4>
            </div>
        <div class="modal-body">
            <form action="<?=base_url('index.php/menu/simpan_menu')?>" method="post">
                <label>Menu</label>
            <input type="text" name="NamaMenu" class="form-control" placeholder=""><br>
                <label>Harga</label>
            <input type="text" name="Harga" class="form-control" placeholder=""><br>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
