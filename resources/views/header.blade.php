<div class="m-portlet__head-caption">
    <div class="m-portlet__head-title">
        <h3 class="m-portlet__head-text">
            {{$table['title']}}
        </h3>
    </div>
</div>
<div class="m-portlet__head-tools">
    <ul class="m-portlet__nav">
        <li class="m-portlet__nav-item">
            <a href="{{route($table['actions']['add']['route'])}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                 <span>
                     <i class="la la-cart-plus"></i>
                     <span>
                         @lang('label.add_new')
                     </span>
                 </span>
            </a>
        </li>
    </ul>
</div>