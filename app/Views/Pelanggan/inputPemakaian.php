<div class="col-xl mb-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body">
            <form id="formPelanggan">
                <div class="mb-6">
                    <label for="ID_PELANGGAN" class="form-label">ID Pelanggan / Nama</label>
                    <select class="select2 d-block w-100" name="ID_PELANGGAN" id="ID_PELANGGAN">
                        <option value=''>ID PELANGGAN</option>
                        <?php foreach ($id_pelanggan as $idp) : ?>
                            <option value="<?= $idp['id_pelanggan'] ?>">
                                <?= $idp['id_pelanggan'] ?> - <?= $idp['nama'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="TGL_PEMAKAIAN" class="form-label">Bulan/Tahun</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                        <input type="text" data-field="date" class="form-control dateMonth" id="TGL_PEMAKAIAN" name="TGL_PEMAKAIAN" required autocomplete="off">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="form-label" for="volume">Volume Pemakaian</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ti ti-switch-vertical"></i></span>
                        <input type="text" id="volume" name="volume" class="form-control" placeholder="0" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check me-2"></i> Simpan</button>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.dateMonth').datepicker({
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true,
            todayHighlight: true,
        });

        $('#formPelanggan').on('submit', function(e) {
            e.preventDefault();

            var id_pelanggan = $('#ID_PELANGGAN').val();
            var tgl_pemakaian = $('#TGL_PEMAKAIAN').val();
            var volume = $('#volume').val();

            if (!id_pelanggan || !tgl_pemakaian || !volume) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal',
                    text: 'Semua field harus diisi!'
                });
                return;
            }

            $.ajax({
                url: '<?= base_url('Pelanggan/tambahPemakaian') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_pelanggan: id_pelanggan,
                    tgl_pemakaian: tgl_pemakaian,
                    volume: volume
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pemakaian Ditambahkan!',
                            text: 'Data pemakaian berhasil disimpan.',
                            timer: 3000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(() => {
                            $('#formPelanggan')[0].reset();
                            $('#ID_PELANGGAN').val('').trigger('change');
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