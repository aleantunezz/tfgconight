@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="content">
        <h1>Conectándote con<br>la noche</h1>
        <p>Las entradas de los mejores eventos <br>del país al alcance de tu mano</p>
    </div>
    <div class="carousel">
        <div class="image-slider">
            <div class="slide active">
                <img src="{{ asset('images/slide1.jpg') }}" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/slide2.jpg') }}" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/slide3.jpg') }}" alt="Slide 3">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
</div>

<section class="about">
    <h2>Sobre Connight</h2>
    <p>Connight es la plataforma líder en la venta de entradas para los mejores eventos nocturnos del país. Nuestra misión es conectarte con experiencias inolvidables y hacer que tu noche sea única.</p>
</section>

<section class="events-preview">
    <h2>Próximos Eventos</h2>
    <ul>
        @foreach($events as $event)
            <li>
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                <p>Fecha y Hora: {{ $event->date }}</p>
                <p>Lugar: {{ $event->location }}</p>
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" style="width: 100%; max-width: 1080px; height: auto;">
                @endif
                <a href="{{ route('tickets.create', $event->id) }}" class="details-btn">Comprar Entradas</a>
            </li>
        @endforeach
    </ul>
</section>
@endsection

@section('scripts')
<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');

    const showSlide = (n) => {
        slides.forEach((slide, index) => {
            slide.style.display = (index === n) ? 'block' : 'none';
        });
    }

    const changeSlide = (n) => {
        slideIndex = (slideIndex + n + slides.length) % slides.length;
        showSlide(slideIndex);
    }

    const autoSlide = () => {
        changeSlide(1);
        setTimeout(autoSlide, 5000); // Cambia de imagen cada 5 segundos
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        showSlide(slideIndex);
        autoSlide();
    });

    const plusSlides = (n) => {
        changeSlide(n);
    }
</script>
@endsection
