@extends ('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('css/inquiry.css')}}">
@endpush

@section ('title', '内容確認')

@section ('content')
<div class="confirm inquiry">
    <h1>内容確認</h1>
    <table class="confirm-table">
        <tr>
            <th class="confirm-category">
                お名前
            </th>
            <td>
                {{$inquiry['lastName']}} {{$inquiry['firstName']}}
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                性別
            </th>
            <td>
                @if ($inquiry['gender'] == 1)
                男性
                @else
                女性
                @endif
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                メールアドレス
            </th>
            <td>
                {{$inquiry['email']}}
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                郵便番号
            </th>
            <td>
                {{$inquiry['postcode']}}
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                ご住所
            </th>
            <td>
                {{$inquiry['address']}}
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                建物名
            </th>
            <td>
                {{$inquiry['buildingName']}}
            </td>
        </tr>
        <tr>
            <th class="confirm-category">
                ご意見
            </th>
            <td>
                {{$inquiry['opinion']}}
            </td>
        </tr>
    </table>
    <form action="/contact/create" method="post">
        @csrf
        <button type="submit" class="button submit">送信</button>
    </form>
    <a href="/inquiry" class="edit">修正する</a>

</div>

@endsection
