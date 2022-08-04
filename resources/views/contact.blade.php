@extends ('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endpush

@section ('title', '管理システム')

@section ('content')
<div class="management">
    <h1>管理システム</h1>
    <div class="search-box">
        <form action="/contact/show/" method="post">
            @csrf
            <table class="search-table">
                <tr>
                    <td>
                        <label for="name">お名前</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name" class="input--rectangle" @if (isset($keep))
                            value="{{$keep['name']}}" @endif>
                        <span class="search-table__gender">性別</span>
                        <input type="radio" name="gender" value="0" id="gender--0"
                        @if (isset($keep))
                            @if ($keep['gender'] == 0)
                                checked
                            @endif
                        @else
                            checked
                        @endif
                        >
                        <label class="radio" for="gender--0">全て</label>
                        <input type="radio" name="gender" value="1" id="male"
                        @if (isset($keep))
                            @if ($keep['gender'] == 1)
                                checked
                            @endif
                        @endif
                        >
                        <label class="radio" for="male">男性</label>
                        <input type="radio" name="gender" value="2" id="female"
                        @if (isset($keep))
                            @if ($keep['gender'] == 2)
                                checked
                            @endif
                        @endif
                        >
                        <label class="radio" for="female">女性</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="created_start">登録日</label>
                    </td>
                    <td>
                        <input type="text" name="created_start" id="created_start" class="input--rectangle date" @if (isset($keep))
                            value="{{$keep['created_start']}}"
                        @endif
                        >
                        <span class="search-table__tilde">~</span>
                        <input type="text" name="created_end" class="input--rectangle date"
                        @if (isset($keep))
                            value="{{$keep['created_end']}}"
                        @endif
                        >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">メールアドレス</label>
                    </td>
                    <td>
                        {{-- 部分検索するためtypeはemailではなくtextで送る --}}
                        <input type="text" name="email" id="email" class="input--rectangle"
                        @if (isset($keep))
                            value="{{$keep['email']}}" 
                        @endif
                        >
                    </td>
                </tr>
            </table>
            <button type="submit" class="button">検索</button>
            <a href="/contact" class="reset">リセット</a>
        </form>
    </div>

    <div class="contacts">
        @if ($contacts->total())
        <div class="pagination">
            <p>
                全{{$contacts->total()}}件中　{{$contacts->firstItem()}}~{{$contacts->lastItem()}}件
            </p>
            <div class="navi">
                {{$contacts->links()}}
            </div>
        </div>

        <table class="contacts__table">
            <tr>
                <th class="id">ID</th>
                <th class="name">お名前</th>
                <th class="gender">性別</th>
                <th class="email">メールアドレス</th>
                <th class="opinion">ご意見</th>
            </tr>
            @foreach ($contacts as $contact)
            <tr>
                <td class="id">{{$contact->id}}</td>
                <td class="name">{{$contact->fullname}}</td>
                <td class="gender">
                    @if ($contact->gender == 1)
                        男性
                    @else
                        女性
                    @endif
                </td>
                <td class="email">{{$contact->email}}</td>
                <td class="opinion">
                    <span class="shortened">
                        @if (mb_strlen($contact->opinion) > 25)
                            {{mb_substr($contact->opinion, 0 , 25, "UTF-8").'...'}}
                        @else
                            {{$contact->opinion}}
                        @endif
                    </span>
                    <span class="plain">
                        {{$contact->opinion}}
                    </span>
                </td>
                <form action="/contact/delete/{{$contact->id}}?page=
                @if ($contacts->firstItem() == $contacts->lastItem())
                    {{$contacts->currentPage()-1}}
                @else
                    {{$contacts->currentPage()}}
                @endif
                " method="post">
                    @csrf
                    <td class="delete">
                        <button type="submit" class="button">削除</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
        @else
        <p>お探しのデータは見つかりませんでした。</p>
        @endif
    </div>
</div>


<script>
    const opinion = document.getElementsByClassName('opinion');
    for (let i = 0; i < opinion.length; i++) {
        opinion[i].addEventListener('mouseenter', showOpinion);
        opinion[i].addEventListener('mouseleave', shortenOpinion);
    }

    function showOpinion() {
        this.classList.add('show');
    }

    function shortenOpinion() {
        this.classList.remove('show');
    }

    $(function () {
        $(".date").datepicker();
    });
</script>

@endsection
