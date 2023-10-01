<div class="container">
    <h1>User Behavior Segmentation</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Login Segment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userSegmentation as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->login_segment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>