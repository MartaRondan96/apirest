@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">Offers</div>
                <br/>
                <div class="container justify-content-center">
                    </div>
                    <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <th>Title</th>    
                        <th>Description</th>
                        <th>Date max</th>
                        <th>Nº candidates</th>
                        <th>Cicle icon</th>
                        <th>Cicle name</th>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                            <tr class="col-md-12">
                                <td>
                                <strong>{{$offer->title}}</strong>
                                </td>
                                <td>
                                {{$offer->description}}
                                <br>
                                </td>
                                <td>
                                {{$offer->date_max}}
                                </td>
                                <td>
                                {{$offer->num_candidates}}
                                </td>
                                <td>
                                @foreach($cicles as $cicle) 
                                    @if($offer->cicle_id == $cicle->id)
                                        @if($cicle->img != "")
                                            <img src="{{ asset('img_cicles/'.$cicle->img) }}" style="width:40px;"></>
                                            @else
                                            <img src="{{ asset('img_cicles/noimage.png') }}" style="width:40px;"></>
                                        @endif
                                    @endif
                                @endforeach
                                </td>
                                <td> 
                                @foreach ($cicles as $cicle)
                                    @if($offer->cicle_id == $cicle->id) 
                                        {{ $cicle->name }}
                                    @endif
                                @endforeach
                                </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{$offers->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection