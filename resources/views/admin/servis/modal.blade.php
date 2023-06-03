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
                        <label for="nomor_antrian" class="form-label">Antrian</label>
                        <select class="form-select" aria-label="Default select example" id="nomor_antrian"
                            name="nomor_antrian">
                            @foreach ($antrian as $item)
                                <option value="{{ $item->id }}">{{ $item->nomor }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <select class="form-select" aria-label="Default select example" id="nama_pelanggan"
                            name="nama_pelanggan">
                            @foreach ($antrian as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Mekanik</label>
                        <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_id" class="form-label">Jenis Servis</label>
                        <select class="form-select" aria-label="Default select example" id="jenis_id" name="jenis_id">
                            @foreach ($data as $item)
                                <option value="{{ $item->jenis_id }}">{{ $item->jenis_id }}</option>
                            @endforeach
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
