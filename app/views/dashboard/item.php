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
            <form class="card-body d-flex" method="get" action="<?=BURL?>/dashboard/item">
              <a class="btn btn-warning me-4" href="<?=BURL?>/dashboard/item">All</a>
              <input type="text" class="form-control grow-1" id="search" name="search" value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>">
              <button type="submit" class="btn btn-primary ms-4">Search</button>
              <a class="btn btn-success ms-4" data-bs-toggle='modal' data-bs-target='#add'>Add</a>
            </form>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Item</th>
                        <th>Satuan</th>
                        <th>Harga per-satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $i => $item) { ?>
                    <tr>
                      <th><?= $item['namaKategori'] ?></th>
                      <th><?= $item['namaItem'] ?></th>
                      <th><?= $item['satuan'] ?></th>
                      <th><?= $item['hargaSatuan'] ?></th>
                      <th>
                        <a class="btn btn-outline-warning" data-bs-toggle='modal' data-bs-target='#edit<?=$item['id']?>'>Update</a>
                        <a class="btn btn-outline-danger" href="<?=BURL?>/item/remove/<?=$item['id']?>">Delete</a>
                      </th>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Item</th>
                        <th>Satuan</th>
                        <th>Harga per-satuan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
              </table>
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
    <form class="modal-content" action="<?=BURL?>/item/add" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="photoLabel">Data kategori produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="ctgId" value="<?=$_POST['ctgId']?>">
        <div class="mb-3">
          <label for="kategoriId" class="form-label">Kategori produk</label>
          <select id="kategoriId" name="kategoriId" class="form-select">
            <option selected disabled hidden></option>
            <?php foreach (Functions::categories() as $ctg) { ?>
              <option value="<?=$ctg['id']?>"><?=$ctg['nama']?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="namaItem" class="form-label">Nama item produk</label>
          <input type="test" class="form-control" id="namaItem" name="namaItem">
        </div>
        <div class="mb-3">
          <label for="satuan" class="form-label">Satuan penjualan</label>
          <select id="satuan" name="satuan" class="form-select">
            <option selected value="pcs">pcs</option>
            <option value="pkt">pkt</option>
            <option value="rim">rim</option>
            <option value="dus">dus</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="hargaSatuan" class="form-label">Harga per-satuan</label>
          <input type="number" min="0" class="form-control" id="hargaSatuan" name="hargaSatuan">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php foreach ($data as $i => $item) { ?>
  <div class="modal fade" id="edit<?=$item['id']?>" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="<?=BURL?>/item/update" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="photoLabel">Data kategori produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="ctgId" value="<?=$_POST['ctgId']?>">
        <input type="hidden" name="id" value="<?=$item['id']?>">
          <div class="mb-3">
            <label for="kategoriId" class="form-label">Kategori produk</label>
            <select id="kategoriId" name="kategoriId" class="form-select">
              <option selected disabled hidden></option>
              <?php foreach (Functions::categories() as $ctg) { ?>
                <option value="<?=$ctg['id']?>" <?=($ctg['nama'] === $item['namaKategori'])?"selected":""?>><?=$ctg['nama']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="namaItem" class="form-label">Nama item produk</label>
            <input type="test" class="form-control" id="namaItem" name="namaItem" value="<?=$item['namaItem']?>">
          </div>
          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan penjualan</label>
            <select id="satuan" name="satuan" class="form-select">
              <option selected value="<?=$item['satuan']?>"><?=$item['satuan']?></option>
              <option value="pcs">pcs</option>
              <option value="pkt">pkt</option>
              <option value="rim">rim</option>
              <option value="dus">dus</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="hargaSatuan" class="form-label">Harga per-satuan</label>
            <input type="number" min="0" class="form-control" id="hargaSatuan" name="hargaSatuan" value="<?=$item['hargaSatuan']?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php require_once(DFOOT); ?>