<div class="comment-list">
    <div class="single-comment justify-content-between d-flex">
        <div class="user justify-content-between d-flex">
            <div class="thumb">
{{--                <img src="{{asset('assets/images/users/'.$users->image)}}"--}}
{{--                     style="width:40px" alt="">--}}

                <img src="{{asset('assets/images/users/'.$comment->picture)}}"
                     style="width:40px" alt="">
            </div>
            <div class="desc">
                <h5><a href="#">{{$comment->first_name.' '.$comment->last_name }}</a></h5>
                <p class="date">{{$comment->created_at}}</p>
                <p class="comment">
                   {{$comment->message}}
                </p>
            </div>
        </div>
        <div class="reply-btn">
            <a href="" class="btn-reply text-uppercase">reply</a>
        </div>
    </div>
</div>