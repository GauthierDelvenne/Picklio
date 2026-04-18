<flux:main>
    <flux:heading size="xl" level="1">{{__('commons.pageName.admin.admin.settings')}}</flux:heading>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col mt-20">
        <div class="mb-6">
            <flux:heading size="l">{{__('admin.settings.theme.title')}}</flux:heading>
        </div>
        <div class="w-1/2">
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun">{{__('admin.settings.theme.light')}}</flux:radio>
                <flux:radio value="dark" icon="moon">{{__('admin.settings.theme.dark')}}</flux:radio>
                <flux:radio value="system" icon="computer-desktop">{{__('admin.settings.theme.system')}}</flux:radio>
            </flux:radio.group>
        </div>
    </div>
    {{--<div class="flex flex-col mt-20">
        <div class="mb-6">
            <flux:heading size="l">{__('admin.settings.lang')}}</flux:heading>
        </div>
        <div class="w-1/2">
            <flux:select>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <flux:select.option>{{ $properties['native'] }}</flux:select.option>
                    </a>
                @endforeach

            </flux:select>
        </div>
    </div>--}}
</flux:main>
