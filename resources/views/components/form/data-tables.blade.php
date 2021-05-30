<table {{ $attributes }} {{ $attributes->merge(
        ['class' => 'table table-bordered table-hover table-td-valign-middle']) }}>
    <thead class="text-center">
        <tr>
            @foreach ($header as $item)
                <th width="1%">{{$item}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @if ($body)
            {{ $slot }}
        @endif
    </tbody>
</table>
