<?php

namespace App\Http\Controllers;

use App\Http\ServiceExport\CustomerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Activitylog;
use Illuminate\Support\Facades\Redirect;


class ManageCrontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.manage_dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.add_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
  
        $customer = new Customer([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'salary' => $request->get('salary'),
            'address' => $request->get('address')
        ]);
        $customer->save();
   
        return redirect()->route('manage.index')
                        ->with('success','created successfully.');    }

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
    public function edit($id)
    {
        $customer = Customer::where('customers.id', '=', $id)
            ->first();
        if ($customer ->active_status == 1 ) {
            $customer ->active_status = 'Active';
        }else{
            $customer ->active_status = 'InActive';
        }
        $data = array(
            'customer' => $customer,
        );
        //dd($data);
        return view('manage.view_customer', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $id)
    {
       // dd($request->all());
        Customer::Where('customers.id', '=', $request->customer_id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'salary' => $request->salary,
                'address' => $request->address,
            ]);
           // dd('hello');
        return redirect()->route('manage.index')
            ->with('success', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        Customer::where('customers.id','=',$id)->delete($id);
        

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
      }
       
    

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        $date = date("Y-m-d H:i:s");
        return Excel::download(new CustomerExport, 'Customer.xlsx');
    }

    public function getTable(Request $request)
    {
        $queryFirstname = $request->get('firstName');
        $queryLastname = $request->get('lastName');
        $queryEmail = $request->get('Email');

        $query = Customer::select(
            'customers.id AS customer_id',
            'customers.first_name',
            'customers.last_name',
            'customers.address',
            'customers.phone_number',
            'customers.salary',
            'customers.email',
            'customers.active_status',
            'customers.active_link',)   
            ->where('first_name', 'LIKE', '%' . $queryFirstname . '%')
            ->where('last_name', 'LIKE', '%' . $queryLastname . '%')
            ->where('email', 'LIKE', '%' . $queryEmail . '%')
            ->get();
    
            //dd($query);

        return DataTables()->of($query)
            ->addColumn('buttonView', function ($query) {
                return 
                '<a class="btn btn-success fa fa-edit" style="padding:6px 12px" href="manage/' . $query->customer_id . '/edit"></a>
                <a class="btn btn-danger fa fa-eraser" style="padding:6px 12px" id="btnDelete" onclick="btnDelete(' . $query->customer_id . ')"></a>';
            })
            // ->addColumn('status', function ($query) {
            //     $buttons="";
            //     if($query->active_status == 1){
            //      $buttons = '<a class="btn btn-success" type="button" style="padding:6px 12px" id="btnActive" href="manage/active/'.$query->customer_id.'">Active</a>';
                
            //     }else{
            //      $buttons = '<a class="btn btn-danger" type="button" style="padding:6px 12px" id="btnActive" href="manage/active/'.$query->customer_id.'">In Active</a>';  
            //     }
            //     return $buttons;
            // })
            ->rawColumns(['buttonView'
            //,'status'
            ])
            ->toJson();
    }
}
