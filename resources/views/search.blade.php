<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form method="GET" action="{{ route('search') }}">
        <input type="text" name="query" placeholder="Search name/designation/department" value="{{ request('query') }}">
        <button type="submit">Search</button>
    </form>

    <h2>Users</h2>
    <ul id="users-list">
        @foreach($users as $user)
            <li data-name="{{ $user->name }}" data-department="{{ $user->department->name }}" data-designation="{{ $user->designation->name }}">
                {{ $user->name }} - {{ $user->designation->name }} - {{ $user->department->name }}
            </li>
        @endforeach
    </ul>

    <h2>Designations</h2>
    <ul id="designations-list">
        @foreach($designations as $designation)
            <li data-name="{{ $designation->name }}">{{ $designation->name }}</li>
        @endforeach
    </ul>

    <h2>Departments</h2>
    <ul id="departments-list">
        @foreach($departments as $department)
            <li data-name="{{ $department->name }}">{{ $department->name }}</li>
        @endforeach
    </ul>

    <script>
        $(document).ready(function() {
            $('input[name="query"]').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();

                // Filter Users
                $('#users-list li').each(function() {
                    var name = $(this).data('name').toLowerCase();
                    var department = $(this).data('department').toLowerCase();
                    var designation = $(this).data('designation').toLowerCase();
                    
                    if (name.includes(searchTerm) || department.includes(searchTerm) || designation.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Filter Designations
                $('#designations-list li').each(function() {
                    var name = $(this).data('name').toLowerCase();
                    if (name.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Filter Departments
                $('#departments-list li').each(function() {
                    var name = $(this).data('name').toLowerCase();
                    if (name.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
