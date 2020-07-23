<?php

namespace App\Http\Controllers;

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

    	$service = Service::all();

    	foreach($service as $layanan){
    		$layananid = $layanan->id;
    		$layananprice = $layanan->unit_price;
    	}
    		foreach ($request->jumlah as $banyak) {
    			Trans_details::create([
	    			'trans_id' => $data->id,
	    			'service_id' => $layananid,
	    			'quantity' => $banyak,
					'amount' => $layananprice * $banyak,
	    		]);
    		}
    	


    	return redirect('/')->with('success', 'data berhasil ditambahkan');
    }

    public function genInvoice($id)
    {
    	$data = Transaksi::with(['details', 'customer'])->where('id', $id);

    	return view('genInvoice', ['$data'=> $data]);
    }
}
