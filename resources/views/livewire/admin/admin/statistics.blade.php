<flux:main>
    <section class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.admin.statistics')}}</flux:heading>
    </section>
    <div class="flex flex-col justify-between gap-10 mb-12 md:flex-row">
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.totalSale')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderPriceCount}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.monthSale')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderMonthPriceCount}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.daySale')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderDayPriceCount}}</flux:text>
        </flux:card>
    </div>
    <div class="flex flex-col justify-between gap-10 mb-12 md:flex-row">

        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.totalOrder')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderCount}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.monthOrder')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderMonthCount}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.dayOrder')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->orderDayCount}}</flux:text>
        </flux:card>
    </div>
    <div class="flex flex-col justify-between gap-10 mb-12 md:flex-row">
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.merchantCount')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->merchantCount}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('commons.stat.productCount')}}</flux:heading>
            <flux:text class="mt-2" size="xl" variant="strong">{{$this->productCount}}</flux:text>
        </flux:card>
    </div>
</flux:main>
