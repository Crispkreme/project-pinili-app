<div>
    <ul class="list-unstyled megamenu-list">
        @foreach($menuLists as $menuList)
            <li>
                <a href="javascript:void(0);">{{ $menuList['list'] }}</a>
            </li>
        @endforeach
    </ul>
</div>
