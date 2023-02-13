<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],


        });

        if ($.fn.dataTable.isDataTable('#users-table')) {
            table = $('#users-table').DataTable();
        } else {
            table = $('#users-table').DataTable({
                "ajax": "{{ route('users.index') }}",
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "username"
                    },
                    {
                        "data": "role"
                    },
                    {
                        "data": "action"
                    },
                ]
            });
        }



        $('#btnADD').click(function() {
            $('#btnSave').html('Simpan');
            $('#data_id').val('');
            $('#formID').trigger("reset");
            $('#modalHeading').html("Tambah Data User");
            // $('#modalAyamMasuk').modal('show');
        });

        $('body').on('click', '.edit', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btnSave').html('Update Data')

            var data_id = $(this).data('id');

            $.get("{{ route('users.index') }}" + '/' + data_id + '/edit', function(data) {
                console.log("data id = " + data.id);
                $('#modalHeading').html("Edit User");
                $('#btnSave').val("edit-data");
                $('#basicModal').modal('show');
                $('#data_id').val(data_id);
                $('#name').val(data.name);
                $('#username').val(data.username);
                $('#password').val('');
                $('#role').val(data.role);

            })

        });

        $('#btnSave').click(function(e) {
            // console.log($('#formID').serialize());
            e.preventDefault();
            $(this).html('Sending..');
            $.ajax({
                data: $('#formID').serialize(),
                url: "{{ route('users.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    $('#formID').trigger("reset");
                    $('#basicModal').modal('hide');
                    $('.modal-backdrop').remove();

                    if (data.status == 'success') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();

                        })
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data gagal ditambahkan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        });



        $('body').on('click', '.delete', function() {

            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang d dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('users.store') }}" + '/' + id,
                        dataType: 'json',

                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                table.draw();
                            })
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Data gagal dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })

                }
            })
        });
    });
</script>
