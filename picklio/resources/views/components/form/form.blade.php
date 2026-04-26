<form wire:submit="{{$wireSubmit}}" class="{{$class}}" >
    @csrf
    {{$slot}}
</form>
