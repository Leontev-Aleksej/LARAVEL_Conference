@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Конференция для IT-специалистов</h1>
        <p>Добро пожаловать на ежегодную конференцию! Здесь вы найдете информацию о мероприятии и список одобренных выступлений.</p>
        <a href="{{ route('apply.show') }}" class="btn btn-primary">Принять участие</a>

        <h2>Одобренные выступления</h2>
        @forelse ($reports as $report)
            <div class="card mb-3">
                <div class="card-body">
                    <img src="{{ Storage::url($report->path_img) }}" alt="Фото спикера" width="100">
                    <h5>{{ $report->theme }}</h5>
                    <p>Секция: {{ $report->section->title }}</p>
                </div>
            </div>
        @empty
            <p>Пока нет одобренных выступлений.</p>
        @endforelse
    </div>
@endsection