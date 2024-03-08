
<!-- Add DataTables CSS link -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Add DataTables JS link -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="container">
    <div class="form-container">
        <h2>User's Form</h2>
        <form id="myForm" method="post" action="{{ route('postdata') }}">
            @csrf
            <!-- Your form fields go here -->

            <button type="button" onclick="submitForm()">SUBMIT</button>
        </form>
    </div>
    <br><br>

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

<script>
    $(document).ready(function () {
        // Initialize DataTable
        $('#formTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('datatable') }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'f_name', name: 'f_name' },
                { data: 'number', name: 'number' },
                { data: 'address', name: 'address' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        // Handle Delete Action
        $('#formTable').on('click', '.delete-btn', function () {
            // Your delete action logic
        });
    });
</script>

