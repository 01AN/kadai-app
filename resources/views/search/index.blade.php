<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    <title>kadai-app | プロフィール編集</title>
</head>
<!-- プロフィール編集画面 -->

<body class="user-page">
    <x-header></x-header>
    <div class="page user-edit-page">
        <form action="/search" method="get">
            @csrf @method('GET')
            <div class="user-info">
                <div class="user-name">
                    <label for="keyword">ユーザー検索</label>
                    <input type="text" id="keyword" name="keyword" value="{{$keyword}}" placeholder="ユーザーネームを入力してください">
                </div>
            </div>
            <div class="search-button">
                <button class="button-white" id="search">検索</button>
            </div>
        </form>
        <div class="title">検索結果</div>
    </div>
</body>
<script>
    window.onload = function () {
        const searchSubmit = document.getElementById('search');
        const inputKeyword = document.getElementById('keyword');

        searchSubmit.addEventListener('click', function (event) {
            let message = [];

            if (inputKeyword.value == "") {
                message.push("投稿内容が未入力です。");
            }

            if (message.length > 0) {
                alert(message);
                return;
            }
            document.keyword.submit();
        });
    }
</script>
<script src="{{ asset('/js/app.js') }}"></script>
<style scoped>
    .user-edit-page .user-name {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }

    .user-page .title {
        font-size: 18px;
        font-weight: bold;
        color: gray;
        margin-bottom: 6px;
    }

    .user-edit-page .search-button {
        display: flex;
        justify-content: end;
        margin: 10px 10px 0 0;
    }

    .user-edit-page label {
        padding-left: 5px;
    }
</style>

</html>