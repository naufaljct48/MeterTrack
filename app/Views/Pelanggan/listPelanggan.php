<div class="col-xl mb-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body">

            <table id="listPelanggan" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th style="width: 5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID Pelanggan:</strong> <span id="detailId"></span></p>
                <p><strong>Nama:</strong> <span id="detailNama"></span></p>
                <p><strong>Alamat:</strong> <span id="detailAlamat"></span></p>
                <p><strong>Telepon:</strong> <span id="detailTelepon"></span></p>
                <p><strong>Status:</strong> <span id="detailStatus"></span></p>
            </div>
            <div class="modal-footer">
                <!-- Button for closing the modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        listPelanggan = $('#listPelanggan').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverside": true,
            "order": [],
            "ajax": {
                url: '<?php echo base_url() ?>Pelanggan/listCustomer',
                type: 'GET',
            },
            "columnDefs": [{
                    "targets": [2, 3, 4],
                    "className": "text-center"
                },
                {
                    "targets": [3], // Kolom status
                    "render": function(data, type, row) {
                        // Menambahkan badge berdasarkan status
                        if (data == 'Aktif') {
                            return '<span class="badge bg-label-success">Aktif</span>';
                        } else {
                            return '<span class="badge bg-label-danger">Tidak Aktif</span>';
                        }
                    }
                },
                {
                    "terget": [6],
                    "width": 1000
                }
            ]
        });
    });

    function detilPelanggan(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Pelanggan/detilPelanggan') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $('#detailId').text(response.data.id_pelanggan);
                    $('#detailNama').text(response.data.nama);
                    $('#detailAlamat').text(response.data.alamat);
                    $('#detailTelepon').text(response.data.telepon);

                    // Menambahkan badge status di modal
                    if (response.data.status == 1) {
                        $('#detailStatus').html('<span class="badge bg-label-success">Aktif</span>');
                    } else {
                        $('#detailStatus').html('<span class="badge bg-label-danger">Tidak Aktif</span>');
                    }

                    $('#modalDetail').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert("Gagal mengambil data detail pelanggan.");
            }
        });
    }
</script>