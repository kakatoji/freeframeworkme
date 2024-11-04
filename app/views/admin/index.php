<div class="container mt-5 text-bg-secondary p-5">
  <div class="row">
    <div class="col-6-lg">
      <?= Flasher::flash(); ?>
      <form action="<?= BASEURL ?>/admin/login" method="post">
        <div class="card text-center text-bg-success">
        <div class="card-header">
          LOGIN
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="user">
            </div>
          </h5>
          <div class="card-body"><h5 class="card-title">
            <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" class="form-control"
            id="pass" placeholder="isi password">
             
            </div>
          </h5>
          </div>
        </div>
        <div class="card-footer text-body-secondary">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>