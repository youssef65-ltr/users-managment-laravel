<x-layout>
   <x-slot name="title">
        index users
    </x-slot> 
    <h1>index users</h1>
        <table id="list_users">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>created at</th>
                <th>updated at</th>
            </tr>
        @foreach ($users as $user)   
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        @endforeach    
        </table>
    
</x-layout>