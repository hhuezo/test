<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    img {
  height: 20%;
  width: 30%;
}
</style>
<body>

    <form method="POST" action="{{ route('iglesia.update', $iglesia->id) }}">
        @method('PUT')
        @csrf
        <div style="text-align: right;">
            <img src=img/qrcode.png alt=""
            class="w-full h-full rounded-[30%] object-cover">
            </div>
        <table>
        <TR>
           <TD>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
            <div class="input-area relative">
                <label>Nombre de Iglesia</label>
                <label> {{ $iglesia->name }}</label>
            </div>

            <p>
            <div class="input-area relative">
                <label>Direccion</label>
                <label>{{$iglesia->address}}</label>
            </div>
            &nbsp; <p>
            <div class="input-area relative">
                <label>Departamento</label>


                    @foreach ($deptos as $obj1)
                        @if ($obj1->id == $iglesia->catalog_departamento_id)

                                {{ $obj1->nombre }}
                            @else

                        @endif

                    @endforeach

            </div>
            &nbsp; <p>
            <div class="input-area relative">
                <label>Lider Religioso</label>
                <label >{{ $iglesia->pastor_name }} </label>

            </div>
            <p>
            <div class="input-area relative">
                <label>Telefono de Pastor</label>
               <label>{{ $iglesia->pastor_phone_number }}</label>

            </div>


            <p>
            <div class="input-area relative">
                <img src="img\fb.png"><p>
                <label>Facebook</label>
                <label>{{ $iglesia->facebook }}</label>
            </div>
            <p>
            <div class="input-area relative">
                <img src="img\yotoube.png"><p>
                <label>sitio web</label>
                <label>{{ $iglesia->website }}</label>
            </div>
            &nbsp; <p>
            &nbsp;  </TD><TD>

            <p>
            <div class="input-area relative">
                <label>Sede</label>
                {{ $iglesia->sedeiglesia->nombre}}
            </div>
            &nbsp;
            <div></div>
            <p>
            <div class="card h-full">
                <div class="grid pt-4 pb-3 px-4">
                    <div class="input-area relative">
                        <label>Logo</label>
                        <img src="{{$iglesia->logo_url}}{{$iglesia->logo}}" ><p>

                    </div>
                </div>
                &nbsp;
            </div>

        </div>
    </TD>
    </TR>
</table>
    </form>

    <table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr class="td-table">
                <th style="text-align: center">Iglesia</th>
                <th style="text-align: center">Nombre</th>
                <th style="text-align: center">Grupo</th>
                <th style="text-align: center">Participantes</th>
                <th style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($member->count() > 0)
                @foreach ($member as $obj)
                    <tr>
                        <td align="center">{{ $obj->id }}</td>
                        <td align="center">{{ $obj->name_member}}</td>
                        <td align="center">{{ $obj->lastname_member}}</td>

                        <td align="center">
                            <a href="{{url('catalog/member')}}/{{$obj->id}}/edit">
                            <iconify-icon icon="mdi:pencil"
                                style="color: #1769aa;" width="40"></iconify-icon>
                            </a>
                            &nbsp;&nbsp;
                            <iconify-icon data-bs-toggle="modal"
                                data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                style="color: #1769aa;" width="40"></iconify-icon>
                        </td>
                    </tr>
                    @include('catalog/member/modal')
                @endforeach
            @endif

        </tbody>
    </table>
    </div>
</body>
</html>
