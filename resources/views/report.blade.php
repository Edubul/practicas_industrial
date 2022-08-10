<!doctype html>
<html lang="en">


<body>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-fymr {
            border-color: inherit;
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-7btt {
            border-color: inherit;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }
    </style>
    <div style="display: flex; flex-direction:row;">
        <img src="{{ url('img/image001.png') }}" alt="">
        <img src="{{ url('img/image002.png') }}" alt="" style="width: 15%">
        <img src="{{ url('img/image003.png') }}" alt="" style="width: 60%">
    </div>
    <table class="tg">
        <thead>
            <tr>
                <th colspan="2"> <span class="tg-0pky">Materia:</span> {{$info->materia}}<br>
                    <span>Unidad: </span>{{$info->unidad}}
                </th>
                <th colspan=" 2"><span>Tema:</span> {{$info->tema}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-0pky" colspan="4"></td>
            </tr>
            <tr>
                <td class="tg-fymr" colspan="2">Nombre de la practica: {{$info->nombre_practica}}</td>
                <td class="tg-fymr" colspan="2">N. de la práctica: {{$info->clave_practica}}</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4"></td>
            </tr>
            <tr>
                <td class="tg-fymr">Atributos de egreso {{$info->atributo_egreso}}</td>
                <td class="tg-fymr">Requerimientos de ubicación</td>
                <td class="tg-fymr">Opcion 1: {{$info->req_ub_op1}}</td>
                <td class="tg-fymr">Opcion 2: {{$info->req_ub_op2}}</td>
            </tr>
            <tr>
                <td class="tg-fymr">Equipo de protección</td>
                <td class="tg-0pky" colspan="3">
                    <ul>
                        @foreach(unserialize($info->equipo_prot) as $equipo)
                        <li>{{$equipo}}</li>
                        @endforeach

                    </ul>
                </td>
            </tr>
            <tr>
                <td class="tg-7btt" colspan="4">Maquinaria - Herramientas</td>
            </tr>
            <tr>
                <td class="tg-fymr">Maquinaria o equipo a utilizar</td>
                <td class="tg-0pky" colspan="3">
                    <ul>
                        @foreach(unserialize($info->maq_usar) as $equipo)
                        <li>{{$equipo}}</li>
                        @endforeach

                    </ul>
                </td>
            </tr>
            <tr>
                <td class="tg-fymr">Instrumento de medición a utilizar</td>
                <td class="tg-0pky" colspan="3">
                    <ul>
                        @foreach(unserialize($info->inst_med) as $equipo)
                        <li>{{$equipo}}</li>
                        @endforeach

                    </ul>

                </td>
            </tr>
            <tr>
                <td class="tg-fymr" colspan="4">Material Didactico: {{$info->material_didactico}}<br></td>
            </tr>
            <tr>
                <td class="tg-fymr">Herramientas Manuales a utilizar</td>
                <td class="tg-0pky" colspan="3">
                    <ul>
                        @foreach(unserialize($info->herr_man) as $equipo)
                        <li>{{$equipo}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="tg-7btt" colspan="4">Reglamento</td>
            </tr>
            <tr>
                <td class="tg-fymr">Recomendaciones de seguridad adicionales: </td>
                <td class="tg-0pky" colspan="3">
                    {{$info->recom_seguridad}}
                </td>
            </tr>
            <tr>
                <td class="tg-7btt" colspan="4">Desarrollo de práctica</td>
            </tr>
            <tr>
                <td class="tg-fymr">Objetivo</td>
                <td class="tg-0pky" colspan="3"> {{$info->objetivo}}</td>
            </tr>
            <tr>
                <td class="tg-fymr">Pasos</td>
                <td class="tg-0pky" colspan="3">
                    <ul style="list-style-type: none;">
                        <?php
                        $pasos = preg_split('/\r\n|\r|\n/', $info->pasos);
                        ?>
                        @for($i = 0; $i < sizeof($pasos); $i++) <li>{{$pasos[$i]}}</li>
                            @endfor
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="tg-fymr">Fuentes de información</td>
                <td class="tg-0pky" colspan="3">{{$info->fuentes_info}}</td>
            </tr>
            <tr>
                <td class="tg-fymr">Material digital de apoyo</td>
                <td class="tg-0pky" colspan="3">{{$info->material_apoyo}}</td>
            </tr>
            @if(isset($info->materias_integradoras))
            <tr>
                <td class="tg-fymr">Materias Integradoras</td>
                <td class="tg-0pky" colspan="3">
                    <ul>
                        @foreach(unserialize($info->materias_integradoras) as $materia)
                        <li>{{$materia}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <p>&nbsp;</p>
</body>

</html>