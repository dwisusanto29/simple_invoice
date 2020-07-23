<?php

namespace App\Http\Controllers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Model\Transaction;
use App\Model\Service;
use App\Model\Trans_details;
use App\Model\Customer;
use App\Model\Transaksi;
use Illuminate\Support\Facades\DB;



class TransactionController extends Controller
{
	public function index()
	{
		return view('app/list');
	}

    public function list()
    {
    	$data = Transaksi::with(['details', 'customer']);

    	return DataTables::of($data)
    		->addColumn('action', function ($data) {
                            $button = '<button type="button" name="gen" id="' . $data->id . '" class="edit btn btn-primary btn-sm "><i class="fa fa-eye"></i>Generate Invoice</button> ';
                            return $button;
                        })
    		->rawColumns(['action'])
    		->addIndexColumn()
    		->make(true);
    }

    public function create()
    {
    	$customer = Customer::all();
    	$service = Service::all();

    	return view('app.add', ['customer' => $customer, 'services' => $service]);

    }

    public function store(Request $request)
    {


        $pesan = [
            'required' => ':attribute Wajib di Isi',
        ];

        $this->validate($request, [
            'due_date' => 'required',
            'issue_date' => 'required',
            'subject' => 'required',
        ], $pesan);


    	$data = Transaction::create([
    		'customer_id' => $request->customer_id,
    		'due_date' => $request->due_date,
    		'issue_date' => $request->issue_date,
    		'subject' => $request->subject,
    	]);
    		$i = 1;

    		foreach ($request->jumlah as $banyak) {
    			Trans_details::create([
	    			'trans_id' => $data->id,
	    			'service_id' => $i,
	    			'quantity' => $banyak,
					//'amount' => $layananprice * $banyak,
	    		]);
	    		$i++;
    		}
    	
    	


    	return redirect('/')->with('success', 'data berhasil ditambahkan');
    }

    public function genInvoice($id)
    {
    	$data = Transaksi::with(['details', 'customer'])->where('id', $id)->get();
    	foreach($data as $transaksi){
    		$customerid = $transaksi->customer_id;
    	}

    	$costumer = Customer::findOrFail($customerid)->get();

    	$details = DB::table('t_transaction_details')
    		->join('m_services', 'm_services.id', '=',  't_transaction_details.service_id')
    		->join('m_type', 'm_type.id', '=', 'm_services.type_id')
    		->select('m_type.type as type', 'm_services.description as description', 't_transaction_details.quantity as quantity', 'm_services.unit_price as unit_price')
    		->where('t_transaction_details.trans_id', $id)->get();

    	return view('genInvoice', ['result' => $data, 'details' => $details, 'costumer' => $costumer ] );
    }

    public function getData($id)
    {
    	$data = Transaksi::with(['details', 'customer'])->where('id', $id)->get();

    	return response()->json(['data' => $data ]);
    }


}
