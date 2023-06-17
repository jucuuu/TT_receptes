@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="z-30 fixed top-0 transform bg-laravel left-1/2 transform -translate-x-1/2 text-sky-500 px-48 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif