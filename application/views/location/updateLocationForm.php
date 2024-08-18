<div class="container">
  <div class="row mt-5">
    <div class="col-md-8">
    <div class="card">
      <div class="card-header">
      Form Update Lokasi
      </div>
      <div class="card-body"> 
        <form action="" method="post">
          <div class="form-group mt-2">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" value="<?=$location->data->namaLokasi?>">
            <small class="form-text text-danger"><?= form_error('namaLokasi'); ?></small>
          </div>
          <div class="form-group mt-2">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota"value="<?=$location->data->kota?>">
            <small class="form-text text-danger"><?= form_error('kota'); ?></small>
          </div>
          <div class="form-group mt-2">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi"value="<?=$location->data->provinsi?>">
            <small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
          </div>
          <div class="form-group mt-2">
            <label for="negara">Negara</label>
            <input type="text" class="form-control" id="negara" name="negara"value="<?=$location->data->negara?>">
            <small class="form-text text-danger"><?= form_error('negara'); ?></small>
          </div>
          <button type="submit" class="btn btn-primary my-4">Submit</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>