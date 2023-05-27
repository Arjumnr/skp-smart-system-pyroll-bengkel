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
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                           >
                    </div>

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Antrian</label>
                        <input type="text" class="form-control" id="nomor" name="nomor"
                           disabled>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Antrian</label>
                        <select class="form-select" aria-label="Default select example" id="status" name="status">
                            <option selected>--- Pilih Status Antrian ---</option>
                            <option value="antri">Antri</option>
                            <option value="selesai">Selesai</option>
                        </select>
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
