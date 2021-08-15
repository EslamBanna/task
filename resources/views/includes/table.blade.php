<div class="container box-table">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @isset($users)
                @foreach ($users as $user)
                <tr>
                    <th scope="row"> {{$user->id}}</th>
                    <td>{{ $user ->name}}</td>
                </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
