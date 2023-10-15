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
            item.addEventListener('click', function(event) {
                const index = item.getAttribute('data-index');
                const subMenu = document.querySelector(`#submenu-${index}`);
                
                // Read the state from local storage
                const isExpanded = localStorage.getItem(`submenu-${index}-expanded`) === 'true';

                // Toggle the "aria-expanded" attribute
                subMenu.setAttribute('aria-expanded', !isExpanded);
                
                // Toggle the "mm-show" class
                if (!isExpanded) {
                    subMenu.classList.add('mm-show');
                } else {
                    subMenu.classList.remove('mm-show');
                }

                // Store the updated state in local storage
                localStorage.setItem(`submenu-${index}-expanded`, !isExpanded);

                // If the item was previously expanded, prevent the click event from bubbling up
                if (isExpanded) {
                    event.stopPropagation();
                }
            });
        });

        // Add event listeners to <ul> elements to stop event propagation
        const subMenus = document.querySelectorAll('.sub-menu');
        subMenus.forEach(function(subMenu) {
            subMenu.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    });
</script>
