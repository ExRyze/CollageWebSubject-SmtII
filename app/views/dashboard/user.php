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
            </form>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $i => $user) { ?>
                    <tr>
                        <th><?= $i+1 ?></th>
                        <th><?= $user['username'] ?></th>
                        <th><?= $user['nama'] ?></th>
                        <th><?= $user['email'] ?></th>
                        <th><?= $user['telepon'] ?></th>
                        <th><?= $user['createdAt'] ?></th>
                        <th><a class="btn btn-outline-danger" href="<?=BURL?>/user/remove/<?=$user['id']?>">Remove</a></th>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Created At</th>
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

<?php require_once(DFOOT); ?>