@php
    $bulkActions = array_get($table, 'bulk_actions', []);
    $hasCheckbox = array_get($table, 'checkbox_column', false);
@endphp
@if ($hasCheckbox && count($bulkActions) > 0)
<div class="pull-right">
    <div class="m-dropdown m-dropdown--inline  m-dropdown--arrow" m-dropdown-toggle="click">
        <a href="javascript:;" class="m-dropdown__toggle btn-advance btn btn-success dropdown-toggle">
            {{ __('Bulk actions') }}
        </a>
        <input type="hidden" id="ipt_bulk_action" name="bulk_action" data-method="" data-ajax-url="" data-event="" data-value="">
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        <ul class="m-nav">
                            @foreach($bulkActions as $key => $action)
                            <li class="m-nav__item">
                                <a href="javascript:;"
                                   class="m-nav__link"
                                   data-value="{{ array_get($action, 'name', '') }}"
                                   data-method="{{ array_get($action, 'method', 'get') }}"
                                   data-ajax-url="{{ empty(array_get($action, 'route', '')) ? '' : route(array_get($action, 'route')) }}"
                                   data-event="{{ array_get($action, 'data-event', true) }}">
                                    <i class="m-nav__link-icon flaticon-info"></i>
                                    <span class="m-nav__link-text">
										{{ __(array_get($action, 'text', '')) }}
									</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-accent default table-group-action-submit">
        <i class="fa fa-check"></i>&nbsp;{{ __('Apply') }}
    </button>

</div>
@endif
