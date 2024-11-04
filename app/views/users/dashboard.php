            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><i class="fa fa-user
                    text-success fa-xs"
                    aria-hidden="true"><div class="m-4"></div></i><?= $data[
                      "data"
                    ]["user_name"] ?></h1>
                </div>
                <hr>
                <!-- /.container-fluid -->
                <?php if (!empty($data["user"])) {
                  $warna = "success";
                  $txt = "scondary";
                  $wicon = "text-success";
                } else {
                  $warna = "warning";
                  $txt = "scondary";
                  $wicon = "text-scondary";
                } ?>
                <div class="row">
                  <div class="col">
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-<?= $warna ?> shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold
                                            text-<?= $txt ?> text-uppercase mb-1">
                                            Total Member</div>
                        <?php foreach ($data["user"] as $user): ?>
                        <div class="h5 mb-0 font-weight-bold
                        text-gray-800"><?= count($user) ?></div>
                        <?php endforeach; ?>                </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x
                                            text-<?= $warna ?>"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--card2-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold
                                            text-info text-uppercase mb-1">User
                                            vip, script obfuscator
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                         <?php foreach($data["user"] as $usr):?>
                         <div class="h5 mb-0 mr-3 font-weight-bold
                         text-gray-800"><?= count($usr);?>%</div>
                                                <div class="col">
                          <?php endforeach;?>                      </div>
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--END CARD2-->
                </div>

            </div>
            <!-- End of Main Content -->