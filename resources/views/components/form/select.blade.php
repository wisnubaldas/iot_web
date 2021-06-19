<div>
    <label class="col-form-label">{{ $label }}</label>
    <select {{ $attributes }} {{ $attributes->merge(['class' => ' form-control ']) }} style="width:100%">
        {{ $slot }}
    </select>
</div>
@push('css')
    <link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
@endpush
