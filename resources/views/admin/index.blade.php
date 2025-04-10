@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Панель администратора</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Тема</th>
                    <th>Секция</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->fullname }}</td>
                        <td>{{ $report->user->tel }}</td>
                        <td>{{ $report->user->email }}</td>
                        <td>{{ $report->theme }}</td>
                        <td>{{ $report->section->title }}</td>
                        <td>{{ $report->status }}</td>
                        <td>
                            @if ($report->status == 'pending')
                                <form action="{{ route('admin.approve', $report) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Одобрить</button>
                                </form>
                                <form action="{{ route('admin.reject', $report) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Отклонить</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection