@extends ('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('css/inquiry.css')}}">
@endpush

@section ('title', 'お問い合わせ完了')

@section ('content')
<div class="thank top">
    <p>ご意見いただきありがとうございました。</p>
    <br><br><br>
    <button class="button">
        <a href="/">トップページへ</a>
    </button>
</div>

@endsection
