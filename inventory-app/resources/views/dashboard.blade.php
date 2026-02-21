@extends('layouts.seodash')

@section('content')
<div class="container-fluid">

    {{-- PAGE TITLE --}}
    <div class="mb-4">
        <h5 class="text-muted mb-1">Home</h5>
        <h2 class="fw-bold">Social Media Developer Santai Berkualitas</h2>
        <p class="text-muted">
            Belajar dan berbagi agar hidup ini semakin santai berkualitas
        </p>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="card">
        <div class="card-body">

            {{-- BENEFIT --}}
            <h4 class="fw-semibold mb-3">Benefit Join di SanberBook</h4>
            <ul class="text-muted">
                <li>Mendapat motivasi dari sesama developer</li>
                <li>Sharing knowledge dari para mastah Sanber</li>
                <li>Dibuat oleh calon web developer terbaik</li>
            </ul>

            {{-- CARA BERGABUNG --}}
            <h4 class="fw-semibold mt-4 mb-3">Cara Bergabung ke SanberBook</h4>
            <ol class="text-muted">
                <li>Mengunjungi Website ini</li>
                <li>Mendaftar di <span class="text-primary">Form Sign Up</span></li>
                <li>Selesai</li>
            </ol>

        </div>
    </div>

</div>
@endsection