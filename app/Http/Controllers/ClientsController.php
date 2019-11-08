<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Client;
use DB;

class ClientsController extends Controller
{
    protected $model;

    public function __construct(Client $model)
    {
        if(!Auth::check() && Auth::user()->level<3) {
            abort(403);
        }
        $this->model = $model;
    }

    // public function getAdd() {
    //     return view('client.client-add');
    // }   @if(Auth::user()->level >3) Xoá @endif

    public function store(Request $request) {
        $phone      = $request->input('phone');
        $name       = $request->input('name');
        $birthday   = $request->input('birthday');
        $zalo       = $request->input('zalo');
        $email       = $request->input('email');

        $data   = array(
            'phone'     => $phone,
            'name'      => $name,
            'birthday'  => $birthday,
            'zalo'      => $zalo,
            'email'     => $email
        );

        DB::table('clients')->insert($data);
        // return redirect('client-list');
        return redirect('client-list');
    }

    // public function getList(){
    //     $clients = DB::table('clients')->get();
    //     return view('client.client-list', ['clients' => $clients]);
    // }

    public function create(Client $client)
    {
        $data['clients'] = $client->all();
        return view('client.client-add', $data);
    }

    // public function store(Request $request)
    // {
    //     $this->model->create($request);
    //     return redirect()->route('client.client-list');
    // }

    public function getList()
    {
        $data['clients'] = $this->model->paginate(10);
        return view('client.client-list', $data);
    }

    public function getView($id){
        $clients = DB::select('select * from clients where id = ?',[$id]);
        return view('client.client-view', ['clients' => $clients]);
    }

    public function getEdit($id){
        $clients = DB::select('select * from clients where id = ?',[$id]);
        return view('client.client-edit', ['clients' => $clients]);
    }

    public function update(Request $request, $id)
    {
        $data = App\Model\Client::find($id);

        $phone      = $request->input('phone');
        $name       = $request->input('name');
        $birthday   = $request->input('birthday');
        $zalo       = $request->input('zalo');
        $email       = $request->input('email');

        $data   = array(
            'phone'     => $phone,
            'name'      => $name,
            'birthday'  => $birthday,
            'zalo'      => $zalo,
            'email'     => $email
        );

        $data->save();
        return redirect('client-list');
    }

}
