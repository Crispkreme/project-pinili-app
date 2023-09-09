<div>
    <ul class="metismenu list-unstyled" id="side-menu">
        @foreach($sidebarMenuLists as $sidebarMenuList)
            <li>
                @if(isset($sidebarMenuList['isMenuTitle']) && $sidebarMenuList['isMenuTitle'])
                    <span class="{{ $sidebarMenuList['class'] }}">{{ $sidebarMenuList['list'] ?? '' }}</span>
                @else
                    @if(isset($sidebarMenuList['list']))
                        @if(isset($sidebarMenuList['url']))
                            <a href="{{ $sidebarMenuList['url'] }}" class="{{ $sidebarMenuList['class'] }}">
                                {!! $sidebarMenuList['icon'] !!}
                                <span>{{ $sidebarMenuList['list'] }}</span>
                            </a>
                        @else
                            <span class="{{ $sidebarMenuList['class'] }}">{{ $sidebarMenuList['list'] }}</span>
                        @endif
                        @if(isset($sidebarMenuList['submenu']))
                            <ul class="sub-menu" aria-expanded="false">
                                <x-sidebar-menu :sidebarMenuLists="$sidebarMenuList['submenu']" />
                            </ul>
                        @endif
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
</div>
