@extends ('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush

@section ('title', 'TOP')

@section ('content')
<div class="top">
    <a href="/inquiry">お問い合わせへ</a>
    <br><br><br>
    <a href="/contact">管理システムへ</a>
</div>


@endsection
