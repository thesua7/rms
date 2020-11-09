<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{isset($title) ? $title : ''}}</h4>

            <div class="page-title-right">
                @if(isset($breadcrumbs))
                    <ol class="breadcrumb m-0">
                        @foreach($breadcrumbs as $key => $item)
                            <li class="breadcrumb-item" {{$loop->last ? 'active' : ''}}><a href="{{$item}}">{{$key}}</a></li>
                    </ol>
                @endif
            </div>

        </div>
    </div>
</div>
