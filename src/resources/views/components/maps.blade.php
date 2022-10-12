@props(['placeholder'])
@if (\IyiCode\App\Services\GoogleMaps::isAccepted())
    {{ $slot }}
@else
    @isset($placeholder)
        {{ $placeholder }}
    @else
        <div></div>
    @endisset
@endif
