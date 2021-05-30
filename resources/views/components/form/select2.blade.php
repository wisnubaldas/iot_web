<select {{ $attributes }} {{$attributes->merge([
    "class"=>" form-control "
])}} multiple="multiple">
    @if ($options)
        {{ $slot }}
    @endif
</select>