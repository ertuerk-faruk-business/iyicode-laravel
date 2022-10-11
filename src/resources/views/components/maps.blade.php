@props(['placeholder'])
@if (\IyiCode\Services\GoogleMaps::isAccepted())
    {{ $slot }}
@else
    @isset($placeholder)
        {{ $placeholder }}
    @else
        <div></div>
    @endisset
@endif
