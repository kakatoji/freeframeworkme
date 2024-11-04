
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Seting your profile</h1>
                    <!-- views/upload_form.php -->
                  <form action="<?= BASEURL;?>/users/store" method="post" enctype="multipart/form-data">
                      <label for="photo">Pilih Foto:</label>
                      <input type="file" name="photo" id="photo" accept="image/*" required>
                      <button type="submit">Upload</button>
                  </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->