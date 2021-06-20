@extends('layouts.default',[
'sidebarTransparent' => true,
'sidebarSearch' => true,
'footer' => true,
])

@section('title', 'About Us')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-form.select label="Select User" class="multiple-select2" type="text" name="user_id" id="user_id">
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} /{{ $item->email }}</option>
                @endforeach
            </x-form.select>
            <x-form.textarea label="Moto" type="text" name="motto" id="motto" rows="5" />
            <x-form.textarea label="Story" type="text" name="story" id="story" rows="7" />
            <x-form.textarea label="Philosopy" type="text" name="philosopy" id="philosopy" rows="7" />
            <x-form.select label="Experience" class="multiple-select2" type="text" multiple="multiple" name="experiencce"
                id="experiencce">
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} /{{ $item->email }}</option>
                @endforeach
            </x-form.select>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        jQuery(function() {
            $(".multiple-select2").select2({
                placeholder: "Select a Roles"
            });
        })

    </script>
@endpush
