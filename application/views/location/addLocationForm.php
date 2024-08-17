<div class="container">
  <div class="row mt-5">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">
      Form Tambah Lokasi
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group mt-2">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="namaLokasi">
          </div>
          <div class="form-group mt-2">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota">
          </div>
          <div class="form-group mt-2">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi">
          </div>
          <div class="form-group mt-2">
            <label for="negara">Negara</label>
            <input type="text" class="form-control" id="negara">
          </div>
          <button type="button" class="btn btn-primary my-4">Submit</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   $(function () {
       $('#datetimepicker6').datetimepicker();
       $('#datetimepicker7').datetimepicker({
   useCurrent: false //Important! See issue #1075
   });
       $("#datetimepicker6").on("dp.change", function (e) {
           $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
       });
       $("#datetimepicker7").on("dp.change", function (e) {
           $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
       });
   });
</script>