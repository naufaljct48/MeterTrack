<div class="col-xl mb-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body">

            <table id="listPemakaian" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Created At</th>
                        <th>Pelanggan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
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
                <h5 class="modal-title" id="modalDetailLabel">Detail Pemakaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID Pelanggan:</strong> <span id="detailId"></span></p>
                <p><strong>Nama Pelanggan:</strong> <span id="detailNama"></span></p>
                <p><strong>Tgl Pengajuan:</strong> <span id="detailPengajuan"></span></p>
                <p><strong>Bulan:</strong> <span id="detailBulan"></span></p>
                <p><strong>Tahun:</strong> <span id="detailTahun"></span></p>
                <p><strong>Volume:</strong> <span id="detailVolume"></span></p>
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
        listPemakaian = $('#listPemakaian').DataTable({
            responsive: true,
            "destroy": true,
            "processing": true,
            "serverSide": false,
            "order": [],
            "ajax": {
                url: '<?php echo base_url() ?>Pelanggan/listUsage',
                type: 'GET',
            },
            "columnDefs": [{
                    "targets": [0, 2, 3, 4, 5],
                    "className": "text-center"
                },
                {
                    "targets": [5],
                    "orderable": false
                }
            ]
        });
    });

    function detilPemakaian(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Pelanggan/detilPemakaian') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $('#detailId').text(response.data.id_pelanggan);
                    $('#detailNama').text(response.data.nama);
                    $('#detailPengajuan').text(response.data.created_at);
                    $('#detailBulan').text(response.data.bulan);
                    $('#detailTahun').text(response.data.tahun);
                    $('#detailVolume').text(response.data.volume);

                    $('#modalDetail').modal('show');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.message
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal mengambil data detail pemakaian.'
                });
            }
        });
    }
</script>