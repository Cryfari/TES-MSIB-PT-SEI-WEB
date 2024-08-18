<div class="container">

  <?php if( $this->session->flashdata('flash')): ?>
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Data Lokasi <?= $this->session->flashdata('flash'); ?>.
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row mt-3">
    <div class="col-md-6">
      <h3>Daftar Lokasi</h3>
      <a href="<?= base_url() ?>location/form" class="btn btn-primary m-3">Tambah Lokasi</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Lokasi</th>
            <th scope="col">Kota</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Negara</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i = 0; $i < count($locations->data); $i++) : ?>
          <tr>
            <th scope="row"><?= $i+1 ?></th>
            <td><?= $locations->data[$i]->namaLokasi ?></td>
            <td><?= $locations->data[$i]->kota ?></td>
            <td><?= $locations->data[$i]->provinsi ?></td>
            <td><?= $locations->data[$i]->negara ?></td>
            <td>
              <a href="<?= base_url() ?>location/update/<?= $locations->data[$i]->id ?>" class="btn btn-warning">edit</a>
              <a href="<?= base_url() ?>location/delete/<?= $locations->data[$i]->id ?>" class="btn btn-danger" onclick="return confirm('yakin menghapus data?');">hapus</a>
            </td>
          </tr>
          <?php endfor; ?>
        </tbody>
      </table>
  </div>
</div>
