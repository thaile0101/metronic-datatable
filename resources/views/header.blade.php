<div class="m-portlet__head">
    <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
				<span class="m-portlet__head-icon">
					<i class="flaticon-coins"></i>
				</span>
            <h3 class="m-portlet__head-text">
                {{$table['title']}}
            </h3>
        </div>
    </div>
    <div class="m-portlet__head-tools">
        <ul class="m-portlet__nav">
            @if($checkActions)
                <li class="m-portlet__nav-item">
                    <a href="{{route($table['actions']['add']['route'])}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                     <span>
                         <i class="la la-cart-plus"></i>
                         <span>
                             {{$table['actions']['add']['text']}}
                         </span>
                     </span>
                    </a>
                </li>
            @endif
            <li class="m-portlet__nav-item">
                <a href="#"  m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon">
                    <i class="la la-expand"></i>
                </a>
            </li>
            <li class="m-portlet__nav-item">
                <a href="#" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon">
                    <i class="la la-angle-down"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
