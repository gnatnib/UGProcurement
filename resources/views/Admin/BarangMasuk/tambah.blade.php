<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Barang Masuk</h6><button onclick="reset()" aria-label="Close"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bmkode" class="form-label">Kode Barang Masuk <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="bmkode" readonly class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tglmasuk" class="form-label">Tanggal Permintaan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglmasuk" class="form-control datepicker-date" placeholder=""
                                min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan <span
                                    class="text-danger">*</span></label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="text" name="harga" value="0" class="form-control" readonly
                                placeholder="Harga barang akan terisi otomatis">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Total Harga</label>
                            <div id="total-harga" class="form-control-plaintext text-success fw-bold">Rp 0</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Barang <span class="text-danger me-1">*</span>
                                <input type="hidden" id="status" value="false">
                                <div class="spinner-border spinner-border-sm d-none" id="loaderkd" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" autocomplete="off" name="kdbarang"
                                    placeholder="">
                                <button class="btn btn-primary-light" onclick="searchBarang()" type="button"><i
                                        class="fe fe-search"></i></button>
                                <button class="btn btn-success-light" onclick="modalBarang()" type="button"><i
                                        class="fe fe-box"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nmbarang" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan" class="form-label">Satuan <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select form-control" id="satuan">
                                        <option value="">Pilih Satuan</option>
                                        @foreach ($satuanList as $satuan)
                                            <option value="{{ $satuan->satuan_nama }}">{{ $satuan->satuan_nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" id="jenis" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input type="text" class="form-control" id="merk" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jml" class="form-label">Jumlah Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="jml" value="0" class="form-control"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                placeholder="Masukkan jumlah barang yang diinginkan">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled>
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">
                    Simpan <i class="fe fe-check"></i>
                </a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">
                    Batal <i class="fe fe-x"></i>
                </a>
            </div>
        </div>
    </div>
</div>


@section('formTambahJS')
    <script>
        $('document').ready(function() {
            // Set the datepicker with today's date
            const today = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
            $("input[name='tglmasuk']").val(today); // Set the input value
            $('.datepicker-date').datepicker({
                autoclose: true,
                todayHighlight: true, // Highlight today's date
                format: 'yyyy-mm-dd'
            }).datepicker('update', today); // Update the datepicker to today's date
        });

        $('input[name="kdbarang"]').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                getbarangbyid($('input[name="kdbarang"]').val());
            }
        });

        function modalBarang() {
            $('#modalBarang').modal('show');
            $('#modaldemo8').addClass('d-none');
            $('input[name="param"]').val('tambah');
            resetValid();
            table2.ajax.reload();
        }

        function resetFields() {
            $("#status").val("false");
            $("#nmbarang").val('');
            $("#satuan").val('');
            $("#jenis").val('');
            validasi('Barang tidak ditemukan!', 'warning');
        }

        function calculateTotal() {
            const jumlah = parseFloat($("input[name='jml']").val()) || 0;
            const harga = parseFloat($("input[name='harga']").val()) || 0;
            const total = jumlah * harga;
            $("#total-harga").text('Rp ' + total.toLocaleString('id-ID'));
        }

        // Function to get current price from server
        function getCurrentPrice(barangKode) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ route('barang.get-price', '') }}/" + barangKode,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            resolve(response.data.harga);
                        } else {
                            reject(response.message);
                        }
                    },
                    error: function(xhr) {
                        reject('Gagal mendapatkan harga');
                    }
                });
            });
        }

        function searchBarang() {
            const kodeBarang = $('input[name="kdbarang"]').val().trim();
            if (!kodeBarang) {
                validasi('Kode barang tidak boleh kosong!', 'warning');
                return;
            }

            $("#loaderkd").removeClass('d-none');

            $.ajax({
                type: 'GET',
                url: "/admin/barang/getbarang/" + kodeBarang,
                dataType: 'json',
                success: function(data) {
                    $("#loaderkd").addClass('d-none');
                    console.log("Server response:", data);

                    if (data && data.length > 0) {
                        $("#status").val("true");
                        $("#nmbarang").val(data[0].barang_nama);
                        $("#satuan").val(data[0].satuan_nama).trigger('change');
                        $("#jenis").val(data[0].jenisbarang_nama);
                        $("#merk").val(data[0].merk_nama);

                        // Get current price from server
                        getCurrentPrice(kodeBarang)
                            .then(harga => {
                                $("input[name='harga']").val(harga);
                                calculateTotal();
                            })
                            .catch(error => {
                                console.error(error);
                                // Fallback to stored price if API fails
                                $("input[name='harga']").val(data[0].barang_harga);
                                calculateTotal();
                            });
                    } else {
                        resetFields();
                    }
                },
                error: function(xhr, status, error) {
                    $("#loaderkd").addClass('d-none');
                    resetFields();
                    console.error("Error details:", {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });
                    validasi('Terjadi kesalahan saat mencari barang: ' + error, 'error');
                }
            });
        }

        function validasi(pesan, type = 'warning') {
            swal({
                title: pesan,
                type: type
            });
        }

        $('input[name="kdbarang"]').keypress(function(event) {
            if (event.keyCode === 13) { // Enter key
                event.preventDefault();
                searchBarang();
            }
        });



        function getbarangbyid(id) {
            $("#loaderkd").removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/barang/getbarang') }}/" + id,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        $("#loaderkd").addClass('d-none');
                        $("#status").val("true");
                        $("#nmbarang").val(data[0].barang_nama);
                        $("#satuan").val(data[0].satuan_nama);
                        $("#jenis").val(data[0].jenisbarang_nama);
                    } else {
                        $("#loaderkd").addClass('d-none');
                        $("#status").val("false");
                        $("#nmbarang").val('');
                        $("#satuan").val('');
                        $("#jenis").val('');
                    }
                }
            });
        }

        function checkForm() {
            const tglmasuk = $("input[name='tglmasuk']").val();
            const today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
            const status = $("#status").val();
            const keterangan = $("textarea[name='keterangan']").val();
            const jml = $("input[name='jml']").val();
            const harga = $("input[name='harga']").val();
            const satuan = $("#satuan").val();

            setLoading(true);
            resetValid();

            if (tglmasuk == "") {
                validasi('Tanggal Permintaan wajib di isi!', 'warning');
                $("input[name='tglmasuk']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (tglmasuk < today) { // Validasi untuk memastikan tanggal tidak kurang dari hari ini
                validasi('Tanggal Permintaan tidak boleh kurang dari hari ini!', 'warning');
                $("input[name='tglmasuk']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (status == "false") {
                validasi('Barang wajib di pilih!', 'warning');
                $("input[name='kdbarang']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (keterangan == "") {
                validasi('Keterangan wajib di isi!', 'warning');
                $("textarea[name='keterangan']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (jml == "" || jml == "0") {
                validasi('Jumlah Barang wajib di isi!', 'warning');
                $("input[name='jml']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (satuan == "") {
                validasi('Satuan wajib di isi!', 'warning');
                $("#satuan").addClass('is-invalid');
                setLoading(false);
                return false;
            } else if (harga == "" || harga == "0") {
                validasi('Silahkan pilih barang terlebih dahulu!', 'warning');
                $("input[name='kdbarang']").addClass('is-invalid');
                setLoading(false);
                return false;
            } else {
                submitForm();
            }
        }

        function setTodayDate() {
            const today = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
            $("input[name='tglmasuk']").val(today);
            $('.datepicker-date').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            }).datepicker('update', today);
        }

        $('document').ready(function() {
            // Set date on initial page load
            setTodayDate();

            // Reset form when modal is hidden
            $('#modaldemo8').on('hidden.bs.modal', function() {
                reset();
            });

            // Calculate total when quantity changes
            $("input[name='jml']").on('input', calculateTotal);

            // Calculate total when price changes (manual override)
            $("input[name='harga']").on('input', calculateTotal);
        });

        // Handle harga input
        $("input[name='harga']").on('focus', function() {
            if (this.value === '0') {
                this.value = '';
            }
        });

        $("input[name='harga']").on('blur', function() {
            if (this.value === '') {
                this.value = '0';
            }
        });

        // Handle jumlah item input 
        $("input[name='jml']").on('focus', function() {
            if (this.value === '0') {
                this.value = '';
            }
        });

        $("input[name='jml']").on('blur', function() {
            if (this.value === '') {
                this.value = '0';
            }
        });

        function submitForm() {
            const bmkode = $("input[name='bmkode']").val();
            const tglmasuk = $("input[name='tglmasuk']").val();
            const kdbarang = $("input[name='kdbarang']").val();
            const keterangan = $("textarea[name='keterangan']").val();
            const jml = $("input[name='jml']").val();
            const harga = $("input[name='harga']").val();
            const satuan = $("#satuan").val(); // Get the selected satuan value

            // Show loading state
            setLoading(true);

            $.ajax({
                type: 'POST',
                url: "{{ route('barang-masuk.store') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    bmkode: bmkode,
                    tglmasuk: tglmasuk,
                    barang: kdbarang,
                    keterangan: keterangan,
                    jml: jml,
                    harga: harga,
                    satuan: satuan
                },
                dataType: 'json',
                success: function(response) {
                    setLoading(false); // Hide loading state
                    if (response.success) {
                        $('#modaldemo8').modal('hide');
                        swal({
                            title: "Berhasil ditambah!",
                            type: "success"
                        });
                        table.ajax.reload(null, false);
                        reset();
                    } else {
                        swal({
                            title: response.title || "Error!",
                            text: response.message || "Terjadi kesalahan saat menyimpan data",
                            type: response.type || "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    setLoading(false); // Hide loading state
                    const response = xhr.responseJSON;
                    swal({
                        title: response.title || "Error!",
                        text: response.message || "Terjadi kesalahan saat menyimpan data",
                        type: response.type || "error"
                    });
                }
            });
        }

        function resetValid() {
            $("input[name='tglmasuk']").removeClass('is-invalid');
            $("input[name='kdbarang']").removeClass('is-invalid');
            $("textarea[name='keterangan']").removeClass('is-invalid');
            $("input[name='jml']").removeClass('is-invalid');
        }

        function reset() {
            // Reset form fields
            resetValid();
            $("input[name='bmkode']").val('');
            $("input[name='kdbarang']").val('');
            $("textarea[name='keterangan']").val('');
            $("input[name='jml']").val('0');
            $("input[name='harga']").val('0');
            $("#nmbarang").val('');
            $("#satuan").val('').trigger('change');
            $("#jenis").val('');
            $("#merk").val('');
            $("#status").val('false');

            // Reset loading state
            setLoading(false);

            // Set today's date
            setTodayDate();
        }

        function setLoading(bool) {
            if (bool) {
                $('#btnLoader').removeClass('d-none');
                $('#btnSimpan').addClass('d-none');
            } else {
                $('#btnSimpan').removeClass('d-none');
                $('#btnLoader').addClass('d-none');
            }
        }
    </script>
@endsection
