<flux:main>
    <div class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="1">{{__('commons.pageName.admin.client.messages')}}</flux:heading>
        <flux:modal.trigger name="send-message">
            <flux:button variant="primary">
                <flux:icon.plus/>
                {{__('admin.messages.send')}}
            </flux:button>
        </flux:modal.trigger>
    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.messages')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:select wire:model.live="messageStatus">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                            value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->messages">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'users.name'" :direction="$sortDirection"
                                   wire:click="sort('users.name')">{{__('admin.messages.admin-name')}}
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
                            <a href="{{ route('client.message.show', $message->id) }}"
                               class="hover:text-(--color-accent-content)">
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
                            {{$message->description }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <flux:menu.item wire:click="delete({{$message}})"
                                                    class="hover:text-(--color-accent-content)"
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
    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('admin.messages.newMerchantMessage')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:select wire:model.live="suggestMessageStatus">
                    <flux:select.option value="">{{__('admin.messages.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->messageStatuses as $key => $messageStatus)
                        <flux:select.option
                            value="{{$messageStatus->id}}">{{__('admin.messages.status.'.$messageStatus->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="suggestSearch" icon="magnifying-glass"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->contactMessages">
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
                            <a href="{{ route('client.message.contact.show', $message->id) }}"
                               class="hover:text-(--color-accent-content)">
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
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('client.message.contact.show', $message->id)}}">
                                        <flux:menu.item
                                            class="hover:text-(--color-accent-content)">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="deleteContact({{$message}})"
                                                    class="hover:text-(--color-accent-content)"
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
    </div>
    <flux:modal name="send-message" class="md:w-96">
        <x-client.modals.message.send-message/>
    </flux:modal>
</flux:main>
