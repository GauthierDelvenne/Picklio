<?php

namespace App\Livewire\Front;

use App\Livewire\Form\Front\SendMessageForm;
use App\Livewire\PicklioComponent;
use App\Mail\SuggestAdminMessageMail;
use App\Mail\SuggestMessageMail;
use App\Models\Account;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\Status;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Mail;

class Catalogues extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $searchMerchant;

    public $merchant = [];

    public $category = [];


    public SendMessageForm $form;

    public function mount(): void
    {
        $this->merchant = session()->pull('merchant', []);
        $this->category = session()->pull('category', []);
    }

    public function sendMessage()
    {
        $message = $this->form->create();
        if ($message) {
            $this->dispatch('form-sent');
            $account = Account::where('id', $this->form->recipient_id)->first();
            $email = $account->email;
            Mail::to($this->form->email)->send(new SuggestMessageMail);
            Mail::to($email)->send(new SuggestAdminMessageMail($message, $this->form->name));
            $this->form->reset();
        }
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function sortByPrice()
    {
        $this->sortBy = 'price';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function sortByName()
    {
        $this->sortBy = 'name';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
            'account.user',
        ])
            ->where('is_active', 1)
            ->whereHas('account', function ($query) {
                $query->where('status_id', Status::ACTIVE);
            })
            ->whereHas('stock', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->whereIn('product_category_id', $this->category);
            })
            ->when($this->merchant, function ($query) {
                $query->whereIn('account_id', $this->merchant);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);
    }
    #[Computed]
    public function categories()
    {
        return ProductCategory::orderby('name', 'asc')->get();
    }
    #[Computed]
    public function merchants()
    {
        return Account::join('users', 'users.id', 'accounts.user_id')
            ->with('user')
            ->where('status_id', Status::ACTIVE)
            ->when($this->searchMerchant, function ($query) {
                $query->where('users.name', 'like', '%' . $this->searchMerchant . '%');
            })
            ->where('role_id', Role::MERCHANT)
            ->get();
    }

    #[Computed]
    public function isUserAlreadyOrder()
    {
        if (!empty($this->userConnected)) {
            $orderCount = Order::where('account_id', $this->userConnected->account->id)->count();
            if ($orderCount > 2) {
                return false;
            } else {
                return true;
            }
        }
        return true;
    }

    public function goToCategory($categoryId): void
    {
        session(['category' => [$categoryId]]);
        $this->redirect(route('front.catalogue.index'));
    }

    public function goToMerchant($merchantId)
    {
        session(['merchant' => [$merchantId]]);
        $this->redirect(route('front.catalogue.index'));
    }

    public function goToProduct($id)
    {
        return redirect()->route('front.catalogue.show', $id);
    }


    #[Computed]
    public function cartItems()
    {
        if (!empty($this->userConnected->account)) {
            $cart = $this->getCartByAccount(
                $this->userConnected->account->id
            );
            if (!empty($cart)) {
                return $cart->orderItems()
                    ->select('product_id', 'quantity')
                    ->get()
                    ->keyBy('product_id');
            }
            return null;
        }
    }

    public function resetArray(string $name)
    {
        if ($name == 'category') {
            $this->category = [];
        } elseif ($name == 'merchant') {
            $this->merchant = [];
        }
    }
    public function selectArray(string $name)
    {

        if ($name == 'category') {
            $this->category = $this->categories->pluck('id');
        } elseif ($name == 'merchant') {
            $this->merchant = $this->merchants->pluck('id');
        }
    }

    public function render()
    {
        return view('livewire.front.catalogue')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.catalogue') . ' | Picklio');
    }
}
