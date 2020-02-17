@extends('layouts.app')

@section('content')
<style>
    .recipes{
        height: 333px;
        width: 480px;
        margin-bottom: 10%;
        transition: all 0.2s ease-in;
        /* background-color: white; */
        overflow-y: hidden;
        white-space: nowrap;
    }

    .info{
        height: 20px;
        width: 200px;
    }

    a, a:link, a:hover{
        text-decoration: none;
        color: black;
    }
</style>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div data-aos="fade-up">
                    <img src="../media/recipe3.jpg" alt="" style="width:480px;height:270px;"><br>
                    <div class="info row mx-0">
                        <div style="margin-right:2%;">&#9200;</div>
                        <div>{{ $recipe->time_to_prepare }} min</div>
                        <div style="margin-left:10%;">{{$recipe->calories}} kcal;</div>
                        <div style="margin-left:10%;">&#128100; {{$recipe->for_people}};</div>
                    </div>
                    <h5>{{ $recipe->name }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    AOS.init();
  </script>
@endsection
