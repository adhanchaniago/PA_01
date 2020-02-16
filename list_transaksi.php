<?php
session_start();
include_once("functions/my_functions.php");
if (!isset($_SESSION['is_logged_in'])) {
    header('location: index.php');
}
if (isset($_GET['jenis']) && isset($_GET['id'])) {
    $tes = new pemesanan;
    $tes->delete_pemesanan($_GET['jenis'], $_GET['id']);
}
$head = new top_buttom;
$head->top("List Transaksi");
?>
<style type="text/css">
    .d-block {
        width: 1300px;
        height: 700px;
    }
</style>
<nav class="nav bg-light navbar-light wow fadeInUp">
    <div class="container-fluid">
        <div class="float-left col-md-3">
            <label><b>Call Center : </b><i class="fa fa-phone"></i> +62 822 7414 8833</label>
        </div>
        <?php
        if (!isset($_SESSION['is_logged_in'])) { ?>
            <div class="nav navbar float-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    Login
                </button>
            </div>
        <?php } else {
            $account = new outentikasi;

            $user = $account->get_user($account->get_session('id'));
            $name = $user->fetch_assoc(); ?>
            <div class="nav navbar float-right">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-user"></i><?= $name['firstname'] . " " . $name['lastname'] ?></button>

                &nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a></button>
            </div>
        <?php } ?>

    </div>
</nav>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="pesan_makanan.php"><i class="fa fa-birthday-cake"></i> Makanan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pesan_minuman.php"><i class="fa fa-beer"></i> Minuman</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pesan_meja.php"><i class="fa fa-table"></i> Meja</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php"><i class="fa fa-binoculars"></i> About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="galery.php"><i class="fa fa-folder-open"></i> Galery</a>
        </li>
        <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) { ?>
            <li class="nav-item">
                <a href="list_transaksi.php" class="nav-link"><i class="fa fa-bar-chart-o"></i> List Pemesanan</a>
            </li>
        <?php } ?>
    </ul>
</nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Login/Register</h4>
            </div>
            <div class="modal-body">

                <div id="accordion" role="tablist">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    Login
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <form action="functions/login_proses.php" method="post" class="form-signin">
                                    <h2>Please Sign in</h2>
                                    <label for="inputEmail" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" required autofocus
                                           placeholder="Username"><br>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="Password" name="password" class="form-control" required autofocus
                                           placeholder="Password"><br>
                                    <img src='captcha.php' alt="gambar">
                                    <input type="text" name="captcha" placeholder="Captcha" class="form-control"
                                           required><br>
                                    <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Register
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body">
                                <form action="functions/registrasi_proses.php" method="post">
                                    <label for="inputEmail" class="sr-only">Nama Depan</label>
                                    <input type="text" name="nama_depan" class="form-control" required autofocus
                                           placeholder="Nama Depan"><br>
                                    <label for="inputEmail" class="sr-only">Last Name</label>
                                    <input type="text" name="nama_belakang" class="form-control" required autofocus
                                           placeholder="Nama Akhir"><br>
                                    <label for="inputEmail" class="sr-only">NIK</label>
                                    <input type="text" name="nik" class="form-control" required autofocus
                                           placeholder="NIK"><br>
                                    <label for="inputEmail" class="sr-only">Telephone</label>
                                    <label for="inputEmail">Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea><br>
                                    <input type="text" name="nomor_telephone" class="form-control" required autofocus
                                           placeholder="Telephone"><br>
                                    <label for="inputEmail" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" required autofocus
                                           placeholder="Username"><br>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="Password" name="password" class="form-control" required autofocus
                                           placeholder="Password"><br>
                                    <img src='captcha.php' alt="gambar">
                                    <input type="text" name="captcha" placeholder="Captcha" class="form-control"
                                           required><br>
                                    <input class="btn btn-primary btn-block" type="submit" name="registrasi"
                                           placeholder="Register">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="firefoxModal" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 align="center" class="alert alert-secondary">Transaksi Anda</h1>
<div class="container-fluid img-thumbnail">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Makanan/ Minuman</th>
            <th scope="col">Jumlah Porsi</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $data = new pemesanan;
        $i = 1;
        $tot = 0;
        $pemesanan = $data->ambil_data_makanan_belum_bayar($account->get_session('id'));
        while ($makanan = mysqli_fetch_assoc($pemesanan)) {
            $nama = $data->read_makanan($makanan['id_menu']);
            $nama_makanan = $nama->fetch_assoc();
            $tot += $makanan['total_harga'];
            ?>
            <tr>
                <th><?= $i ?></th>
                <td><?= $nama_makanan['nama_makanan'] ?></td>
                <td><?= $makanan['jumlah_pesanan'] ?></td>
                <td>Rp.<?= number_format($makanan['total_harga']) ?>.00</td>
                <td>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#Modal<?= $i ?>">Update</button>
                    <a href="list_transaksi.php?jenis=makanan&id=<?= $makanan['id'] ?>" class="btn btn-danger"><i
                                class="fa fa-delete"></i> Delete</a></td>
            </tr>
            <div class="modal fade" id="Modal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                               aria-expanded="true" aria-controls="collapseOne">
                                                Update Porsi
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="card-body">
                                            <form action="update_menu.php?id=<?= $makanan['id'] ?>&id_menu=<?= $makanan['id_menu'] ?>&jenis=makanan"
                                                  method="post" class="form-signin" enctype="multipart/form-data">
                                                <b><p><?= $nama_makanan['nama_makanan'] ?></p></b>
                                                <input type="number" name="porsi" class="form-control" required
                                                       autofocus value="<?= $makanan['jumlah_pesanan'] ?>"><br>
                                                <button class="btn btn-primary btn-block" type="submit"
                                                        name="update_menu"><i class="fa fa-plus"></i> Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="firefoxModal" tabindex="-1" role="dialog"
                     aria-labelledby="firefoxModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++;
        } ?>
        <?php
        $data = new pemesanan;
        $pemesanan_minum = $data->ambil_data_minuman_belum_bayar($account->get_session('id'));
        while ($minuman = mysqli_fetch_assoc($pemesanan_minum)) {
            $nama = $data->read_minuman($minuman['Id_menu_minum']);
            $nama_minuman = $nama->fetch_assoc();
            $tot += $minuman['total_harga'];
            ?>
            <tr>
                <th><?= $i ?></th>
                <td><?= $nama_minuman['nama_minuman'] ?></td>
                <td><?= $minuman['jumlah_pesanan'] ?></td>
                <td>Rp.<?= number_format($minuman['total_harga']) ?>.00</td>
                <td>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#Modal<?= $i ?>">Update</button>
                    <a href="list_transaksi.php?jenis=minuman&id=<?= $minuman['id'] ?>" class="btn btn-danger"><i
                                class="fa fa-delete"></i> Delete</a>
                </td>
            </tr>
            <div class="modal fade" id="Modal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                               aria-expanded="true" aria-controls="collapseOne">
                                                Update Porsi
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="card-body">
                                            <form action="update_menu.php?id=<?= $minuman['id'] ?>&id_menu=<?= $minuman['Id_menu_minum'] ?>&jenis=minuman"
                                                  method="post" class="form-signin" enctype="multipart/form-data">
                                                <b><p><?= $nama_minuman['nama_minuman'] ?></p></b>
                                                <input type="number" name="porsi" class="form-control" required
                                                       autofocus value="<?= $minuman['jumlah_pesanan'] ?>"><br>
                                                <button class="btn btn-primary btn-block" type="submit"
                                                        name="update_menu"><i class="fa fa-plus"></i> Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="firefoxModal" tabindex="-1" role="dialog"
                     aria-labelledby="firefoxModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++;
        } ?>
        <tr>
            <td colspan="3" align="center">Total Seluruhnya</td>
            <td>Rp.<?= number_format($tot) ?>.00</td>
            <td></td>
        </tr>
        <?php if ($tot != 0) { ?>
            <tr>
                <td colspan="3">Tanggal Pengambilan</td>
                <td>
                    <form action="cash_or_atm.php?id=<?= $account->get_session('id') ?>" method="post">
                        <input type="datetime-local" name="time" required class="form-control">
                        <button class="btn btn-success btn-sm" name="atm">PESAN</button>
                    </form>
                </td>
                <td><a href="pesan_makanan.php" class="btn btn-info btn-sm">Tambah</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div><br>
<h1 align="center" class="alert alert-secondary">Transaksi Belum Terkonfirmasi</h1>
<br>
<div class="container-fluid img-thumbnail">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No. Pesanan</th>
            <th scope="col">Tanggal Ambil</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Status Bayar</th>
            <th scope="col">Bukti Bayar</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <?php
        $all = new pemesanan;
        $data = $all->ambil_data_belum_bayar_atm($account->get_session('id'));
        $i = 1;
        while ($mydata = mysqli_fetch_object($data)) {
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $mydata->id ?></td>
                <td><?= $mydata->tanggal_ambil ?></td>
                <td>Rp.<?= number_format($mydata->total_harga) ?>.00</td>
                <td><?= $mydata->status_bayar ?></td>
                <td><?php if ($mydata->bukti_bayar == NULL) { ?>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModal<?= $i ?>">
                            Kirim Bukti Bayar
                        </button>

                        <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Bayar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data"
                                              action="kirim_bukti.php?id=<?= $mydata->id ?>&pel=<?= $account->get_session('id') ?>">
                                            <div class="form-group">
                                                <label>Pilih Gambar</label>
                                                <input type="file" name="gambar" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="kirim">Kirim
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {
                        echo '<a href="img/bukti-bayar/' . $mydata->bukti_bayar . '">' . $mydata->bukti_bayar . '</a>';
                    }
                    ?></td>
                <td><a href="look_all.php?id=<?= $mydata->id ?>" class="btn btn-primary btn-sm text-white">LOOK</a>&nbsp;&nbsp;
                </td>
            </tr>

            <?php $i++;
        } ?>
    </table>
</div>
<div class="container-fluid bg-dark text-white jumbotron" style="opacity: 0.8;">
    <div class="row">
        <div class="col-md-4">
            <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North
                Sumatra 22474</p>
        </div>
        <div class="col-md-4">
            <!--  <h2>Developer:</h2>
             <h3>Institut Teknologi Del</h3>
             <ul>
               <li>Sandy Sihotang</li>
               <li>Mariana Sinaga</li>
               <li>Sarah Simanjuntak</li>
               <li>Edwinda Tampubolon</li>
             </ul> -->
        </div>
        <div class="col-md-4">
            <h2>Contact Us</h2>
            <p><a href="#"><i class="fa fa-envelope"></i> sandysihotang12@gmail.com</a></p>
            <p><i class="fa fa-phone"></i> +62 822 7696 5297</p>
            <p><i class="fa fa-home"></i> Gastro Sijabu-jabu</p>
        </div>
    </div>
    <hr>
    <div class="bg-dark">
        <div class="col-sm-6">
            <p class="mbr-text text-white">
                © Copyright 2018 Gastro Sijabu jabu</p>
        </div>
        <br>
    </div>
</div>
</div>
<?php
$head->buttom();
?>
 