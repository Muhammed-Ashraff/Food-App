<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>

   <table>
    <thead>
        <th>S/N</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Status</th>
    </thead>
    @php
     $num = 1;
    @endphp
    <tbody>
        <!-- displaying datas from the database in a table -->
        @foreach ( $users as $user )
        <tr>
            <td>{{$num ++}}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->status }}</td>
        </tr>
        @endforeach
    </tbody>
   </table>

    <!-- displaying data from the database in a dropdown -->
   <select>
    @foreach ($users as $user)
    <option>{{$user->first_name}} {{ $user->last_name }}</option>
    @endforeach
   </select>
    
</body>
</html>