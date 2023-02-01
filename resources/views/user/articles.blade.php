@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Articles</div>
                <br/>
                <div class="container justify-content-center">
                    </div>
                    <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <th>Title</th>    
                        <th>Description</th>
                        <th>Image</th>
                        <th>Cicle</th>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        @if($article->deleted==1)
                        @else
                        <tr class="col-md-12">
                            <td>
                            <strong>{{$article->title}}</strong>
                          
                            
                            </td>
                            <td>
                                {{$article->description}}
                            </td>
                            <td>
                                <label class="float-right"><img src="{{ asset('images/'.$article->image) }}" width="200" height="200"></></label>
                            </td>
                            <td>
                            @foreach ($cicles as $cicle)
                                @if($article->cicle_id == $cicle->id) 
                                    {{ $cicle->name }}
                                @endif
                            @endforeach
                            </td>
                        </tr>
                        @endif
                        @empty
                        <div class="alert alert-danger">
                            {{ __("No hay ninguna noticia.") }}
                        </div>
                        @endforelse
                    </tbody>
                </table>
                    <br>
                 {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

