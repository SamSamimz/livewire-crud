<div>
    @if (session()->has('message')) 
    <div class="alert alert-success text-center">{{session('message')}}</div>
@endif
<h2 class="text-center py-2">This is Index Page of Livewire CRUD</h2>
</div>
