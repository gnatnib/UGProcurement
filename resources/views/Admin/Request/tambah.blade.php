<!-- MODAL TAMBAH REQUEST -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Request Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tanggal Request</label>
                    <input type="text" class="form-control datepicker" name="tanggal_request" placeholder="Pilih Tanggal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="saveRequest()">Simpan</button>
            </div>
        </div>
    </div>
</div>

// Fungsi untuk membuka modal tambah
function addRequest() {
    // Reset form
    $('input[name="tanggal_request"]').val('');
    
    // Initialize datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
    
    // Show modal
    $('#modal-tambah').modal('show');
}

// Fungsi untuk menyimpan request
function saveRequest() {
    let tanggal = $('input[name="tanggal_request"]').val();
    
    // Validasi
    if (!tanggal) {
        alert('Tanggal harus diisi!');
        return;
    }

    $.ajax({
        url: '/admin/request-barang/store',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            tanggal: tanggal
        },
        success: function(response) {
            if (response.success) {
                $('#modal-tambah').modal('hide');
                alert('Request berhasil ditambahkan!');
                table.ajax.reload();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('Terjadi kesalahan!');
        }
    });
}