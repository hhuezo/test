@extends ('menu')
@section('contenido')
@livewireStyles

@livewire('quiz', ['id' => $id])


@livewireScripts
@endsection
