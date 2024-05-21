@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
        <button type="button" class="btn-close" data-dismiss="alert">
        </button>
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
        <button type="button" class="btn-close" data-dismiss="alert">
        </button>
    </div>
@endif
