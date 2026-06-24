@props(['text', 'maxWidth' => '150px'])

<td style="max-width: {{ $maxWidth }}; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
    data-bs-toggle="tooltip" title="{{ $text }}">
    {{ $text }}
</td>
