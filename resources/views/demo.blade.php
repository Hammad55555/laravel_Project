<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Corrected typo in 'align-items' property */
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>User's Form</h2>
        <form id="myForm" action="#">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="f_name">Father's Name:</label>
            <input type="text" name="f_name" required>

            <label for="number">Number:</label>
            <input type="text" name="number" required>

            <label for="address">Address:</label>
            <textarea name="address" rows="4" required></textarea>
            <button type="button" onclick="submitForm()">SUBMIT</button>
        </form>
    </div>
    <br><br>

    <script>
       function submitForm() {
    var formData = $('#myForm').serialize();

    $.ajax({
        type: 'POST',
        url: $('#myForm').attr('action'),
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Form data saved successfully',
            });
            console.log(response);
            location.reload();
        },
        error: function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred while saving the form data',
            });
            console.log(error);
        }
    });
}

    </script>

    <div>
        <table class="table table-hover" id="formTable">
            <thead class="thead-dark table table-striped table-hover">
                <tr>
                    <th scope="col" style="font-weight: bold;">Name</th>
                    <th scope="col" style="font-weight: bold;">Father Name</th>
                    <th scope="col" style="font-weight: bold;">Mobile Number</th>
                    <th scope="col" style="font-weight: bold;">Address</th>
                    <th scope="col" style="font-weight: bold;">Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <div>
        <button id="downloadExcel">Download to Excel</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="updateForm">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="formid">

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="f_name">Father's Name:</label>
                        <input type="text" id="f_name" name="f_name" required>

                        <label for="number">Number:</label>
                        <input type="text" id="number" name="number" required>

                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="editModalSaveBtn"
                            class="btn btn-primary editModalSaveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#formTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('datatable') }}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'f_name',
                        name: 'f_name'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<button class="btn btn-warning edit-btn" data-toggle="modal" data-target="#exampleModal" data-id="' +
                                row.id + '">Edit</button>' +
                                '<button class="btn btn-danger delete-btn" data-id="' + row.id +
                                '">Delete</button>';

                        }
                    },
                ]
            });

            $('#formTable').on('click', '.edit-btn', function() {
                var formId = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '/edit-record/' + formId,
                    success: function(response) {


                        $('#formid').val(response.id);

                        $('#name').val(response.name);
                        $('#f_name').val(response.f_name);
                        $('#number').val(response.number);
                        $('#address').val(response.address);

                        // Additional code to handle other fields if needed
                        // $('#field3').val(response.field3);
                        // ...

                        // Show the form or perform other actions as needed
                        $('#yourFormModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: error.error
                        });
                    }
                });
            });


            // Handle Delete Action
            $('#formTable').on('click', '.delete-btn', function() {
                var formId = $(this).data('id');

                // Show a confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the DELETE request
                        $.ajax({
                            type: 'DELETE',
                            url: '/delete-record/' + formId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // Reload DataTable after successful deletion
                                $('#formTable').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The record has been deleted.',
                                });
                            },
                            error: function(error) {
                                console.log(error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: error.error
                                });
                            }
                        });
                    }
                });
            });
            //  $('#formTable').on('click', '.delete-btn', function () {
            //     var formId = $(this).data('id');

            //     // Show a confirmation dialog using SweetAlert2
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: 'You won\'t be able to revert this!',
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#d33',
            //         cancelButtonColor: '#3085d6',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             // Perform the DELETE request
            //             $.ajax({
            //                 type: 'DELETE',
            //                 url: '/delete-record/' + formId,
            //                 headers: {
            //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                 },
            //                 success: function (response) {
            //                     // Reload DataTable after successful deletion
            //                     $('#formTable').DataTable().ajax.reload();
            //                     Swal.fire({
            //                         icon: 'success',
            //                         title: 'Deleted!',
            //                         text: 'The record has been deleted.',
            //                     });
            //                 },
            //                 error: function (error) {
            //                     console.log(error);
            //                     Swal.fire({
            //                         icon: 'error',
            //                         title: 'Error!',
            //                         text: error.error
            //                     });
            //                 }
            //             });
            //         }
            //     });
            // });



        });
        $('#downloadExcel').on('click', function() {
            // Redirect to the export route
            window.location.href = '{{ route('exportToExcel') }}';
        });

        $('#updateForm').on('click', '.editModalSaveBtn', function() {
            console.log('update code');
            // Get the serialized form data, including the CSRF token
            var formData = $('#updateForm').serialize();
            var formId = $('#formid').val();
            // Perform the update request
            $.ajax({
                type: 'POST',
                url: '/update-record/' + formId, // Include the record ID in the URL
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update!',
                        text: 'The record has been Updated.',
                    });
                    // Close the modal
                    $('#exampleModal').modal('hide');
                    // Reload the page after a successful update
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update record.'
                    });
                }
            });

        });
    </script>

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
