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
                        <label for="jenis" class="form-label">Jenis Servis</label>
                        <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                            <option selected>--- Pilih Jenis Servis ---</option>
                            <option value="ringan">Servis Ringan</option>
                            <option value="berat">Servis Berat</option>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label for="nama_servis" class="form-label">Nama Servis</label>
                        <input type="text" class="form-control" id="nama_servis" name="nama_servis"
                            placeholder="Ganti Oli">
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
