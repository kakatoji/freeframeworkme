<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(function(){
    //karena ketimpa, buat ulang untuk merubah tampilan
    $('.tombolTambahData').on('click',function(){
      $('#formModalLabel').text('Tambah data member');
      $('.modal-footer button[type=submit]').text('Tambah data');
    });
    
    $('.tampilModalUbah').on('click',function(){
      $('#formModalLabel').text('Ubah data member');
      $('.modal-footer button[type=submit]').text('Ubah data');
      $('.modal-body
      form').attr("action","http://localhost:8080/my-projek/public/member/ubah");
      const id = $(this).data('id');
      $.ajax({
        url: '<?= BASEURL ?>/member/getubah',
        data: {id: id},
        method: 'post',
        dataType: 'json',
        success: function(data){
          $('#nama').val(data.nama);
          $('#nik').val(data.nik);
          $('#email').val(data.email);
          $('#skil').val(data.skil);
          $('#id').val(data.id);
        }
      });
    });
  });
</script>
</body>
</html>
