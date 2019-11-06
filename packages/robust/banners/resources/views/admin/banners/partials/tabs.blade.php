<ul class="nav nav-tabs navigation">
    @if(is_edit_mode($model))
        <li class="{{is_active(route('admin.banners.edit',[$model->id]))}}">
            <a href="{{route('admin.banners.edit',[$model->id])}}">Info</a>
        </li>

        <li class="{{is_active(route('admin.banners.images.index',[$model->id]))}}">
            <a href="{{route('admin.banners.images.index',[$model->id])}}">Images</a>
        </li>
    @endif
</ul>

