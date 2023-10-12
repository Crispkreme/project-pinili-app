<div>
    <ul class="metismenu list-unstyled" id="side-menu">
        @foreach($sidebarMenuLists as $sidebarMenuList)
            <li>
                @if(isset($sidebarMenuList['isMenuTitle']) && $sidebarMenuList['isMenuTitle'])
                    <span class="{{ $sidebarMenuList['class'] }}">{{ $sidebarMenuList['list'] ?? '' }}</span>
                @else
                    @if(isset($sidebarMenuList['list']))
                        @if(isset($sidebarMenuList['submenu']) && count($sidebarMenuList['submenu']) > 0)
                            <a href="#" data-toggle="collapse" data-target="#submenu-{{ $loop->index }}" class="{{ $sidebarMenuList['class'] }}">
                                {!! $sidebarMenuList['icon'] !!}
                                <span>{{ $sidebarMenuList['list'] }}</span>
                            </a>
                            <ul id="submenu-{{ $loop->index }}" class="sub-menu collapse" aria-expanded="false">
                                <x-sidebar-menu :sidebarMenuLists="$sidebarMenuList['submenu']" />
                            </ul>
                        @else
                            <a href="{{ $sidebarMenuList['url'] }}" class="{{ $sidebarMenuList['class'] }}">
                                {!! $sidebarMenuList['icon'] !!}
                                <span>{{ $sidebarMenuList['list'] }}</span>
                            </a>
                        @endif
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
</div>
