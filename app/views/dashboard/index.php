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
          <?php require_once(COMP."/dashboard/menuCategory.php"); ?>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="card overflow-hidden">
                <div class="card-body">
                  <h3 class="pb-3 mb-3 border-2 border-bottom border-dark border-solid">Detail penjualan</h3>
                  <form action="" method="post">
                    <div class="pb-3 mb-3 border-2 border-bottom border-dark border-solid">
                      <label class="form-label"><i class="ti ti-package me-2"></i>Item produk (satuan)</label>
                      <div class="ps-3 d-flex align-items-center">
                        <input type="number" class="form-control p-2" style="width: 16%;">
                        <i class="ti ti-x mx-2"></i>
                        <input type="number" class="form-control p-2 flex-grow-1" style="width: 16%;" disabled>
                        <i class="ti ti-equal mx-2"></i>
                        <input type="number" class="form-control p-2 flex-grow-1" style="width: 16%;" disabled>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Pembayaran</label>
                      <input type="test" class="form-control" step="1000" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Id Member</label>
                      <input type="test" class="form-control" step="1000" required>
                    </div>
                    <button type="submit" class="btn btn-success col-12">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once(DCOPY); ?>
    </div>
  </div>
</div>

<?php require_once(DFOOT); ?>