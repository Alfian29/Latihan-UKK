<section class="content">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <h1>User</h1>
                </div>
            </div>
            <div class="body">
                <div class="row">
                <a style="margin-bottom : 10px" href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a>
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>NO</th><th>ID USER</th><th>USERNAME</th><th>PASSWORD</th><th>AKSI</th>
                        </tr>
                        <?php
                            $i = 0;
                            foreach ($AllDataUser as $user) {
                                $i++;
                                echo "<tr>
                                        <th scope='row'>$i</th>
                                        <td>$user->id_user</td>
                                        <td>$user->username</td>
                                        <td>$user->password</td>
                                        <td>
                                            <button class='btn btn-success waves-effect' type='button' data-toggle='modal' data-target='#defaultModal".$i."'>Edit</button>
                                            <a class='btn btn-danger waves-effect' href='".base_url('index.php/user/HapusDataUser/'.$user->id_user.'')."'>Delete</a>
                                        </td>
                                    </tr>
                                    
                                    <div class='modal fade' id='defaultModal".$i."' tabindex='-1' role='dialog'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h4 class='modal-title' id='defaultModalLabel'>Edit User</h4>
                                                </div>
                                                <div class='modal-body'>
                                                    <form id='form_validation' method='POST' action='".base_url('index.php/user/SendUpdateDataUser')."'>
                                                        <input type='text' style='display:none' name='ID' value='".$user->id_user."'>
                                                        <div class='form-group form-float'>
                                                            <div class='form-line'>
                                                                <input type='text' class='form-control' name='Username' value='".$user->username."'>
                                                            </div>
                                                        </div>
                                                        <div class='form-group form-float'>
                                                            <div class='form-line'>
                                                                <input type='text' class='form-control' name='Password' value='".$user->password."'>
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
                <h4 class="modal-title">Tambah User</h4>
            </div>
        <div class="modal-body">
            <form action="<?=base_url('index.php/user/simpan_user')?>" method="post">
                <label>Username</label>
            <input type="text" name="Username" class="form-control" placeholder=""><br>
                <label>Password</label>
            <input type="text" name="Password" class="form-control" placeholder=""><br>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
