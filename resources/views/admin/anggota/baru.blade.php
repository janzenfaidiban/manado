@extends('layouts.app')
@section('content')

        <!-- main content -->
        <div class="container">
            <div class="page-inner">

                <x-page-header 
                    :pageTitle="$pageTitle" 
                    :pageDescription="$pageDescription" 
                />

                <div class="page-category">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi similique molestias sapiente temporibus nihil cumque ducimus quas velit rem earum neque iure culpa, nulla reiciendis. Debitis, cumque omnis dicta natus, voluptatum architecto mollitia sit ullam inventore, quod itaque sint impedit labore? Illum ea aut, necessitatibus eaque non quae aliquam optio?</p>

                                
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop
