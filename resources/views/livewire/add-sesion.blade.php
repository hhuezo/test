<div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="space-y-5 profile-page">

        <div class="grid grid-cols-12 gap-6">

            <div class="lg:col-span-4 col-span-12">
                <div class="card h-full">
                    <header class="card-header">
                        <h4 class="card-title">Listado de temas</h4>
                    </header>
                    <div class="card-body p-6">


                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">

                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @php($i = 1)
                                @foreach ($cursos as $curso)
                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                    <td class="table-td">
                                        {{ $i }} {{ $curso->curso->name }}
                                    </td>
                                    <td class="table-td">
                                        <button wire:click="addTema({{ $curso->course_id }})">
                                            <iconify-icon icon="emojione-monotone:right-arrow" width="30"></iconify-icon>
                                        </button>
                                    </td>
                                </tr>
                                @php($i++)
                                @endforeach

                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

            <div class="lg:col-span-8 col-span-12">

                <div class="card" id="card-sesion">
                    <header class="card-header">
                        <strong>Sesiones</strong>
                    </header>

                    <form wire:submit.prevent="saveData()">
                        <div class="card-body flex flex-col p-6">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                            @endif
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Nombre</label>
                                <input type="text" wire:model="session_name" required class="form-control">
                            </div>
                            <br>
                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Fecha</label>
                                <input type="date" wire:model="meeting_date" value="{{ old('meeting_date') }}" required class="form-control">
                            </div>
                            <br>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Temas</label>

                                <div class="lg:col-span-3 col-span-6 column">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">

                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            @if ($cursos_en_sesion)

                                            @foreach ($cursos_en_sesion as $curso)
                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                <td class="table-td">
                                                    {{ $curso->curso->name }}
                                                </td>
                                                <td class="table-td">
                                                    <button type="button" wire:click="delTema({{ $curso->course_id }})">
                                                        <iconify-icon icon="pepicons-pop:trash-circle-filled" width="30"></iconify-icon></button>

                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Notas</label>
                                <textarea class="form-control" wire:model="notas_sobre_sesion"></textarea>
                            </div>
                            <br>
                            <div class="input-area relative">
                                <button type="submit" class="btn inline-flex justify-center text-white bg-black-500 float-right" style="margin-bottom: 15px">Aceptar</button>&nbsp; &nbsp;
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>



    </div>

    <script>
        window.addEventListener('message-success', (e) => {

            Swal.fire({
                title: 'Ok!',
                text: 'Registro guardado correctamente',
                icon: 'success',
                timer: 2000,
                //confirmButtonText: '¡Entendido!'
            });
        });
    </script>

</div>