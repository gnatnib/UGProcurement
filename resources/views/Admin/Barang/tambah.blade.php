<!-- MODAL TAMBAH -->
<div class="modal fade" data-bs-backdrop="static" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Tambah Barang</h6><button onclick="reset()" aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="kode" class="form-label">Kode Barang <span class="text-danger">*</span></label>
                            <input type="text" name="kode" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenisbarang" class="form-label">Jenis Barang</label>
                            <select name="jenisbarang" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($jenisbarang as $jb)
                                    <option value="{{$jb->jenisbarang_id}}">{{$jb->jenisbarang_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan" class="form-label">Satuan Barang</label>
                            <select name="satuan" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($satuan as $s)
                                <option value="{{$s->satuan_id}}">{{$s->satuan_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="form-label">Merk Barang</label>
                            <select name="merk" class="form-control">
                                <option value="">-- Pilih --</option>
                                @foreach ($merk as $m)
                                <option value="{{$m->merk_id}}">{{$m->merk_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="form-label">Harga Barang <span class="text-danger">*</span></label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="title" class="form-label">Foto</label>
                            <center>
                                <img src="{{url('/assets/default/barang/image.png')}}" width="80%" alt="profile-user" id="outputImg" class="">
                            </center>
                            <input class="form-control mt-5" id="GetFile" name="photo" type="file" onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg,.svg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="checkForm()" id="btnSimpan" class="btn btn-primary">Simpan <i class="fe fe-check"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" onclick="reset()" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formTambahJS')
<script>
    function checkForm() {
            // Get all form values at once
            const formValues = {
                kode: $("input[name='kode']").val(),
                nama: $("input[name='nama']").val(),
                harga: $("input[name='harga']").val()
            };

            // Validate all fields at once
            const errors = {};
            if (!formValues.kode) errors.kode = 'Kode Barang wajib di isi!';
            if (!formValues.nama) errors.nama = 'Nama Barang wajib di isi!';
            if (!formValues.harga) errors.harga = 'Harga Barang wajib di isi!';

            // If there are errors, show them
            if (Object.keys(errors).length > 0) {
                resetValid();
                Object.keys(errors).forEach(key => {
                    $(`input[name='${key}']`).addClass('is-invalid');
                    validasi(errors[key], 'warning');
                });
                return false;
            }

            // If valid, submit
            submitForm();
        }

        function submitForm() {
            setLoading(true);

            // Create FormData more efficiently
            const fd = new FormData();
            const foto = $('#GetFile')[0].files[0];

            // Add all form data at once
            const formData = {
                foto: foto,
                kode: $("input[name='kode']").val(),
                nama: $("input[name='nama']").val(),
                jenisbarang: $("select[name='jenisbarang']").val(),
                satuan: $("select[name='satuan']").val(),
                merk: $("select[name='merk']").val(),
                harga: $("input[name='harga']").val(),
                keterangan: $("textarea[name='keterangan']").val()
            };

            // Append all data
            Object.keys(formData).forEach(key => {
                if (formData[key]) fd.append(key, formData[key]);
            });

            // Add error handling and timeout
            $.ajax({
                type: 'POST',
                url: "{{route('barang.store')}}",
                data: fd,
                processData: false,
                contentType: false,
                timeout: 10000, // 10 second timeout
                success: function (data) {
                    $('#modaldemo8').modal('toggle');
                    swal({
                        title: "Berhasil ditambah!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                    reset();
                },
                error: function (xhr, status, error) {
                    swal({
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menyimpan data",
                        type: "error"
                    });
                },
                complete: function () {
                    setLoading(false);
                }
            });
        }
    function resetValid() {
        $("input[name='kode']").removeClass('is-invalid');
        $("input[name='nama']").removeClass('is-invalid');
        $("select[name='jenisbarang']").removeClass('is-invalid');
        $("select[name='satuan']").removeClass('is-invalid');
        $("select[name='merk']").removeClass('is-invalid');
        $("input[name='harga']").removeClass('is-invalid');
    };
    function reset() {
        resetValid();
        $("input[name='kode']").val('');
        $("input[name='nama']").val('');
        $("select[name='jenisbarang']").val('');
        $("select[name='satuan']").val('');
        $("select[name='merk']").val('');
        $("input[name='harga']").val('');
        $("textarea[name='keterangan']").val(''); // Reset keterangan
        $("#outputImg").attr("src", "{{url('/assets/default/barang/image.png')}}");
        $("#GetFile").val('');
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
    function fileIsValid(fileName) {
        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        var isValid = true;
        switch (ext) {
            case 'png':
            case 'jpeg':
            case 'jpg':
            case 'svg':
                break;
            default:
                this.value = '';
                isValid = false;
        }
        return isValid;
    }
    function VerifyFileNameAndFileSize() {
        var file = document.getElementById('GetFile').files[0];
        if (file != null) {
            var fileName = file.name;
            if (fileIsValid(fileName) == false) {
                validasi('Format bukan gambar!', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var content;
            var size = file.size;
            if ((size != null) && ((size / (1024 * 1024)) > 3)) {
                validasi('Ukuran Maximum 1 MB', 'warning');
                document.getElementById('GetFile').value = null;
                return false;
            }
            var ext = fileName.match(/\.([^\.]+)$/)[1];
            ext = ext.toLowerCase();
            // $(".custom-file-label").addClass("selected").html(file.name);
            document.getElementById('outputImg').src = window.URL.createObjectURL(file);
            return true;
        } else
            return false;
    }
</script>
@endsection