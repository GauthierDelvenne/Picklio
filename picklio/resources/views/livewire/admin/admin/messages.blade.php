<flux:main>
    <section class="flex flex-col justify-between gap-10 mb-12 sm:flex-row">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.admin.messages')}}</flux:heading>
        <flux:modal.trigger name="send-message">
            <flux:button variant="primary">
                <flux:icon.plus/>
                {{__('admin.messages.send')}}
            </flux:button>
        </flux:modal.trigger>

    </section>
    <div
            class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('admin.messages.receiveMessage')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="messageStatus" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                                value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'users.name'" :direction="$sortDirection"
                                   wire:click="sort('users.name')">{{__('admin.messages.shop-name')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.messages.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.title.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.description.label')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->messages as $message)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.message.receive.show', $message->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$message->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $message->message_status_id == \App\Models\MessageStatus::VALID ? 'green' :
                            ($message->message_status_id == \App\Models\MessageStatus::UNVALID ? 'red' : 'zinc')">
                                • {{__('admin.messages.status.'.$message->message_status_id)}}
                            </flux:badge>

                        </flux:table.cell>
                        <flux:table.cell>
                            {{$message->title }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->description, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.message.receive.show', $message->id)}}">
                                        <flux:menu.item
                                                class="text-accent hover:text-accent-content">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete({{$message}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('admin.messages.delete-confirm', ['name' => $message->name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->messages" class="flex-wrap"/>
    </div>

    <div
            class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('admin.messages.suggestMessage')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="suggestMessageStatus" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                                value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="suggestSearch" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('admin.messages.user-name')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-email')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-merchantSuggest')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-productSuggest')}}</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->suggestMessages as $message)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.message.suggest.show', $message->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$message->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$message->email }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $message->message_status_id == \App\Models\MessageStatus::VALID ? 'green' :
                            ($message->message_status_id == \App\Models\MessageStatus::UNVALID ? 'red' : 'zinc')">
                                • {{__('admin.messages.status.'.$message->message_status_id)}}
                            </flux:badge>

                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->merchantSuggest, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->productSuggest, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.message.suggest.show', $message->id)}}">
                                        <flux:menu.item
                                                class="text-accent hover:text-accent-content">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="deleteSuggest({{$message}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('admin.messages.delete-confirm', ['name' => $message->name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->suggestMessages" class="flex-wrap"/>

    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('admin.messages.newMerchantMessage')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="suggestMessageStatus" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                            value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="suggestSearch" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('admin.messages.shop-name')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-email')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-description')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-address')}}</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->newMerchantMessages as $message)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.message.new-merchant.show', $message->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$message->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$message->email }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $message->message_status_id == \App\Models\MessageStatus::VALID ? 'green' :
                            ($message->message_status_id == \App\Models\MessageStatus::UNVALID ? 'red' : 'zinc')">
                                • {{__('admin.messages.status.'.$message->message_status_id)}}
                            </flux:badge>

                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->description, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $message->address }}  {{ $message->postal_code }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.message.new-merchant.show', $message->id)}}">
                                        <flux:menu.item
                                            class="text-accent hover:text-accent-content">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="deleteNewMerchant({{$message}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('admin.messages.delete-confirm', ['name' => $message->name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->newMerchantMessages" class="flex-wrap"/>
    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('admin.messages.contactMessage')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="suggestMessageStatus" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                            value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="suggestSearch" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('admin.messages.user-name')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-email')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-title')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.user-description')}}</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->contactMessages as $message)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.message.contact.show', $message->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$message->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$message->email }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $message->message_status_id == \App\Models\MessageStatus::VALID ? 'green' :
                            ($message->message_status_id == \App\Models\MessageStatus::UNVALID ? 'red' : 'zinc')">
                                • {{__('admin.messages.status.'.$message->message_status_id)}}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ $message->title }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->description, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.message.contact.show', $message->id)}}">
                                        <flux:menu.item
                                            class="text-accent hover:text-accent-content">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="deleteContact({{$message}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('admin.messages.delete-confirm', ['name' => $message->name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->contactMessages" class="flex-wrap"/>
    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('admin.messages.sendMessage')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="messageStatus" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                            value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'users.name'" :direction="$sortDirection"
                                   wire:click="sort('users.name')">{{__('admin.messages.shop-name')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.messages.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.title.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.messages.form.description.label')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->SendMessages as $message)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.message.show', $message->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$message->recipient->user->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $message->message_status_id == \App\Models\MessageStatus::VALID ? 'green' :
                            ($message->message_status_id == \App\Models\MessageStatus::UNVALID ? 'red' : 'zinc')">
                                • {{__('admin.messages.status.'.$message->message_status_id)}}
                            </flux:badge>

                        </flux:table.cell>
                        <flux:table.cell>
                            {{$message->title }}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{ Str::words($message->description, 5, '...') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.message.show', $message->id)}}">
                                        <flux:menu.item
                                            class="text-accent hover:text-accent-content">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete({{$message}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('admin.messages.delete-confirm', ['name' => $message->name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->SendMessages" class="flex-wrap"/>
    </div>
    <flux:modal name="send-message" class="md:w-96">
        <x-admin.modals.message.send-message/>
    </flux:modal>

</flux:main>
