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
    <h2 class="page-header">Add Admin</h2>
    <form action="/admin/create" method='post'>
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <table class="table table-hover">
        @if(count($errors))
         <ul class="alert alert-danger">
             @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
         </ul>
        @endif
        <tr>
            <td>Name</td>
            <td>: <input type='text' name='name' value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''?>"></td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>: <input type='text' name='fullname'></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <input type='text' name='email'></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>: <input type='text' name='phone'></td>
        </tr>
        <tr>        
            <td colspan = '8'>
                <input class="btn btn-md btn-primary" type = 'submit' value = "Save"/>
            </td>
        </tr>
        </table>
    </form>
    </div>
</div>
</body>
</html>