@extends('layouts.main')


@section('content')
<h1>
    3D Pay Hosting Sample Page</h1>
<table class="tableClass">
    <tr class="trHeader">
        <td colspan="2">
            This sample page submits client Id, transaction type, amount, okUrl, failUrl, order
            Id, instalment count and store key.
            <br />
            Credit card information will be asked in the 3d secure page.
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2">
        </td>
    </tr>
</table>

<form method="post" action="{{ $paymentUrl }}">
    <input type="hidden" name="clientid" value="{{ $clientId }}" />
    <input type="hidden" name="amount" value="{{ $amount }}" />
    <input type="hidden" name="islemtipi" value="{{ $transactionType }}" />
    <input type="hidden" name="taksit" value="{{ $instalment }}" />
    <input type="hidden" name="oid" value="{{ $oid }}" />
    <input type="hidden" name="okUrl" value="{{ $okUrl }}" />
    <input type="hidden" name="failUrl" value="{{ $failUrl }}" />
    <input type="hidden" name="rnd" value="{{ $rnd }}" />
    <input type="hidden" name="hash" value="{{ $hash }}" />
    <input type="hidden" name="storetype" value="{{ $storetype }}" />
    <input type="hidden" name="lang" value="{{ $lang }}" />
    <input type="hidden" name="currency" value="{{ $currencyVal }}" />
    <input type="hidden" name="refreshtime" value="10" />
    <input type="submit" value="Submit" class="buttonClass" />

</form>

@endsection