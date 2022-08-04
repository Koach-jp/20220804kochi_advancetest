@extends ('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{asset('css/inquiry.css')}}">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endpush

@section ('title', 'お問い合わせ')

@section ('content')
    <div class="inquiry">
        <h1>お問い合わせ</h1>
        <livewire:contact-validation />
    </div>

@endsection