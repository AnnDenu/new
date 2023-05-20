
<body>
@extends('layout')
@section('title')Отзывы @endsection
@section('main_content')


@if($errors->any())
<div class = "alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-lg-12 col-xl-11">
            <div class="row justify-content-center">
                <h1 style = "    margin-top: 100px;">Форма добавления отзыва</h1>
<form method="post" action="/authors/check" style = "margin-top: 15px;">
    @csrf
<input type="email" name="email" id = "email" placeholder = "Введите email" class = "form-control"><br>
<input type="text" name="subject" id = "subject" placeholder = "Введите отзыв" class = "form-control"><br>
<textarea name = "message" id = "message" class = "form-control" placeholder = "Введите сообщение" cols="10" rows="10"></textarea><br>
<button type = "submit" class = "btn btn-success">Отправить</button>
</form>@endsection
</section>
</div>
</div>
</div>
</body>
