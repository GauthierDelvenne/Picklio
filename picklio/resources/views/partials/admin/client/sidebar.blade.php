<flux:sidebar sticky collapsible="mobile"
              class="bg-zinc-50 h-screen dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <flux:sidebar.brand
            href="{{route('admin.dashboard')}}"
            logo="https://fluxui.dev/img/demo/logo.png"
            logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
            name="Picklio"
        />
        <flux:sidebar.collapse class="lg:hidden"/>
    </flux:sidebar.header>
    <flux:sidebar.nav>
        <flux:sidebar.item icon="home" href="{{route('client.dashboard')}}" :current="request()->routeIs('client.dashboard')"
        >{{__('commons.pageName.admin.client.dashboard')}}</flux:sidebar.item>
        <flux:sidebar.item icon="clipboard-document-check" href="{{route('client.stock.index')}}" :current="request()->routeIs('client.stock.index')">{{__('commons.pageName.admin.client.stocks')}}</flux:sidebar.item>
        <flux:sidebar.item icon="chat-bubble-bottom-center" badge="12" href="{{route('client.message.index')}}" :current="request()->routeIs('client.message.index')">{{__('commons.pageName.admin.client.messages')}}</flux:sidebar.item>
        <flux:sidebar.item icon="chart-bar" href="{{route('client.statistics')}}" :current="request()->routeIs('client.statistics')">{{__('commons.pageName.admin.client.statistics')}}</flux:sidebar.item>
    </flux:sidebar.nav>
    <flux:sidebar.spacer/>
    <flux:button variant="primary" color="teal"> <flux:icon.plus/> Ajoutez un produit</flux:button>
    <flux:sidebar.nav>
        <flux:sidebar.item icon="cog-6-tooth" href="{{route('client.settings')}}" :current="request()->routeIs('client.settings')">{{__('commons.pageName.admin.client.settings')}}</flux:sidebar.item>
    </flux:sidebar.nav>
    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:sidebar.profile avatar="https://fluxui.dev/img/demo/user.png" name="Olivia Martin"/>
        <flux:menu>
            <flux:menu.item icon="arrow-right-start-on-rectangle">
                <livewire:auth.logout/>
            </flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
    <flux:spacer/>
    <flux:dropdown position="top" alignt="start">
        <flux:profile avatar="https://fluxui.dev/img/demo/user.png"/>
        <flux:menu>
            <flux:menu.item icon="arrow-right-start-on-rectangle">            <livewire:auth.logout/>
            </flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:header>

