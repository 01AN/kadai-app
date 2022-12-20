<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 投稿</title>
</head>
<!-- 投稿画面 -->

<body class="">
    <x-header></x-header>
    <div class="page post-page">
        <form class="form" name = "postContent" action="/post" method="post">
            @csrf
            <textarea name="postContent" id="postContent" cols="30" rows="5" placeholder="いまどうしてる?"></textarea>
             @error('postContent')
                                    {{ $message }}
                            @enderror
            <div class="post-button">
                <button class="button-white" id="postbtn" type = button>投稿する</button>
            </div>
        </form>
    </div>
</body>

<script src="{{ asset('/js/app.js') }}"></script>

<!-- Bug 4(JS) -->
<script>
    window.onload = function(){
    const postbtnSubmit =  document.getElementById('postbtn');
    const inputPost = document.getElementById('postContent');

    postbtnSubmit.addEventListener('click',  function(event){
        let message = [];
        
        if(inputPost.value==""){
            message.push("投稿内容が未入力です。");
        }else if(inputPost.value.length > 140){
            message.push("入力可能文字数は140文字以内です。")
        }
        if(message.length > 0){
            alert(message);
            return;
        }
        document.postContent.submit();
    });
}
</script> 

<style scoped>
    .post-page .form {
        display: flex;
        flex-direction: column;
    }
    
    .post-page .post-button {
        text-align: end;
        margin: 20px 20px 0 0;
    }
    
    .post-page button {
        height: 35px;
        width: 90px;
    }
</style>

</html>