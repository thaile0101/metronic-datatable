<div class="pull-right">
    @if($routeShow)
        <a href="{{$routeShow}}" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
            <i class="la la-search"></i>
        </a>
    @endif
    @if($routeEdit)
        <a href="{{$routeEdit}}" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
            <i class="fa fa-edit"></i>
        </a>
    @endif
    @if($routeDestroy)
        <button data-id="{{$id}}" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">
            <i class="fa fa-trash"></i>
        </button>
        <form id="frm-destroy{{$id}}" action="{{$routeDestroy}}" method="post">
            @csrf
            @method('DELETE')
        </form>
    @endif
    @if($routeRestore)
        <a href="javascript:;" class="datatable-restore btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-url="{{$routeRestore}}">
            <i class="la flaticon-reply"></i>
        </a>
    @endif
    @if($routeDelete)
        <a href="javascript:;" class="datatable-delete btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-url="{{$routeDelete}}">
            <i class="la la-times"></i>
        </a>
    @endif
</div>