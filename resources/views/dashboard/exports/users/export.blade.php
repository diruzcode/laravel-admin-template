<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->completeName() }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
