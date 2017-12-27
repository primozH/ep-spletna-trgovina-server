@extends('layout.layout')


@section("content")
    <table>
        <tr>
            <th>Naročila</th>
            <th>Storniraj</th>
        </tr>
        <tr>
            <td>Naročilo 1</td>
            <td>
                <input type="checkbox" name="storniraj">
            </td>
        </tr>
        <tr>
            <td>Naročilo 2</td>
            <td>
                <input type="checkbox" name="storniraj">
            </td>
        </tr>
    </table>

    <br>
    <div class="form-inline my-2 my-lg-0">
        <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="/obdelava-prodajalec">Shrani</a>
    </div>
    <a href="/obdelava-prodajalec"><p style="font-size: 20px;position: fixed;bottom: 5;right: 15;color: green; ">Nazaj</p></a>

@endsection