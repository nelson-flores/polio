@extends('components.layouts.base', ['bg_img' => url('assets/media/various/bg_header.jpg')])


@section('template')

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <div class="card-header text-center bg-transparent">
                <img src="{{ url('assets/logo.png') }}" width="80px" alt="">
            </div>
            @if (session()->has('error'))
                <div class="alert alert-danger mb-3">
                    <p>{{ session()->get('error') }}</p>
                </div>
            @elseif(session()->has('message'))
                <div class="alert alert-info mb-3">
                    <p>{{ session()->get('message') }}</p>
                </div>

            @endif

            {{ $slot }}

            <!-- Copyright dentro do card -->
            <div class="text-center mt-4 pt-3 border-top">
                <small class="text-muted">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.
                </small>
                <small class="text-dark d-block text-center">
                    <a href="https://nave.co.mz" class="text-dark">Hand-crafted with care</a>
                </small>
            </div>

        </div>
    </div>

@endsection