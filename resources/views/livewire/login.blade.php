<div>
    <div class="col-6 mx-auto">

        <div class="bg-light px-4 py-3 rounded">
            <h2 class="text-center py-2">Login page</h2>
            @if (session()->has('message'))
                <div class="alert alert-danger text-center">{{session('message')}}</div>
            @endif
            <form wire:submit.prevent='login'>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="text" wire:model.live='email' id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" wire:model.live='password' id="password" class="form-control">
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-danger" type="submit">Login</button>
                <a href="{{route('register')}}" wire:navigate>Don't have an account?</a>
            </div>
        </form>
        
        </div>
        
    </div>
</div>