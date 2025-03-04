<div class="container">
  <div class="row mt-5">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">
      Form Update Proyek
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group mt-2">
            <label for="namaProyek">Nama Proyek</label>
            <input type="text" class="form-control" id="namaProyek" name="namaProyek" value="<?=$project->data->namaProyek?>">
          </div>
          <div class="form-group mt-2">
            <label for="client">Client</label>
            <input type="text" class="form-control" id="client" name="client" value="<?=$project->data->client?>">
          </div>
          <div class="form-group mt-2">
            <label for="tanggalMulai">Tanggal Mulai</label>
            <input type="datetime-local" id="tanggalMulai" name="tanggalMulai" class="form-control" required value="<?=date_format(date_create($project->data->tanggalMulai), "Y-m-d\TH:i")?>">
          </div>
          <div class="form-group mt-2">
            <label for="tanggalSelesai">Tanggal Selesai</label>
            <input type="datetime-local" id="tanggalSelesai" name="tanggalSelesai" class="form-control" required  value="<?=date_format(date_create($project->data->tanggalMulai), "Y-m-d\TH:i")?>">
          </div>
          <div class="form-group mt-2">
            <label for="pimpinanProyek">Pimpinan Proyek</label>
            <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" value="<?=$project->data->pimpinanProyek?>">
          </div>
          <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?=$project->data->keterangan?>">
          </div>
          <div class="form-group mt-2">
            <label for="tanggalSelesai">Lokasi</label>
            <select class="form-select mb-3" aria-label="Default select example" name="lokasiId">
            <?php for($i = 0 ; $i < count($locations->data) ; $i++) : ?>
              <?php if($project->data->lokasi->id == $locations->data[$i]->id) :?>
                <option value="<?= $locations->data[$i]->id ?>" selected><?= $locations->data[$i]->namaLokasi ?></option>
            <?php else :?>
              <option value="<?= $locations->data[$i]->id ?>"><?= $locations->data[$i]->namaLokasi ?></option>
            <?php endif ?>
            <?php endfor; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary my-4">Submit</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>