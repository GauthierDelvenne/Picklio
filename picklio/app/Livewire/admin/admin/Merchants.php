<?php

namespace App\Livewire\admin\admin;

use App\Livewire\form\admin\admin\UpdateOrCreateMerchantForm;
use App\Livewire\PicklioComponent;
use App\Models\Account;
use App\Models\Status;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class Merchants extends PicklioComponent
{
    use WithPagination;

    public $sortBy = 'users.name';

    public $sortDirection = 'asc';

    public $countries;

    public $search;

    public $status;

    public UpdateOrCreateMerchantForm $form;

    public function mount(): void
    {
        $this->countries = config('countries');
    }

    public function sort(string $field): void
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * ResetPage me permet d'éviter des problèmes de filtre avec la pagination
     */
    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $user = $this->form->updateOrCreate();
        if (!empty($user)) {
            Flux::toast(__('admin.merchants.toast.create.success'), variant: 'success');
            Flux::modal('add-merchant')->close();
            $user->sendPasswordResetNotification($user->remember_token);
            $this->form->reset();
        } else {
            Flux::toast(__('admin.merchants.toast.create.error'), variant: 'danger');
        }
    }

    public function delete(Account $account)
    {
        if ($account->delete()) {
            Flux::toast(__('admin.merchants.toast.delete.success'), variant: 'success');
            Flux::modal('delete-merchant')->close();
        } else {
            Flux::toast(__('admin.merchants.toast.delete.error'), variant: 'danger');
        }
    }

    #[Computed]
    public function merchants()
    {
        return Account::merchants()
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->select('accounts.*', 'users.name as user_name')
            ->when($this->search, function ($query) {
                $query->where('users.name', 'like', '%'.$this->search.'%');
            })
            ->when($this->status, function ($query) {
                $query->where('accounts.status_id', $this->status);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function newMerchantsCount()
    {
        return Account::merchants()
            ->where('accounts.created_at', '>=', now()->subDays(30))
            ->count();
    }

    #[Computed]
    public function actifMerchantsCount()
    {
        return Account::merchants()
            ->where('accounts.status_id', Status::ACTIVE)
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.admin.merchants')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.merchants').' | Admin');
    }
}
