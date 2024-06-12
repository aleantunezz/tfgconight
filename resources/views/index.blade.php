@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="hero-text">
        <h1>Bienvenidos a CONNIGHT</h1>
        <p>Somos una empresa dedicada a la organización de los mejores eventos. Nuestro objetivo es ofrecer experiencias inolvidables a todos nuestros clientes.</p>
    </div>
</div>

<div class="carousel-container">
    <div class="carousel">
        <div class="slide active">
            <img src="{{ asset('images/slide1.jpg') }}" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="{{ asset('images/slide2.jpg') }}" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="{{ asset('images/slide3.jpg') }}" alt="Slide 3">
        </div>
        <!-- Controles del carrusel -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
</div>

<div class="events-section">
    <h2>Próximos Eventos</h2>
    <div class="events-container">
        @foreach($events as $event)
        <div class="event">
            <h3>{{ $event->name }}</h3>
            <p>{{ $event->description }}</p>
            <p>{{ $event->date }}</p>
            <p>{{ $event->price }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    const showSlide = (n) => {
        slides.forEach(slide => slide.classList.remove('active'));
        slides[n].classList.add('active');
    }

    const changeSlide = (n) => {
        slideIndex = (slideIndex + n + totalSlides) % totalSlides;
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
</script>
@endsection
