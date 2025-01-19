<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Merk Barang</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idmerkU">
                <!-- Tambahkan dropdown jenis barang -->
                <div class="form-group">
                    <label for="jenisbarangU" class="form-label">Jenis Barang <span class="text-danger">*</span></label>
                    <select name="jenisbarangU" class="form-control select2" required>
                        <option value="">Pilih Jenis Barang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="merkU" class="form-label">Merk Barang <span class="text-danger">*</span></label>
                    <input type="text" name="merkU" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="ketU" class="form-label">Keterangan</label>
                    <textarea name="ketU" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-success">Simpan Perubahan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
<script>
    $(document).ready(function() {
        // Inisialisasi select2 untuk form edit
        $("select[name='jenisbarangU']").select2({
            dropdownParent: $("#Umodaldemo8"),
            width: '100%'
        });
        
        // Load jenis barang saat halaman dimuat
        loadJenisBarangU();
    });

    // Tambahkan fungsi loadJenisBarangU
    function loadJenisBarangU() {
        $.ajax({
            type: 'GET',
            url: "{{ url('admin/jenisbarang/get-data') }}", // Sesuaikan dengan route Anda
            beforeSend: function() {
                $("select[name='jenisbarangU']").html('<option value="">Loading...</option>');
            },
            success: function(data) {
                let html = '<option value="">Pilih Jenis Barang</option>';
                data.forEach(function(item) {
                    html += `<option value="${item.jenisbarang_id}">${item.jenisbarang_nama.replace(/_/g, ' ')}</option>`;
                });
                $("select[name='jenisbarangU']").html(html);
                $("select[name='jenisbarangU']").trigger('change');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $("select[name='jenisbarangU']").html('<option value="">Pilih Jenis Barang</option>');
                validasi('Gagal memuat data jenis barang', 'error');
            }
        });
    }

    function checkFormU() {
        const jenisbarang = $("select[name='jenisbarangU']").val();
        const merk = $("input[name='merkU']").val();
        setLoadingU(true);
        resetValidU();

        if (jenisbarang == "") {
            validasi('Jenis Barang wajib di pilih!', 'warning');
            $("select[name='jenisbarangU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        if (merk == "") {
            validasi('Merk Barang wajib di isi!', 'warning');
            $("input[name='merkU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }
        
        submitFormU();
    }

    function submitFormU() {
        const id = $("input[name='idmerkU']").val();
        const jenisbarang = $("select[name='jenisbarangU']").val();
        const merk = $("input[name='merkU']").val();
        const ket = $("textarea[name='ketU']").val();

        $.ajax({
            type: 'POST',
            url: "{{url('admin/merk/proses_ubah')}}/" + id,
            enctype: 'multipart/form-data',
            data: {
                jenisbarang_id: jenisbarang,
                merk: merk,
                ket: ket
            },
            success: function(data) {
                swal({
                    title: "Berhasil diubah!",
                    type: "success"
                });
                $('#Umodaldemo8').modal('toggle');
                table.ajax.reload(null, false);
                resetU();
            }
        });
    }

    function resetValidU() {
        $("select[name='jenisbarangU']").removeClass('is-invalid');
        $("input[name='merkU']").removeClass('is-invalid');
        $("textarea[name='ketU']").removeClass('is-invalid');
    }

    function resetU() {
        resetValidU();
        $("input[name='idmerkU']").val('');
        $("select[name='jenisbarangU']").val('').trigger('change');
        $("input[name='merkU']").val('');
        $("textarea[name='ketU']").val('');
        setLoadingU(false);
    }

    // Update fungsi update untuk mengisi dropdown jenis barang
    function update(data) {
        $("input[name='idmerkU']").val(data.merk_id);
        $("select[name='jenisbarangU']").val(data.jenisbarang_id).trigger('change');
        $("input[name='merkU']").val(data.merk_nama.replace(/_/g, ' '));
        $("textarea[name='ketU']").val(data.merk_keterangan.replace(/_/g, ' '));
    }

    function setLoadingU(bool) {
        if (bool == true) {
            $('#btnLoaderU').removeClass('d-none');
            $('#btnSimpanU').addClass('d-none');
        } else {
            $('#btnSimpanU').removeClass('d-none');
            $('#btnLoaderU').addClass('d-none');
        }
    }
</script>
@endsection