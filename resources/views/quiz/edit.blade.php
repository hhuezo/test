@extends ('menu')
@section('contenido')
@livewireStyles

@livewire('Quiz', ['id' => $id])


@livewireScripts
@endsection
