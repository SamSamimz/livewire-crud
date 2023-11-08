<div>
    <div class="col-6 mx-auto">

        <div class="bg-light px-4 py-3 rounded">
            <h2 class="text-center py-2">Register page</h2>
            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{session('message')}}</div>
            @endif
            <form wire:submit.prevent='register'>
            <div class="mb-3">
                <label for="name" class="form-label">Name :</label>
                <input type="text" wire:model.live='name' name="name" id="name" class="form-control">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" wire:model.live='email' name="email" id="email" class="form-control">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" wire:model.live='password' name="password" id="password" class="form-control">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password :</label>
                <input type="password" wire:model.live='password_confirmation' name="password_confirmation" id="password" class="form-control">
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-danger" type="submit">Register</button>
                <a href="{{route('login')}}" wire:navigate>Already have an account?</a>
            </div>
        </form>
        
        </div>
        
    </div>
</div>