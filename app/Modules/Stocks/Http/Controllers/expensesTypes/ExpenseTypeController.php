<?php

namespace Stocks\Http\Controllers\expensesTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stocks\Models\ExpenseType;
use Yajra\Datatables\Datatables;


class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('stocks::expensesTypes.index');
    }

    public function expenseTypeData()
    {
        // $data = ExpenseType::all();
        $data = ExpenseType::latest()->get();
        // dd($data);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='" . __('translation.expenses.Edit') . "'
                        href='" . route('expensesTypes.edit', $row->slug) . "'> <i class='material-icons'>edit</i> </a>";
                $btn .= "<a class='delete-button btn btn-danger btn-sm'  href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stocks::expensesTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $data = requestAbstraction($request);
        // dd($data);
        $expenseType=ExpenseType::create($data);
         return redirectAccordingToRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        //
        return view('stocks::expensesTypes.edit',compact('expenseType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseType $expenseType,Request $request)
    {
        $data = requestAbstraction($request);
        $expenseType->update($data);
        return redirectAccordingToRequest($request);
    }


    public function destroy(ExpenseType $expenseType ,Request $request)
    {

        $expenseType->delete();
        return redirectAccordingToRequest($request);
    }
}
