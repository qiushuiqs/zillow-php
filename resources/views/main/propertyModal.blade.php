<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{$property->address}}</h4>
        </div>
        <div class="modal-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($property->media as $media)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}"  @if ($loop->first) class="active" @endif></li>

                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach($property->media as $media)
                    <div class="item  @if ($loop->first) active @endif">
                        <img src="{{$media->url}}" alt="{{$media->shortDescription}}">
                        <div class="carousel-caption">
                            {{$media->shortDescription}}
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div>
                <div class="row">
                    <div class="col-md-9">
                        <h2>{{$property->bedrooms or '0'}} beds {{$property->baths or '0'}} baths</h2>
                        <p>List Price: ${{$property->price}}</p>
                        <p>List Date: {{$property->listDate}}</p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{$property->publicRemarks}}
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>