<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia de Participantes de Grupos de la Iglesia</title>
</head>
<style>
    img {
        height: 10%;
        width: 20%;
    }

    th {
        text-transform: capitalize;
    }

    td {
        border: 1px solid;
        width: 100px;
        word-wrap: break-word;
        text-transform: capitalize;
    }

    .small {
  font-size: xx-small;
}

</style>

<body>

    &nbsp; &nbsp; &nbsp;
    <rigth>
        <img src="{{ $iglesia->logo_url }}{{ $iglesia->logo }}"></rigth>

    <rigth>
        <h3><b>Nombre de Iglesia: {{ $iglesia->name }} </b></h3>
    </rigth>
    &nbsp;

    @php($totalizado = 0)


    @foreach ($grupos_iglesia as $grupos)
        &nbsp; &nbsp; &nbsp;

        @php($validar = $sessiones->where('iglesia_plan_estudio.group_id', '=', $grupos->id)->count())
        @if ($validar > 0)
        <h3><b>Grupos {{ $grupos->nombre }}</b></h3>
            <table border="1" id="grupostb" cellspacing="0"  >

                &nbsp; &nbsp; &nbsp;
                <tr>
                    <td colspan="5"   class="small">
                        <center>Informacion del Participante </center>
                    </td>
                    <td colspan=" {{ $sessiones->count() + 1 }}"   class="small">
                        <center>Asistencia</center>
                    </td>
                </tr>
                <tr>
                    <th class="small"> DUI </th>
                    <th  class="small"> Nombre Completo </th>
                    <th  class="small"> telefono </th>
                    <th  class="small" > Correo electronico </th>
                    <th  class="small"> Genero </th>

                    @foreach ($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                            <th  class="small">
                                {{ $session->session_name }}
                        @endif
                    @endforeach

                    <th  class="small" rowspan="3">
                    Total
                    </th>


                </tr>
                <tr style="background-color: gray">
                    <td  class="small" colspan="5"> </td>
                    @foreach ($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                            <td  class="small">
                                @foreach ($session->detalles as $clases)
                                    <li> {{ $clases->curso->name_es }} </li>
                                @endforeach
                            </td>
                        @endif
                    @endforeach
                </tr>
                <tr style="background-color: rgb(84, 81, 81)">
                    <td colspan="5"  class="small" > </td>
                    @foreach ($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                            <td  class="small" >


                                <li> {{ $session->meeting_date }}</li>


                            </td>
                        @endif
                    @endforeach
                </tr>



                <tbody>


                    @foreach ($participantes as $obj)
                        {{-- {{ $obj->grupo_first($obj->id) }} --}}
                        @php($total = 0)

                        @if ($obj->grupo_first($obj->id) == $grupos->id)
                            <tr>
                                <td  class="small">
                                    {{ $obj->document_number }}
                                </td>
                                <td  class="small">
                                    {{ $obj->name_member }} {{ $obj->lastname_member }}
                                </td>
                                <td  class="small">
                                    {{ $obj->cell_phone_number }}
                                </td>
                                <td style="text-transform: lowercase"  class="small">
                                    {{ $obj->email }}
                                </td>
                                <td  class="small">
                                    {{ $obj->genders ? $obj->genders->description : '' }}
                                </td>

                                @foreach ($sessiones as $session)
                                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                                        <td align="center"   class="small">
                                            @php($asistencia = $session->asistencia($session->id, $obj->id))
                                            {{ $asistencia }}

                                            @if ($asistencia == 1)
                                                @php($total++)
                                            @endif
                                        </td>
                                    @endif
                                @endforeach
                                <td   class="small">{{ $total }}</td>


                            </tr>
                        @endif

                    @endforeach
                    <tr>
                        <td colspan="5"  class="small" ></td>

                        @foreach($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)

                        <td align="center"  class="small">{{$session->asistencias->where('attended',1)->count()}}</td>
                        @endif
                        @endforeach
                        <td></td>
                    </tr>

                </tbody>


            </table>
        @endif
    @endforeach
    <script>
        // Función para ocultar la tabla
        function ocultarTabla() {
            var tabla = document.getElementById('grupostb');
            tabla.style.display = 'none';
        }
    </script>

</body>

</html>
