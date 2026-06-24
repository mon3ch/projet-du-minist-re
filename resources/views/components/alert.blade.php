<!-- add alert component bootstrap -->
@props(['type'])
<div class="alert alert-{{$type}}" role="alert">
    {{ $slot }}
</div>