<div class="container">
  <div class="row mt-5">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">
      Form Tambah Proyek
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group mt-2">
            <label for="namaProyek">Nama Proyek</label>
            <input type="text" class="form-control" id="namaProyek">
          </div>
          <div class="form-group mt-2">
            <label for="client">Client</label>
            <input type="text" class="form-control" id="client">
          </div>
          <div class="form-group mt-2">
            <label for="tanggalMulai">Tanggal Mulai</label>
            <input type="datetime-local" id="tanggalMulai" name="tanggalMulai" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="tanggalSelesai">Tanggal Selesai</label>
            <input type="datetime-local" id="tanggalSelesai" name="tanggalSelesai" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="pimpinanProyek">Pimpinan Proyek</label>
            <input type="text" class="form-control" id="pimpinanProyek">
          </div>
          <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan">
          </div>
          <div class="form-group mt-2">
            <label for="tanggalSelesai">Lokasi</label>
            <select class="form-select mb-3" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
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