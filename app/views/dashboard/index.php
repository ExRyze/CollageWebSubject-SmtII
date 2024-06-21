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
          <div class="card col-3">
            <div class="card-body">
              
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body">

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