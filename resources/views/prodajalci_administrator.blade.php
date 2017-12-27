@extends('layout.layout')


@section("content")
    <table>
        <tr>
            <th>Prodajalci</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>Prodajalec 1</td>
            <td>
                <select>
                    <option value="aktiviran">Aktiviran</option>
                    <option value="deaktiviran">Deaktiviran</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Prodajalec 2</td>
            <td>
                <select>
                    <option value="aktiviran">Aktiviran</option>
                    <option value="deaktiviran">Deaktiviran</option>
                </select>
            </td>
        </tr>
    </table>

    <br>
    <div class="form-inline my-2 my-lg-0">
        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/upravljanje-administrator">Shrani</a>
    </div>
    <a href="/upravljanje-administrator"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>

@endsection