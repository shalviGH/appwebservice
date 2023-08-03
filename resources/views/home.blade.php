@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido !') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    h1{
        text-align: center;
        color: red;
    }

    main{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 18px;

    }

    .image-container{
        display: flex;

    }
    .image-container img{
        width: 100%;
    }
    
    article{
        padding: 10px;
        box-shadow: 0px 0px 1px #000;
    }

</style>



<h1>Prsonajes</h1>
<br>
<main>
    <!--article>
        <div class="image-container">
            <img src="https://rickandmortyapi.com/api/character/avatar/778.jpeg" alt="personaje">
        </div>
        <h2>Perosnaje</h2>
        <span>Estado de personaje</span>
    </article-->
</main>


<script>

    function getCharacters(done) {
        const results = fetch("https://rickandmortyapi.com/api/character");


        results.then(response => response.json()).then(data => {
            done(data)
        });

        
    }

    getCharacters(data => {
        data.results.forEach(personaje => {
                const article = document.createRange().createContextualFragment(
                    '<article><div class="image-container"><img src="https://rickandmortyapi.com/api/character/avatar/778.jpeg" alt="personaje"></div><h2>${personaje.name}</h2><span>${personaje.status}</span></article>');
                
                const main = document.querySelector("main");
                
                main.append(article);
        });
    });


</script>





@endsection
