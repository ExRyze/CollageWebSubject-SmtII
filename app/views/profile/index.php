<?php require_once(DHEAD); ?>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  <?php require_once(DNAV); ?>
  <!--  Sidebar End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
    <?php require_once(DBAR); ?>
    <!--  Header End -->
    <div class="container-fluid">
    <?php Flasher::getFlash(); ?>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="<?=IMG?>/users/<?= ($_SESSION['user']['image']) ? $_SESSION['user']['image'] : 'user-1.jpg' ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height: 150px;">
              <h5 class="my-3 mb-1"><?=$data['username']?></h5>
              <p class="text-muted mb-4"><?=$data['role']?></p>
              <?= ($data['edit'] === "enabled") ? 
                "<div class='d-flex justify-content-center mb-2'>
                <button type='button' class='btn btn-outline-primary ms-1' data-bs-toggle='modal' data-bs-target='#photo'>Change Photo</button>
              </div>" : "";
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Data Personal

                <?= ($data['edit'] === "enabled") ? 
                  "<button type='button' class='btn btn-outline-primary ms-1'><i class='ti ti-edit'></i></button>" : "";
                ?>
                  
                </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?=$data['nama']?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?=$data['email']?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Telepon</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?=$data['telepon']?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?=$data['alamat']?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="photo" tabindex="-1" aria-labelledby="photoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="<?=BURL?>/profile/updateImage/<?=$data['username']?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="photoLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center mb-3" id="preview">
          <img src="<?=IMG?>/users/<?= ($_SESSION['user']['image']) ? $_SESSION['user']['image'] : 'user-1.jpg' ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height: 150px;">
        </div>
        <div class="">
          <input class="form-control" type="file" id="imageUpload" name="imageUpload">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php require_once(DFOOT); ?>