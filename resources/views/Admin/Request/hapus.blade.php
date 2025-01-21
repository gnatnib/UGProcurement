<!-- MODAL HAPUS -->
<div class="modal fade" id="modaldemo8-delete">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Hapus Request Barang</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="request_id">
                <p>Apakah Anda yakin ingin menghapus <span id="vrequest"></span>?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary d-none" id="btnLoader" type="button" disabled="">
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
                <a href="javascript:void(0)" onclick="submitFormHapus()" id="btnHapus" class="btn btn-danger">Hapus <i class="fe fe-trash"></i></a>
                <a href="javascript:void(0)" class="btn btn-light" data-bs-dismiss="modal">Batal <i class="fe fe-x"></i></a>
            </div>
        </div>
    </div>
</div>

@section('formHapusJS')
<script>
    function submitFormHapus() {
        const id = $("input[name='request_id']").val();
        
        $.ajax({
            type: 'POST',
            url: "{{ route('request-barang.delete') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                request_id: id
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    $('#modaldemo8-delete').modal('hide');
                    swal({
                        title: "Berhasil dihapus!",
                        type: "success"
                    });
                    table.ajax.reload(null, false);
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error!",
                    text: "Terjadi kesalahan saat menghapus data",
                    type: "error"
                });
            }
        });
    }
</script>
@endsection