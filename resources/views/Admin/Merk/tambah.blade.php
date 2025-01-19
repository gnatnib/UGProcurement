<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Merk</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="jenisbarang" class="form-label">Jenis Barang <span class="text-danger">*</span></label>
                    <select name="jenisbarang" class="form-control select2" required>
                        <option value="">Pilih Jenis Barang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="merk" class="form-label">Nama Merk <span class="text-danger">*</span></label>
                    <input type="text" name="merk" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="ket" class="form-label">Keterangan</label>
                    <textarea name="ket" class="form-control" rows="4"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">Simpan <i
                        class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i
                        class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
@endsection

@section('formTambahJS')
    <script>
        $(document).ready(function() {
            // Inisialisasi select2
            $("select[name='jenisbarang']").select2({
                dropdownParent: $("#modaldemo8"),
                width: '100%'
            });
            
            loadJenisBarang();
        });

        function loadJenisBarang() {
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/jenisbarang/get-data') }}", // Sesuaikan dengan route Anda
                beforeSend: function() {
                    $("select[name='jenisbarang']").html('<option value="">Loading...</option>');
                },
                success: function(data) {
                    let html = '<option value="">Pilih Jenis Barang</option>';
                    data.forEach(function(item) {
                        html += `<option value="${item.jenisbarang_id}">${item.jenisbarang_nama.replace(/_/g, ' ')}</option>`;
                    });
                    $("select[name='jenisbarang']").html(html);
                    $("select[name='jenisbarang']").trigger('change');
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    // Reset select dan tampilkan pesan error
                    $("select[name='jenisbarang']").html('<option value="">Pilih Jenis Barang</option>');
                    validasi('Gagal memuat data jenis barang', 'error');
                }
            });
        }

        function checkForm() {
            const jenisbarang = $("select[name='jenisbarang']").val();
            const merk = $("input[name='merk']").val();
            setLoading(true);
            resetValid();

            if (jenisbarang == "") {
                validasi('Jenis Barang wajib di pilih!', 'warning');
                $("select[name='jenisbarang']").addClass('is-invalid');
                setLoading(false);
                return false;
            }

            if (merk == "") {
                validasi('Nama Merk wajib di isi!', 'warning');
                $("input[name='merk']").addClass('is-invalid');
                setLoading(false);
                return false;
            }

            submitForm();
        }

        function submitForm() {
            const jenisbarang = $("select[name='jenisbarang']").val();
            const merk = $("input[name='merk']").val();
            const ket = $("textarea[name='ket']").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('merk.store') }}",
                enctype: 'multipart/form-data',
                data: {
                    jenisbarang_id: jenisbarang,
                    merk: merk,
                    ket: ket,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#modaldemo8').modal('toggle');
                    swal({
                        title: "Berhasil ditambah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    setLoading(false);
                    validasi('Gagal menyimpan data', 'error');
                }
            });
        }

        function resetValid() {
            $("select[name='jenisbarang']").removeClass('is-invalid');
            $("input[name='merk']").removeClass('is-invalid');
        }

        function reset() {
            resetValid();
            $("select[name='jenisbarang']").val('').trigger('change');
            $("input[name='merk']").val('');
            $("textarea[name='ket']").val('');
            setLoading(false);
        }

        function setLoading(bool) {
            if (bool == true) {
                $('#btnLoader').removeClass('d-none');
                $('#btnSimpan').addClass('d-none');
            } else {
                $('#btnSimpan').removeClass('d-none');
                $('#btnLoader').addClass('d-none');
            }
        }

        function validasi(judul, status) {
            swal({
                title: judul,
                type: status,
                confirmButtonText: "Ok"
            });
        }
    </script>
@endsection