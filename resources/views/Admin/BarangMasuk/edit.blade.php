<!-- MODAL EDIT -->
<div class="modal fade" data-bs-backdrop="static" id="Umodaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Ubah Barang Masuk</h6><button aria-label="Close" onclick="resetU()"
                    class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="idbmU">
                        <div class="form-group">
                            <label for="bmkodeU" class="form-label">Kode Barang Masuk <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="bmkodeU" readonly class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tglmasukU" class="form-label">Tanggal Permintaan <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="tglmasukU" class="form-control datepicker-date" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan <span
                                    class="text-danger">*</span></label>
                            <textarea id="keteranganU" name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hargaU" class="form-label">Harga <span class="text-danger">*</span></label>
                            <input type="text" name="hargaU" class="form-control"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                placeholder="Masukkan harga barang">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kode Barang <span class="text-danger me-1">*</span>
                                <input type="hidden" id="statusU" value="true">
                                <div class="spinner-border spinner-border-sm d-none" id="loaderkdU" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" autocomplete="off" name="kdbarangU"
                                    placeholder="">
                                <button class="btn btn-primary-light" onclick="searchBarangU()" type="button"><i
                                        class="fe fe-search"></i></button>
                                <button class="btn btn-success-light" onclick="modalBarangU()" type="button"><i
                                        class="fe fe-box"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" id="nmbarangU" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuanU" class="form-label">Satuan <span class="text-danger">*</span></label>
                                    <select class="form-select form-control" id="satuanU">
                                        <option value="">Pilih Satuan</option>
                                        @foreach ($satuanList as $satuan)
                                            <option value="{{ $satuan->satuan_nama }}">{{ $satuan->satuan_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" class="form-control" id="jenisU" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jmlU" class="form-label">Jumlah Barang <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="jmlU" class="form-control"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success d-none" id="btnLoaderU" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkFormU()" id="btnSimpanU" class="btn btn-success">Simpan
                    Perubahan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="resetU()" data-bs-dismiss="modal">Batal
                    <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formEditJS')
<script>
    $(document).ready(function () {
        // Initialize datepicker with minimum date set to today
        $('input[name="tglmasukU"]').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: new Date(), // Set minimum date to today
            todayHighlight: true
        });

        // Handle enter key on kdbarang input
        $('input[name="kdbarangU"]').keypress(function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                getbarangbyidU($(this).val());
            }
        });
    });

    function modalBarangU() {
        $('#modalBarang').modal('show');
        $('#Umodaldemo8').modal('hide');
        $('input[name="param"]').val('ubah');
        resetValidU();
        table2.ajax.reload();
    }

    function update(data) {
        resetValidU();

        $("input[name='idbmU']").val(data.bm_id);
        $("input[name='bmkodeU']").val(data.bm_kode);
        $("input[name='tglmasukU']").val(data.bm_tanggal);
        $("input[name='kdbarangU']").val(data.barang_kode);
        $("#keteranganU").val(data.keterangan);
        $("input[name='jmlU']").val(data.bm_jumlah);
        $("input[name='hargaU']").val(data.harga || '0');
        $("#satuanU").val(data.satuan).trigger('change');

        getbarangbyidU(data.barang_kode);
        $('#Umodaldemo8').modal('show');
    }

    function searchBarangU() {
        const kodeBarang = $('input[name="kdbarangU"]').val();
        if (kodeBarang) {
            getbarangbyidU(kodeBarang);
        } else {
            validasi('Kode barang tidak boleh kosong!', 'warning');
        }
        resetValidU();
    }

    function getbarangbyidU(id) {
        if (!id) return;

        $("#loaderkdU").removeClass('d-none');
        $("#statusU").val("false");

        $.ajax({
            type: 'GET',
            url: "{{ url('admin/barang/getbarang') }}/" + id,
            dataType: 'json',
            success: function (data) {
                $("#loaderkdU").addClass('d-none');

                if (data && data.length > 0) {
                    $("#statusU").val("true");
                    $("#nmbarangU").val(data[0].barang_nama);
                    $("#satuanU").val(data[0].satuan_nama);
                    $("#jenisU").val(data[0].jenisbarang_nama);
                } else {
                    validasi('Barang tidak ditemukan!', 'warning');
                    resetBarangFieldsU();
                }
            },
            error: function () {
                $("#loaderkdU").addClass('d-none');
                validasi('Gagal mengambil data barang!', 'error');
                resetBarangFieldsU();
            }
        });
    }

    function checkFormU() {
        const tglmasuk = $("input[name='tglmasukU']").val();
        const status = $("#statusU").val();
        const keterangan = $("#keteranganU").val();
        const jml = $("input[name='jmlU']").val();
        const satuan = $("#satuanU").val();

        setLoadingU(true);
        resetValidU();

        // Check if date is empty
        if (!tglmasuk) {
            validasi('Tanggal Permintaan wajib di isi!', 'warning');
            $("input[name='tglmasukU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        // Check if date is before today
        const selectedDate = new Date(tglmasuk);
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Reset time part for accurate date comparison

        if (selectedDate < today) {
            validasi('Tanggal tidak boleh kurang dari hari ini!', 'warning');
            $("input[name='tglmasukU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        if (!keterangan || keterangan.trim() === "") {
            validasi('Keterangan wajib di isi!', 'warning');
            $("#keteranganU").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        if (status === "false") {
            validasi('Barang wajib di pilih!', 'warning');
            $("input[name='kdbarangU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        if (!satuan) {
            validasi('Satuan wajib di pilih!', 'warning');
            $("#satuanU").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        if (!jml || jml === "0") {
            validasi('Jumlah Barang wajib di isi!', 'warning');
            $("input[name='jmlU']").addClass('is-invalid');
            setLoadingU(false);
            return false;
        }

        submitFormU();
    }

    function submitFormU() {
        const formData = {
            bmkode: $("input[name='bmkodeU']").val(),
            tglmasuk: $("input[name='tglmasukU']").val(),
            barang: $("input[name='kdbarangU']").val(),
            keterangan: $("#keteranganU").val(),
            jml: $("input[name='jmlU']").val(),
            satuan: $("#satuanU").val(),
            harga: $("input[name='hargaU']").val() || '0'
        };

        const idbm = $("input[name='idbmU']").val();

        $.ajax({
            type: 'POST',
            url: "/admin/barang-masuk/proses_ubah/" + idbm,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#Umodaldemo8').modal('hide');
                    swal({
                        title: "Berhasil diubah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    resetU();
                } else {
                    validasi(response.message || 'Gagal mengubah data!', 'error');
                }
                setLoadingU(false);
            },
            error: function (xhr) {
                const message = xhr.responseJSON?.message || 'Terjadi kesalahan saat mengubah data';
                swal({
                    title: "Error!",
                    text: message,
                    type: "error"
                });
                setLoadingU(false);
            }
        });
    }

    function resetValidU() {
        $('.is-invalid').removeClass('is-invalid');
    }

    function resetBarangFieldsU() {
        $("#statusU").val("false");
        $("#nmbarangU").val('');
        $("#satuanU").val('');
        $("#jenisU").val('');
    }

    function resetU() {
        resetValidU();
        resetBarangFieldsU();

        $("input[name='idbmU']").val('');
        $("input[name='bmkodeU']").val('');
        $("input[name='tglmasukU']").val('');
        $("input[name='kdbarangU']").val('');
        $("#keteranganU").val('');
        $("input[name='jmlU']").val('0');
        $("input[name='hargaU']").val('0');

        setLoadingU(false);
    }

    function setLoadingU(bool) {
        $('#btnLoaderU').toggleClass('d-none', !bool);
        $('#btnSimpanU').toggleClass('d-none', bool);
    }

    function validasi(message, type) {
        swal({
            title: type === 'success' ? 'Berhasil' : 'Peringatan',
            text: message,
            type: type
        });
    }
</script>
@endsection