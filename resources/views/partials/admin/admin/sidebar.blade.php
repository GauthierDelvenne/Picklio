<div class="contents">
<flux:sidebar sticky collapsible="mobile"
                  class="bg-zinc-50 h-screen dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.header>
            <flux:sidebar.brand
                href="{{route('client.dashboard')}}"
                logo="https://fluxui.dev/img/demo/logo.png"
                logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="Picklio"
            />
            <flux:sidebar.collapse class="lg:hidden"/>
        </flux:sidebar.header>
        <flux:sidebar.nav>
            <flux:heading class="sr-only" level="2">{{__('commons.sidebar.main-nav')}}</flux:heading>
            <flux:sidebar.item icon="home" href="{{route('admin.dashboard')}}"
                               :current="request()->routeIs('admin.dashboard')"
            >{{__('commons.pageName.admin.admin.dashboard')}}</flux:sidebar.item>
            <flux:sidebar.item icon="truck" badge="{{$this->orderCount}}" href="{{route('admin.order.index')}}"
                               :current="request()->routeIs('admin.order.index')">{{__('commons.pageName.admin.admin.orders')}}</flux:sidebar.item>
            <flux:sidebar.item icon="users" href="{{route('admin.merchant.index')}}"
                               :current="request()->routeIs('admin.merchant.index')">{{__('commons.pageName.admin.admin.merchants')}}</flux:sidebar.item>
            <flux:sidebar.item icon="clipboard-document-check" href="{{route('admin.stock.index')}}"
                               :current="request()->routeIs('admin.stock.index')">{{__('commons.pageName.admin.admin.stocks')}}</flux:sidebar.item>
            <flux:sidebar.item icon="chat-bubble-bottom-center" badge="{{$this->messageCount}}"
                               href="{{route('admin.message.index')}}"
                               :current="request()->routeIs('admin.message.index')">{{__('commons.pageName.admin.admin.messages')}}</flux:sidebar.item>
            <flux:sidebar.item icon="chart-bar" href="{{route('admin.statistics')}}"
                               :current="request()->routeIs('admin.statistics')">{{__('commons.pageName.admin.admin.statistics')}}</flux:sidebar.item>
        </flux:sidebar.nav>
        <flux:sidebar.spacer/>
        <flux:sidebar.nav>
            <flux:heading class="sr-only" level="2">{{__('commons.sidebar.sec-nav')}}</flux:heading>
            <flux:sidebar.item icon="cog-6-tooth" href="{{route('admin.settings')}}"
                               :current="request()->routeIs('admin.settings')">{{__('commons.pageName.admin.admin.settings')}}</flux:sidebar.item>
        </flux:sidebar.nav>
        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            <flux:button class="w-full">{{__('commons.sidebar.change-site')}}</flux:button>
            <flux:menu>
                <flux:menu.item icon="arrow-right-start-on-rectangle" class="hover:text-(--color-accent-content)">
                    <livewire:auth.logout/>
                </flux:menu.item>
                <a href="{{route('front.home')}}">
                    <flux:menu.item icon="home" class="hover:text-(--color-accent-content)">
                        {{__('commons.sidebar.mini-site')}}
                    </flux:menu.item>
                </a>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
        <flux:spacer/>
        <flux:dropdown position="top" alignt="start">
            <flux:button class="w-full">{{__('commons.sidebar.change-site')}}</flux:button>
            <flux:menu>
                <flux:menu.item icon="arrow-right-start-on-rectangle" class="hover:text-(--color-accent-content)">
                    <livewire:auth.logout/>
                </flux:menu.item>
                <a href="{{route('front.home')}}">
                    <flux:menu.item icon="home" class="hover:text-(--color-accent-content)">
                        {{__('commons.sidebar.mini-site')}}
                    </flux:menu.item>
                </a>
            </flux:menu>
        </flux:dropdown>
    </flux:header>
</div>
