<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    
    <div class="container">
        <h2 class="page-header">List of Admin</h2>
        <a  class="btn btn-md btn-primary" href="/admin/insert">New</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Is Active</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td><a href="/admin/{{ $d->id }}">{{ $d->name }}</a></td>
                    <td>{{ $d->fullname }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->phone }}</td>
                    <td>
                    @if ($d->is_active) Yes @else No @endif
                    </td>
                    <!-- <td>
                        <form method="POST" action="{{ route('content.destroy', [$d->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td> -->
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div><br>
</div>
 
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>