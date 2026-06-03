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
            <flux:sidebar.item icon="home" href="{{route('client.dashboard')}}"
                               :current="request()->routeIs('client.dashboard')"
            >{{__('commons.pageName.admin.client.dashboard')}}</flux:sidebar.item>
            <flux:sidebar.item icon="clipboard-document-check" href="{{route('client.stock.index')}}"
                               :current="request()->routeIs('client.stock.index')">{{__('commons.pageName.admin.client.stocks')}}</flux:sidebar.item>
            <flux:sidebar.item icon="chat-bubble-bottom-center" badge="{{$messageCount}}"
                               href="{{route('client.message.index')}}"
                               :current="request()->routeIs('client.message.index')">{{__('commons.pageName.admin.client.messages')}}</flux:sidebar.item>
            <flux:sidebar.item icon="chart-bar" href="{{route('client.statistics')}}"
                               :current="request()->routeIs('client.statistics')">{{__('commons.pageName.admin.client.statistics')}}</flux:sidebar.item>
        </flux:sidebar.nav>
        <flux:sidebar.spacer/>
        <flux:modal.trigger name="add-product">
            <flux:button variant="primary">
                <flux:icon.plus/>
                {{__('client.products.add')}}
            </flux:button>
        </flux:modal.trigger>
        <flux:modal name="add-product">
            <livewire:admin.client.client-product/>
        </flux:modal>
        <flux:sidebar.nav>
            <flux:heading class="sr-only" level="2">{{__('commons.sidebar.sec-nav')}}</flux:heading>
            <flux:sidebar.item icon="cog-6-tooth" href="{{route('client.settings')}}"
                               :current="request()->routeIs('client.settings')">{{__('commons.pageName.admin.client.settings')}}</flux:sidebar.item>
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
