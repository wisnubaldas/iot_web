<x-form.data-tables id="data-sync" :header="['No','Roles','Guard','Permission']" :body="true">
    @foreach ($roles as $item)
        <tr>
            <td width="1%">{{$item->id}}</td>
            <td>
                {{$item->name}}
            </td>
            <td>{{$item->guard_name}}</td>
            {{-- <td>{{$item->permissions}}</td> --}}
            <td>
                <x-form.select2 :options="true" name="select_access" class="multiple-select2">
                    @foreach ($access as $acc)
                        @if (count($item->permissions) > 0)
                            @foreach ($item->permissions as $per)
                                @if ($per->name == $acc->name)
                                    <option selected value="{{$item->id}},{{$acc->name}}">{{$acc->name}}</option>
                                @else
                                    <option value="{{$item->id}},{{$acc->name}}">{{$acc->name}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="{{$item->id}},{{$acc->name}}">{{$acc->name}}</option>
                        @endif
                    @endforeach
                </x-form.select2>
            </td>
        </tr>
    @endforeach
</x-form.data-tables>
