<div>
    <ul class="metismenu list-unstyled" id="side-menu">
        @foreach($sidebarMenuLists as $index => $sidebarMenuList)
            <li id="side-main-menu-{{ $index }}" data-index="{{ $index }}">
                @if(isset($sidebarMenuList['isMenuTitle']) && $sidebarMenuList['isMenuTitle'])
                    <span class="{{ $sidebarMenuList['class'] }}">{{ $sidebarMenuList['list'] ?? '' }}</span>
                @else
                    @if(isset($sidebarMenuList['list']))
                        @if(isset($sidebarMenuList['submenu']) && count($sidebarMenuList['submenu']) > 0)
                            <a href="#" data-toggle="collapse" data-target="#submenu-{{ $loop->index }}" class="{{ $sidebarMenuList['class'] }}" aria-expanded="false">
                                {!! $sidebarMenuList['icon'] !!}
                                <span>{{ $sidebarMenuList['list'] }}</span>
                            </a>
                            <ul id="submenu-{{ $loop->index }}" class="sub-menu collapse mm-collapse" aria-expanded="false" style="">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('[data-index]');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                const index = item.getAttribute('data-index');
                const subMenu = document.querySelector(`#submenu-${index}`);
                
                // Toggle the "aria-expanded" attribute
                const isExpanded = subMenu.getAttribute('aria-expanded') === 'true';
                subMenu.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');

                // Toggle the "mm-show" class
                if (isExpanded) {
                    subMenu.classList.remove('mm-show');
                } else {
                    subMenu.classList.add('mm-show');
                }
            });
        });
    });
</script>
