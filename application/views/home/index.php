<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <h3>Daftar Proyek</h3>
      <a href="<?= base_url() ?>home/form" type="button" class="btn btn-primary m-3">Tambah Proyek</a>
      
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Proyek</th>
            <th scope="col">Client</th>
            <th scope="col">Tanggal Mulai</th>
            <th scope="col">Tanggal Selesai</th>
            <th scope="col">Pimpinan Proyek</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($projects->data); $i++) : ?>
          <tr>
            <th scope="row"><?= $i+1 ?></th>
            <td><?= $projects->data[$i]->namaProyek ?></td>
            <td><?= $projects->data[$i]->client ?></td>
            <td><?= date_format(date_create($projects->data[$i]->tanggalMulai),"Y/m/d H:i:s") ?></td>
            <td><?= date_format(date_create($projects->data[$i]->tanggalSelesai),"Y/m/d H:i:s") ?></td>
            <td><?= $projects->data[$i]->pimpinanProyek ?></td>
            <td><?= $projects->data[$i]->keterangan ?></td>
            <td><?= $projects->data[$i]->lokasi->namaLokasi ?></td>
            <td><a href="" class="btn btn-warning">edit</a><a href="" class="btn btn-danger">happus</a></td>
          </tr>
          <?php endfor ?>
        </tbody>
      </table>
  </div>
</div>
