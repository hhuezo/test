<div class="py-3 px-5">
    <ul>

        <table class="divide-y divide-slate-100 table-fixed black:divide-slate-700" cellspacing="0" width="100%">
            <thead class="bg-slate-200 black:bg-slate-700">
                <tr class="even:bg-slate-50 black:even:bg-slate-700">
                    <th style="text-align: left;padding-top: 1%; padding-bottom:1%">Nombre de Participante</th>
                    <th style="text-align: center">¿Asistio?</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-100 black:bg-slate-800 black:divide-slate-700">

                @foreach ($participant as $obj)
                <tr class="even:bg-slate-50 black:even:bg-slate-700">
                    @if($obj->member_id)
                    <td class="pt-25 pb-25" style=" padding-top: 1%; padding-bottom:1%">{{ $obj->participante->name_member }} {{ $obj->participante->lastname_member }}</td>
                    @else
                    <td></td>
                    @endif
                    <td align="center">
                        <div class="checkbox-area">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden" name="checkbox" {{ $obj->attended == 1 ? 'checked' : '' }}>
                                <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                    <img src="{{asset('assets/images/icon/ck-white.svg')}}" alt="" class="h-[10px] w-[10px] block m-auto opacity-0" onclick="asistencia({{ $obj->id }})"></span>
                                
                            </label>
                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </ul>
</div>

<script>
    function asistencia(id) {
        // Enviar la solicitud POST usando jQuery
        $.ajax({
            url: "{{ url('admin/asistencia') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response) {
                // Manejar la respuesta exitosa si es necesario
                console.log(response);
            },
            error: function(error) {
                // Manejar el error si es necesario
                console.error(error);
            }
        });
    }
</script>