<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia de Participantes de Grupos de la Iglesia</title>
    <style type="text/css">
        #bold-text {
            font-weight: bold;
        }
    </style>
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

    .center-text {
        text-align: center;
    }

    .body {
        font-family: Verdana, Geneva, sans-serif;
        font-size: 12px;
    }

    .bold-text {
        font-weight: bold;
    }
</style>

<style>
    .page-break {
        page-break-before: always; /* También puedes usar "after" en lugar de "before" según tus necesidades */
    }
</style>

<body class="body">
    <table width="100%" border="0">
        <tr>
            <td colspan="{{ $sessiones->count() + 8 }}">Nombre de Iglesia: {{ $iglesia->name }} </td>
        </tr>
    </table>
    <br> <br>

    @foreach ($grupos_iglesia as $grupos)
        <table border="1" cellspacing="0" cellpadding="0" width="100%">


            <tr>
                <td colspan="5">Informacion del Participante <b>(Grupo {{ $grupos->nombre }}</b> ) </td>
                <td width="100%" colspan="{{ $sessiones->count() + 1 }}" class="center-text"><span
                        class="bold-text">Asistencia</span></td>
            </tr>
            <tr>
                <td width="10%" rowspan="3" class="bold-text center-text">DUI</td>
                <td width="10%" rowspan="3" class="bold-text center-text">Nombre Completo</td>
                <td width="10%" rowspan="3" class="bold-text center-text">Télefono</td>
                <td width="10%" rowspan="3" class="bold-text center-text">Correo Electronico</td>
                <td width="10%" rowspan="3" class="bold-text center-text">Género</td>
                @foreach ($sessiones as $session)
                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                        <td class="center-text">
                            {{ $session->session_name }}
                        </td>
                    @endif
                @endforeach
                <td width="3%" rowspan="3" class="center-text bold-text">Total</td>
            </tr>
            <tr>
                @foreach ($sessiones as $session)
                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                        <td>
                            @foreach ($session->detalles as $clases)
                                <li> {{ $clases->curso->name_es }} </li>
                            @endforeach
                        </td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach ($sessiones as $session)
                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                        <td>
                            <li> {{ $session->meeting_date ? date('d/m/Y', strtotime($session->meeting_date)) : '' }}
                            </li>
                        </td>
                    @endif
                @endforeach
            </tr>
            @foreach ($participantes as $obj)
                {{-- {{ $obj->grupo_first($obj->id) }} --}}
                @php($total = 0)

                @if ($obj->grupo_first($obj->id) == $grupos->id)
                    <tr>
                        <td class="center-text">
                            {{ $obj->document_number }}
                        </td>
                        <td>
                            {{ $obj->name_member }} {{ $obj->lastname_member }}
                        </td>
                        <td class="center-text">
                            {{ $obj->cell_phone_number }}
                        </td>
                        <td style="text-transform: lowercase">
                            {{ $obj->email }}
                        </td>
                        <td class="center-text">
                            {{ $obj->genders ? $obj->genders->description : '' }}
                        </td>

                        @foreach ($sessiones as $session)
                            @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                                <td align="center">
                                    @php($asistencia = $session->asistencia($session->id, $obj->id))
                                    {{ $asistencia }}

                                    @if ($asistencia == 1)
                                        @php($total++)
                                    @endif
                                </td>
                            @endif
                        @endforeach
                        <td class="center-text">{{ $total }}</td>


                    </tr>
                @endif
            @endforeach

            <tr id="bold-text">
                <td colspan="5" align="right">TOTAL</td>

                @foreach ($sessiones as $session)
                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                        <td align="center">
                            {{ $session->asistencias->where('attended', 1)->count() }}</td>
                    @endif
                @endforeach
                <td></td>
            </tr>

        </table>
        <div class="page-break"></div>
    @endforeach
</body>

</html>
