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
      <!--  Row 1 -->
      <?php Flasher::getFlash(); ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form class="card-body d-flex" method="get" action="<?=BURL?>/dashboard/user">
              <input type="text" class="form-control grow-1" id="search" name="search" value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>">
              <button type="submit" class="btn btn-primary ms-4">Search</button>
              <a class="btn btn-success ms-4" data-bs-toggle='modal' data-bs-target='#add'>Add</a>
            </form>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <?php foreach ($data as $i => $kategori) { ?>
                <div class="col-3">
                  <div class="card">
                    <div class="card-body d-flex align-items-center">
                      <i class="h1 ti ti-packages m-0 me-3"></i>
                      <div class="d-flex flex-column flex-grow-1">
                        <h5 class="pb-2 border-2 border-bottom border-dark border-solid"><?=$kategori['nama']?> (<?=$kategori['total']?>)</h5>
                        <div class="w-100 d-flex">
                          <a type="button" href="" class="p-2 btn btn-outline-info">Details</a>
                          <a type="button" class="p-2 ms-2 btn btn-outline-warning" data-bs-toggle='modal' data-bs-target='#edit<?=$kategori['id']?>'>Edit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php require_once(DCOPY); ?>
    </div>
  </div>
</div>

<!-- Modals -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content" action="<?=BURL?>/kategori/add" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="photoLabel">Data kategori produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="namaKategori" class="form-label">Nama kategori produk</label>
          <input type="test" class="form-control" id="namaKategori" name="namaKategori">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php foreach ($data as $i => $kategori) { ?>
  <div class="modal fade" id="edit<?=$kategori['id']?>" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="<?=BURL?>/kategori/update" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="photoLabel">Data kategori produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" name="id" value="<?=$kategori['id']?>">
            <label for="namaKategori" class="form-label">Nama kategori produk</label>
            <input type="test" class="form-control" id="namaKategori" name="namaKategori" value="<?=$kategori['nama']?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit" value="delete" class="btn btn-outline-danger me-auto">Delete</button>
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
          <button type="submit" name="submit" value="update" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php require_once(DFOOT); ?>