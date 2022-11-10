<div class="media text-muted pt-3" >
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <h5><strong class="text-gray-dark">#{{$customer->id}}</strong> <span class="float-right">{{$customer->created_at}}</span></h5>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Name:</span>
                <span class="input-group-text">{{$customer->name}}</span>
            </div>
        </div>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Email:</span>
                <span class="input-group-text">{{$customer->email}}</span>
            </div>
        </div>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">Phone:</span>
                <span class="input-group-text">{{$customer->phone}}</span>
            </div>
        </div>
    </div>
</div>
