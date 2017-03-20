@extends('layout')

@section('header')
    <h1 class="text-center">Welcome to Zillow</h1>

@endsection


@section('content')
    <div class="row">
        @if (is_string($properties))
            <div class="col-md-12">
                <h1 class="text-center bg-danger">$properties</h1>
            </div>
        @elseif (count($properties) == 0)
            <div class="col-md-12">
                <h1 class="text-center bg-primary">No Properties Found</h1>
            </div>
        @else
            @foreach( $properties as $property)
            <div class="col-md-4">
                <img src="{{$property->media[0]->url or 'https://photos.zillowstatic.com/p_h/ISqdzxoh5icjzh1000000000.jpg'}}" class="img-rounded thumbnail" alt="">
                <h2><span >${{$property->price}}</span>
                    @if( isset($property->originalPrice) )
                        <del class="text-danger">${{$property->originalPrice}}</del>
                    @endif
                </h2>
                <p>{{$property->address}}</p>
                <p><a data-lid={{$property->id}} class="btn btn-primary viewDetail" href="#" role="button">View details &raquo;</a></p>
            </div>
            @endforeach
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    </div>
@endsection