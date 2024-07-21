<div class="row">
  <div class="col-lg-12">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h3 class="pb-3 mb-3 border-2 border-bottom border-dark border-solid">Detail penjualan</h3>
        <form action="<?=BURL?>/penjualan/insert" method="post">
          <input type="hidden" name="adminId" value="<?=$_SESSION['user']['id']?>">
          <div class="pb-3 mb-3 border-2 border-bottom border-dark border-solid">
            <?php if(isset($_SESSION['sales'])) {foreach ($_SESSION['sales'] as $i => $sales) { ?>
              <div class="mb-2">
                <div class="d-flex align-items-baseline">
                  <i class="ti ti-package me-2"></i>
                  <label class="form-label flex-grow-1"><?=$sales['item']['namaKategori']?> - <?=$sales['item']['namaItem']?> (<?=$sales['item']['satuan']?>)</label>
                  <a href="<?=BURL?>/dashboard/unset/<?=$i?>"><i class="ti ti-x ms-2"></i></a>
                </div>
                <div class="ps-3 d-flex align-items-center">
                  <input type="text" class="form-control p-2" style="width: 16%;" disabled value="<?=$sales['qty']?>">
                  <i class="ti ti-x mx-2"></i>
                  <input type="text" class="form-control p-2 flex-grow-1" style="width: 16%;" disabled value="<?=$sales['item']['hargaSatuan']?>">
                  <i class="ti ti-equal mx-2"></i>
                  <input type="text" class="form-control p-2 flex-grow-1" style="width: 16%;" disabled value="<?=$sales['sum']?>">
                </div>
              </div>
            <?php }} ?>
          </div>
          <div class="mb-3">
            <label class="form-label">Total</label>
            <input readonly type="test" name="total" class="form-control" value="<?=Functions::sumSales();?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Pembayaran *</label>
            <input type="number" name="bayar" class="form-control" min="0" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Id Member</label>
            <input type="number" name="memberId" class="form-control" min="0">
          </div>
          <button type="submit" class="btn btn-success col-12">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>