<?php

namespace App\Livewire\Form\Admin\Client;

use App\Jobs\ProcessImage;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\StockMovementType;
use App\Models\StockMovement;
use App\Models\StockStatus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Form;

class AddProductForm extends Form
{
    public $account_id;

    public $categories;

    public $category_id = ProductCategory::ARTISAN_BAKERY;

    public $picture_path;

    public $name;

    public $description;

    public $price;




    public $is_active = false;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->categories = ProductCategory::orderby('name', 'asc')->get();

        $this->account_id = $component->userConnected->id;
    }

    public function create()
    {
        $this->price = str_replace(',', '.', $this->price);
        $validatedData = $this->validate();
        $validatedData['price'] = (int) round($validatedData['price'] * 100);
        if ($this->picture_path) {

            $imageType = config('pickliopicture.imageType');
            $originalPath = config('pickliopicture.originalPath');

            $fileName = 'picklio'.Str::uuid().'.'.$imageType;
            $folder = sprintf(trim($originalPath, '/'), $this->account_id);

            $stream = $this->picture_path->readStream();
            $fullPath = $folder.'/'.$fileName;
            Storage::disk('s3')->put($fullPath, $stream);

            $fullPath = $folder.'/'.$fileName;

            $validatedData['picture_path'] = $fullPath;

            ProcessImage::dispatch($fullPath, $fileName, $this->account_id);
        }

        $product = Product::create([
            'account_id' => $validatedData['account_id'],
            'product_category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'is_active' => $validatedData['is_active'],
            'picture_path' => $validatedData['picture_path'],
        ]);
        Stock::create([
            'product_id' => $product->id,
            'quantity' => 0,
            'stock_status_id' => StockStatus::VERYLOW,
        ]);
        StockMovement::create([
            'product_id' => $product->id,
            'quantity' => 0,
            'stock_movement_type_id' => StockMovementType::TYPE_SUPPLY,
        ]);

        return $product;
    }

    public function rules()
    {
        return [
            'account_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|decimal:0,2',
            'is_active' => 'nullable|boolean',
            'picture_path' => 'required|image|mimes:jpg,jpeg,png,webp',
        ];

    }

    public function validationAttributes()
    {
        return [
            'name' => strtolower(__('client.products.forms.name.attribute')),
            'description' => strtolower(__('client.products.forms.description.attribute')),
            'category' => strtolower(__('client.products.forms.category.attribute')),
            'price' => strtolower(__('client.products.forms.price.attribute')),
            'is_active' => strtolower(__('client.products.forms.is_active.attribute')),
            'picture_path' => strtolower(__('client.products.forms.picture_path.attribute')),
        ];
    }
}
