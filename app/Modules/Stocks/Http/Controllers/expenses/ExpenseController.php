<?php

namespace Stocks\Http\Controllers\expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stocks\Models\Expense;
use Stocks\Models\ExpenseType;
use Stocks\Http\Requests\storeExpense;
use Yajra\Datatables\Datatables;

class ExpenseController extends Controller
{

    public function index()
    {
        //
        return view('stocks::expenses.index');
    }

    public function expenseData()
    {

        $data= Expense::join('expense_types','expense_types.id','=','expenses.expense_type_id')->select('expenses.*','expense_types.type as expense_type' )->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='" . __('translation.expenses.Edit') . "'
                        href='" . route('expenses.edit', $row->slug) . "'> <i class='material-icons'>edit</i> </a>";
                $btn .= "<a class='delete-button btn btn-danger btn-sm'  href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $expenseTypes=ExpenseType::select('type','id')->get();
        return view('stocks::expenses.create',compact('expenseTypes'));
    }


    public function store(storeExpense $request )
    {
        $data = requestAbstraction($request);
        Expense::create($data);

        return redirectAccordingToRequest($request);
    }

    public function show($id)
    {
        //
    }

    public function edit(Expense $expense)
    {
        $expenseTypes=ExpenseType::select('type','id')->get();
        return view('stocks::expenses.edit',compact('expense','expenseTypes'));
    }

    public function update(Expense $expense,Request $request)
    {
        $data = requestAbstraction($request);
        $expense->update($data);
        return redirectAccordingToRequest($request);
    }

    public function destroy(Expense $expense ,Request $request)
    {

        $expense->delete();
        return redirectAccordingToRequest($request);
    }
}
