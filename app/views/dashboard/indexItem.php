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
        <div class="col-lg-8 d-flex align-items-strech">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <form class="card-body d-flex" method="get" action="<?=BURL?>/dashboard/item">
                  <a class="btn btn-warning me-4" href="<?=BURL?>/dashboard">Back</a>
                  <input type="text" class="form-control grow-1" id="search" name="search" value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>">
                  <button type="submit" class="btn btn-primary ms-4">Search</button>
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
                        <th>Harga</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $i => $item) { ?>
                        <tr>
                          <td><?= $item['namaKategori'] ?></td>
                          <td><?= $item['namaItem'] ?></td>
                          <td><?= $item['hargaSatuan'] ?> / <?= $item['satuan'] ?></td>
                          <td>
                            <a class="btn btn-outline-info" data-bs-toggle='modal' data-bs-target='#beli<?=$item['id']?>'>Select</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kategori</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <?php require_once(COMP."/dashboard/asideCheckout.php"); ?>
        </div>
      </div>
      <?php require_once(DCOPY); ?>
    </div>
  </div>
</div>

<!-- Modals -->
<?php foreach ($data as $i => $item) { ?>
  <div class="modal fade" id="beli<?=$item['id']?>" tabindex="-1" aria-labelledby="dataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="<?=BURL?>/dashboard/set" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="photoLabel">Data kategori produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$item['id']?>">
          <input type="hidden" name="namaKategori" value="<?=$item['namaKategori']?>">
          <input type="hidden" name="namaItem" value="<?=$item['namaItem']?>">
          <input type="hidden" name="satuan" value="<?=$item['satuan']?>">
          <input type="hidden" name="hargaSatuan" value="<?=$item['hargaSatuan']?>">
          <div class="mb-3">
            <label for="kategoriId" class="form-label">Kategori produk</label>
            <select disabled id="kategoriId" class="form-select">
              <option selected disabled hidden></option>
              <?php foreach (Functions::categories() as $ctg) { ?>
                <option value="<?=$ctg['id']?>" <?=($ctg['nama'] === $item['namaKategori'])?"selected":""?>><?=$ctg['nama']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="namaItem" class="form-label">Nama item produk</label>
            <input disabled type="test" class="form-control" id="namaItem" value="<?=$item['namaItem']?>">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input disabled type="test" class="form-control" id="harga" value="<?= $item['hargaSatuan'] ?> / <?= $item['satuan'] ?>">
          </div>
          <div class="mb-3">
            <label for="qty" class="form-label">Input Pembalian (<?= $item['satuan'] ?>)</label>
            <input type="number" min="0" class="form-control" id="qty" name="qty">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancle</button>
          <button type="submit" name="input" value="input" class="btn btn-info">Input</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>

<?php require_once(DFOOT); ?>