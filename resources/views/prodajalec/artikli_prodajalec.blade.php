@extends('stranka.layout.layout')


@section("content")
    <table>
        <tr>
            <th>Artikli</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>Artikel 1</td>
            <td>
                <select>
                    <option value="aktiviran">Aktiviran</option>
                    <option value="deaktiviran">Deaktiviran</option>
                </select>
            </td>
            <td>
                <a href="/posodobi-artikel-prodajalec" style="color: green;">Posodobi</a>
            </td>
        </tr>
        <tr>
            <td>Artikel 2</td>
            <td>
                <select>
                    <option value="aktiviran">Aktiviran</option>
                    <option value="deaktiviran">Deaktiviran</option>
                </select>
            </td>
            <td>
                <a href="/posodobi-artikel-prodajalec" style="color: green;">Posodobi</a>
            </td>
        </tr>
    </table>

    <br>
    <div class="form-inline my-2 my-lg-0">
        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/obdelava-prodajalec">Shrani</a>
    </div>
    <a href="/obdelava-prodajalec"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>

@endsection