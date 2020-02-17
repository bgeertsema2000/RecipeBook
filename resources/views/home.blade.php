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

    .recipes:hover{
        -webkit-box-shadow: 0 10px 6px -6px #777;
        -moz-box-shadow: 0 10px 6px -6px #777;	box-shadow: 46px 42px 78px -51px #000000;
        transform: scale(1.02);
        transition: all 0.2s ease-out;
    }

    .info{
        height: 20px;
        width: 200px;
    }

    .main{
        background-color: wheat !important;
    }

    .row{
        background-color: white !important;
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
                @foreach($recipes as $recipe)
                <div class="col-xs-6 py-3 mx-auto recipes">
                    <a href="/myrecipes/{{ $recipe->recipe_id }}">
                        <div data-aos="fade-up">
                            <img src="../media/recipe3.jpg" alt="" style="width:480px;height:270px;"><br>
                            <div class="info row mx-0">
                                <div style="margin-right:2%;">&#9200;</div>
                                <div>{{ $recipe->time_to_prepare }} min</div>
                                <div style="margin-left:10%;">{{$recipe->calories}} kcal;</div>
                                <div style="margin-left:10%;">&#128100; {{$recipe->for_people}};</div>
                                
                                {{-- <span style="margin-left:10%;">&#8902;</span> --}}
                                {{-- <div style="margin-left:2%;">{{$recipe->rating}} / 5</div> --}}
                            </div>
                            <h5>{{ $recipe->name }}</h5>
                        </div>
                    </a>
                     </div>
                    @endforeach
                    </div>    
                    {!! $recipes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    AOS.init();
  </script>
@endsection
