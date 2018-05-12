<?php 
session_start();
include_once("functions/my_functions.php");
$head=new top_buttom;
$head->top("Home");
 ?>
  <style type="text/css">
  .d-block{
    width: 1300px;
    height: 700px;
  }
</style>
<body style="background-image: url(img/slide/flower-meadow.jpg); background-attachment: fixed;width: 100%;height: 100%;">
	<nav class="nav bg-light navbar-light">
    <div class="container-fluid">
		<div class="float-left col-md-3">
      <label><i class="fa fa-phone"></i> +91234</label>      
    </div>
    <?php 
    if (!isset($_SESSION['is_logged_in'])) { ?>
       <div class="nav navbar float-right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        Login
      </button>
    </div>
     <?php } 
     else{ ?>
         <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i> Sandy
      </button>&nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a>      
    </div>
    <?php } ?>

  </div>
	</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="#"><i class="fa fa-home"></i> Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#"><i class="fa fa-birthday-cake"></i> Makanan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#"><i class="fa fa-beer"></i> Minuman</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#"><i class="fa fa-table"></i> Meja</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#"><i class="fa fa-fort-awesome"></i> Pesta</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="fa fa-binoculars"></i> About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="fa fa-folder-open"></i> Galery</a>
  </li>
</ul>
	</nav><br>
  <div class="container img-thumbnail" style="background-color: #ff3399;">
        <div class="row">
          <div class="col-md-12">
            <div class="product">
              <h3 align="center">Tambah Makanan</h3><hr class="pg-titl-bdr-bte"></hr>

              <form action="tambah.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <p>Nama Makanan</p>
                  <input type="text" name="nama_makanan" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Harga Makanan</p>
                  <input type="number" name="harga" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Jumlah Stok</p>
                  <input type="number"  name="stok" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Gambar</p>
                  <input type="file" name="gambar" class="btn btn-primary">
                </div>
                <div class="text-center"><button name="tambah_makanan" type="submit" class="btn btn-komentar btn-md"><i class="fa fa-plus"></i>Tambah</button></div>
              </form>
            </div>
          </div>
        </div>
      </div><br>

  <div class="container img-thumbnail" style="background-color: #a6ff4d;">
        <div class="row">
          <div class="col-md-12">
            <div class="product">
              <h3 align="center">Tambah Minuman</h3><hr class="pg-titl-bdr-bte"></hr>

              <form action="tambah.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <p>Nama Minuman</p>
                  <input type="text" name="nama_minuman" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Harga Minuman</p>
                  <input type="number" name="harga" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Jumlah Stok</p>
                  <input type="number"  name="stok" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Gambar</p>
                  <input type="file" name="gambar" class="btn btn-primary">
                </div>
                <div class="text-center"><button name="tambah_minuman" type="submit" class="btn btn-komentar btn-md"><i class="fa fa-plus"></i>Tambah</button></div>
              </form>
            </div>
          </div>
        </div>
      </div><br>
 
      <div class="container-fluid bg-secondary text-white jumbotron" style="opacity: 0.8;">
        <div class="row">
        <div class="col-md-4">
          <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North Sumatra 22474</p>
        </div>
        <div class="col-md-4">
          <h2>Developper:</h2>
          <h3>Institut Teknologi Del</h3>
          <ul>
            <li>Sandy Sihotang</li>
            <li>Mariana Sinaga</li>
            <li>Sarah Simanjuntak</li>
            <li>Edwinda Tampubolon</li>
          </ul>
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
              </div><br>
          </div>
       </div> 
       </div> 
     </body>
<?php 
  $head->buttom();
 ?>