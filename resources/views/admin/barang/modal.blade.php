<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="formID">
                    @csrf
                    <input type="hidden" name="data_id" id="data_id">


                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            placeholder="Ganti Oli">
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Nama Servis</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="10000">
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
