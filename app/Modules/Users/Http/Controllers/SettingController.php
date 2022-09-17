<?php

namespace Users\Http\Controllers;

use Users\Models\Setting;
use App\Http\Controllers\Controller;
use App\Imports\OpeningStockImports;
use Maatwebsite\Excel\Facades\Excel;
use Users\Http\Requests\storeSetting;
use Maatwebsite\Excel\HeadingRowImport;
use App\Http\Requests\OpeningStoreRequest;
use Illuminate\Support\Facades\Validator;
use Stocks\Models\Product;
use Suppliers\Models\Supplier;

class SettingController extends Controller
{
    private const openingStockStage = 4;
    private const  COMPLETED = 1;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectSettings()
    {
        return view('users::users.settings.language');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSelectSettings(storeSetting $request)
    {
        $data = requestAbstraction($request);
        $setting = Setting::first();
        $setting->insertSingleMedia($request->image, 'logo');
        $setting->update($data);
        $setting->update(['status' => $this::openingStockStage]);
        return redirect()->route('home');
    }

    public function generalSettings()
    {
        return view('users::users.settings.main');
    }

    public function openingStock()
    {
        return view('users::users.settings.openingStock');
    }

    public function OpeningStockStore(OpeningStoreRequest $request)
    {
        if($request->has('redirect')){
            $headings = array_flip((new HeadingRowImport)->toArray($request->file('media'))[0][0]);
            $validator = Validator::make($headings,[
                "item_name" => 'required',
                "supplier" => 'required',
                "brand" => 'required',
                "category" => 'required',
                "details" => 'required',
                "made_in" => 'required',
                "sale_price" => 'required',
                "purchase_price" => 'required',
                "opening_stock_quantity" => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }else{
                $collection = Excel::import(new OpeningStockImports,$request->file('media'));
            }
        }
        return $this->completeConfiguration();
    }

    private function completeConfiguration(){
        $setting = Setting::find(1);
        $setting->status = self::COMPLETED;
        $setting->save();
        return redirect()->route('home');
    }
}
