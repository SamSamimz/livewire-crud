<div>
    <div>
        <div class="d-flex align-items-center justify-content-between py-4">
            <h2 class="text-center py-2">Students List🙋‍♂️🙋‍♀️</h2>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal">Create Student</button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger text-center">
                {{ session('message') }}
            </div>
        @endif
        @if ($students->count() > 0)
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Author</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $stu)
                <tr>
                    <th scope="row">{{++$index}}</th>
                    <td>{{$stu->name}}</td>
                    <td>{{$stu->email}}</td>
                    <td>{{$stu->user->name}}</td>
                    <td><img height="40" width="60" class="rounded" src="{{asset('storage/'.$stu->image) ?? 'https://fakeimg.pl/50'}}" alt=""></td>
                    <td>
                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal"wire:click="editStudent({{$stu}})">
                            <box-icon name="edit" animation='flashing-hover' color="white"></box-icon>
                        </a>
                        <a class="btn btn-info btn-sm" color="white">
                            <box-icon name="show" animation='flashing-hover' color="white"></box-icon>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$stu}})'>
                            <box-icon name='trash' animation='flashing-hover' color="white"></box-icon>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-info text-center">
            No Students Found
        </div>
        @endif
          <div class="float-end">{{$students->links()}}</div>
    </div>

  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalLabel">{{$editing ? __("Edit Modal") : __("Create Modal")}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form wire:submit='save' enctype="multipart/form-data">
            <div class="mb-2">
                <label for="name" class="form-label">Name :</label>
                <input type="text" wire:model.defer='name' name="name" id="name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email :</label>
                <input type="text" wire:model.defer='email' name="email" id="email" class="form-control">
            </div>
            <div class="mb-2">
                <label for="phone" class="form-label">Phone :</label>
                <input type="text" wire:model.defer='phone' name="phone" id="phone" class="form-control">
            </div>
            <div class="mb-2">
                <label for="address" class="form-label">Address :</label>
                <input type="text" wire:model.defer='address' name="address" id="address" class="form-control">
            </div>
            <div class="mb-2">
                <label for="dob" class="form-label">Dob :</label>
                <input type="date" wire:model.defer='dob' name="dob" id="dob" class="form-control" min="{{ (date('Y')-25) }}-01-01" max="{{ (date('Y')-15) }}-01-01">
            </div>
            <div class="mb-2">
                <label for="gender" class="form-label">Gender :</label>
                <select name="gender" wire:model.defer='gender' id="gender" class="form-select">
                    <option value="" disabled>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="image" class="form-label">Image :</label>
                <input type="file" wire:model.defer='image' name="image" class="form-control">
            </div>
            <div>
                @if (!$editing && $image)
                    <img width="60" height="45" src="{{$image->temporaryUrl()}}" alt="Uploaded Image">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" type="button" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
        window.addEventListener('close_modal', event => {
            $('#studentModal').modal('hide');
        })
  </script>

</div>
