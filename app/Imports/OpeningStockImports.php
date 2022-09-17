<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use Stocks\Models\Product;
use Suppliers\Models\Supplier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OpeningStockImports implements ToCollection, SkipsEmptyRows, WithHeadingRow, WithValidation
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $collection)
    {
        $brands = $collection->unique('brand')->transform(function ($item, $key) {
            return  Brand::create(['name' => $item['brand']]);
        });
        $categories = $collection->unique('category')->transform(function ($item, $key) {
            return  Category::create(['name' => $item['category']]);
        });

        $products = $collection->unique('item_name')->transform(function ($item, $key) use($brands,$categories) {
            return  Product::create(
                [
                    'name' => $item['item_name'],
                    'code'=>uniqid(),
                    'desc'=>$item['details'],
                    'brand_id'=>$brands->where('name',$item['brand'])->first()->id,
                    'category_id'=>$categories->where('name',$item['category'])->first()->id
                ]
            );
        });

        $suppliers = $collection->unique('supplier')->transform(function ($item, $key) {
            return  Supplier::create(['name' => $item['supplier']]);
        });



        $product_supplier = $collection->transform(function ($item, $key) use($products,$suppliers) {
            $supplier = Supplier::where('name',$item['supplier'])->first();
            $supplier->product_supplier()->attach($products->where('name',$item['item_name'])->first()->id,[
                'quantity'=>$item['opening_stock_quantity'],
                'sale_price'=>$item['sale_price'],
                'purchase_price'=>$item['purchase_price'],
                'madein'=>$item['made_in'],
                'create_status'=>'OPENING_STOCK',
                'code'=>uniqid()
            ]);
        });
    }

    public function rules(): array
    {
        return [
            'item_name' => ['required'],
            'supplier' => ['required'],
            'sale_price' => ['required', 'numeric'],
            'purchase_price' => ['required', 'numeric'],
            'opening_stock_quantity' => ['required', 'numeric'],
            'brand' => ['required'],
            'category' => ['required'],
            // 'made_in' => ['required'],
            // 'details' => ['required'],
        ];
    }
}
