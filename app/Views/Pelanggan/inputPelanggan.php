<div class="col-xl mb-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body">
            <form id="formPelanggan">
                <div class="mb-6">
                    <label class="form-label" for="nama">Nama Pelanggan</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-user"></i></span>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe" />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="alamat">Alamat</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-map"></i></span>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl. Example No. 123" />
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="telepon">No Telepon</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-phone"></i></span>
                        <input type="text" id="telepon" name="telepon" class="form-control" placeholder="08xxxxxxxxx" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check me-2"></i> Simpan</button>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#formPelanggan').on('submit', function(e) {
            e.preventDefault();

            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var telepon = $('#telepon').val();

            $.ajax({
                url: '<?= base_url('Pelanggan/tambahPelanggan') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    nama: nama,
                    alamat: alamat,
                    telepon: telepon,
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pelanggan Ditambahkan!',
                            text: 'Data pelanggan berhasil disimpan.',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(() => {
                            // Reset form
                            $('#formPelanggan')[0].reset();
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Gagal',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: 'Gagal mengirim data: ' + xhr.responseText
                    });
                }
            });
        });
    });
</script>