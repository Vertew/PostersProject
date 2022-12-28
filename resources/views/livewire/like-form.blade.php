@push('styles')
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
@endpush

<p style='margin: 0px' >

{{ $likes }} Likes <button wire:click="increment">Like</button>

</p>
