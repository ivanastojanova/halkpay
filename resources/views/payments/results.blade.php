@extends('layouts.main')


@section('content')
<h1>3D Pay Hosting Result Page</h1>
<table class="tableClass">
    <tr>
        <td>
            <h3>3D Authentication Result:</h3>
        </td>
        <td>{{ $Message }}</td>
</tr>
<tr>
    <td colspan="2">
        <h3>3D Parameters:</h3>
    </td>
</tr>
<tr class="trHeader">
    <td>
        <b>Parameter Name:</b>
    </td>
    <td>
        <b>Parameter Value:</b>
    </td>
</tr>

@foreach($requestParams as $key => $value)
            <tr><td>{{$key}}</td><td>{{$value}}</td></tr>
@endforeach

</table>
<br />
<br />

<h3>Payment Result</h3><br /><br />
<table class="tableClass">
    <tr><td><h3> Payment Result:&nbsp;</h3></td>
        <td>{{ $MessagePay }}</td>
    </tr>
    <tr>
    <tr>
        <td><b>Parameter Name:</b></td>
        <td><b>Parameter Value:</b></td>
    </tr>

    <tr><td>AuthCode</td><td>{{$AuthCode}}</td></tr>
    <tr><td>Response</td><td>{{$Response}}</td></tr>
    <tr><td>HostRefNum</td><td>{{$HostRefNum}}</td></tr>
    <tr><td>ProcReturnCode</td><td>{{$ProcReturnCode}}</td></tr>
    <tr><td>TransId</td><td>{{$TransId}}</td></tr>
    <tr><td>ErrMsg</td><td>{{$ErrMsg}}</td></tr>
</table>
@endsection