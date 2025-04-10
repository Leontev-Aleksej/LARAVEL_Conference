@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Подача заявки</h1>
        @if ($report)
            <p>Вы уже отправили заявку! Мы свяжемся с Вами в ближайшее время.</p>
        @else
            <form method="POST" action="{{ route('apply.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>ФИО выступающего</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Тема выступления</label>
                    <input type="text" name="theme" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Секция</label>
                    <select name="section_id" class="form-control" required>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Фото</label>
                    <input type="file" name="photo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Вернуться к списку</a>
            </form>
        @endif
    </div>
@endsection