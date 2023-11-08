<div>
    <div>
        <h2 class="text-center py-2">Users List🙋‍♂️🙋‍♀️</h2>
        @if (session()->has('message'))
            <div class="alert alert-danger text-center">
                {{ session('message') }}
            </div>
        @endif
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name }} <span class="text-warning">{{Auth::user()->id == $user->id ? '(current)' : null}}</span></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a class="btn {{$user->role == 'admin' ? 'btn-secondary' : 'btn-primary'}} btn-sm">Edit</a>
                        <a class="btn {{$user->role == 'admin' ? 'btn-secondary' : 'btn-danger'}} btn-sm" wire:click='delete({{$user}})'>Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <div class="float-end">{{$users->links()}}</div>
    </div>
</div>
