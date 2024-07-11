<?php foreach (Functions::categories() as $ctg) { ?>
  <div class="col-3 px-2">
    <a href="<?=BURL?>/dashboard/<?=$ctg['id']?>" class="card col-12" onMouseOver="this.style.backgroundColor='#eee'" onMouseOut="this.style.backgroundColor='#fff'" style="transition: 0.2s;">
      <div class="card-body d-flex flex-column align-items-center">
        <i class="h1 ti ti-packages"></i>
        <h4 class="m-0"><?=$ctg['nama']?></h4>
      </div>
    </a>
  </div>
<?php } ?>