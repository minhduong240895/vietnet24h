<div class="navbar-collapse collapse" id="main-menu">
    <ul class="nav navbar-nav">
        @if(isset($data['categories']))
            @if( isset($currentCate))
                <li><a href="{{url('/')}}">Trang chủ</a></li>
            @else
                <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
            @endif
            @foreach($data['categories'] as $category)
                @if( isset($currentCate) && $currentCate->id == $category->id)
                    <li class="active"><a href="{{url('danh-muc/'.$category->slug)}}">{{$category->name}}</a></li>
                @else
                    <li><a href="{{url('danh-muc/'.$category->slug)}}">{{$category->name}}</a></li>
                @endif
            @endforeach
        @endif
    </ul>
</div>

@if( isset($currentCate))
    <div class="navbar-collapse collapse" id="sub-menu">
        <ul class="nav navbar-nav">
            @if(count($listtopics) > 0)
                @foreach($listtopics as $topic)
                    @if( isset($currentTopic) && $currentTopic->id == $topic->id)
                        <li class="active"><a href="{{url('chuyen-muc/'.$topic->slug)}}">{{$topic->name}}</a></li>
                    @else
                        <li><a href="{{url('chuyen-muc/'.$topic->slug)}}">{{$topic->name}}</a></li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
@endif