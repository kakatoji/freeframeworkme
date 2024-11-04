<div class="container">
  <div class="rows">
    <div class="col">
      <div class="card w-75 mb-3">
      <div class="card-body">
      <h5 class="card-title"><?= $data['mbr']["nama"];?></h5>
      <p class="text-end"><?= $data["mbr"]["nik"];?></p>
      <i class="icofont-email">Email</i>
      <p class="text-end"><?= $data["mbr"]["email"];?></p>
     <i class="icofont-file-php">php</i> <p class="text-end"><?= $data["mbr"]["skil"];?></p>
      <a href="<?= BASEURL;?>/member" class="btn btn-primary">kembali</a>
  </div>
</div>
    </div>
  </div>
</div>