@foreach($list as $item)
    <a href="{{route('content_view',['self'=>\App\Http\Controllers\ContentController::encodelink($item->title),'id'=>$item->id])}}" class="post-item @if(!$item->photo_requirement) without-bg @endif ">
        @if($item->photo_requirement)
            <img src="/assets/img/post-2-img.jpg" alt="" class="post-bg-img">
        @endif

        <h3 class="post-title">
         {{$item->title}}
        </h3>
        <div class="post-info">
            <div class="post-author post-info-author">
                <span>{{$item->download_count}}</span>
                <span>indirme</span>
            </div>
            <div class="post-date post-info-date">
                {{\App\Http\Controllers\ContentController::encode_date($item->created_at)}}
            </div>
            <div class="post-views post-rate-count post-info-views">
              <span>
                    {{count(\App\Models\Rate::where('content_id',$item->id)->get())}} yorum
              </span>
            </div>
        </div>
    </a>
@endforeach
