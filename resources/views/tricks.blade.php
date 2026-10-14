<x-layout>
    @for($i = 0; $i < count($tricks); $i++)
        {{ $tricks[$i]->name }},
    @endfor
</x-layout>

