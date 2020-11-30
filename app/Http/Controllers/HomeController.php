<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __constructor()
    {
        # Verifying if user is Logged in
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Set page title
        $title = "Dashboard | Home | Engeplus";

        # Get all services
        $get_services = DB::table('services')->get();

        # Get all products
        $get_products = DB::table('products')->get();

        # Get all database service sales
        $selling_services = DB::table('selling_services')
        ->join('commissions', 'commissions.id', 'selling_services.id_commission')
        ->join('services', 'services.id', 'selling_services.id_service')
        ->select([
            'selling_services.id',
            'selling_services.id_user',
            'services.name',
            'selling_services.price', 
            'commissions.commission',
            'selling_services.created_at'
        ])->get();

        # Preparing to filter product sales informations
        $total_sell_ser = 0;
        $total_comm_ser = 0;
        $total_sell_ser_final = 0;

        foreach ($selling_services as $selling) {
            $total_sell_ser += $selling->price;
            $total_comm_ser += ($selling->price * $selling->commission) / 100;
        }

        $total_sell_ser_final = $total_sell_ser - $total_comm_ser;

        # Formating values to brazilian default money format "0.000,00"
        $total_sell_ser = number_format($total_sell_ser, 2, ',', '.');
        $total_comm_ser = number_format($total_comm_ser, 2, ',', '.');
        $total_sell_ser_final = number_format($total_sell_ser_final, 2, ',', '.');

        # Get all database product sales
        $selling_products = DB::table('selling_products')
        ->join('commissions', 'commissions.id', 'selling_products.id_commission')
        ->join('products', 'products.id', 'selling_products.id_product')
        ->select([
            'selling_products.id',
            'selling_products.id_user',
            'products.name',
            'selling_products.price', 
            'commissions.commission',
        ])->get();
        
        # Preparing to filter product sales informations
        $total_sell_prod = 0;
        $total_comm_prod = 0;
        $total_sell_prod_final = 0;

        foreach ($selling_products as $selling) {
            $total_sell_prod += $selling->price;
            $total_comm_prod += ($selling->price * $selling->commission) / 100;
        }

        $total_sell_prod_final = $total_sell_prod - $total_comm_prod;

        # Formating values to brazilian default money format "0.000,00"
        $total_sell_prod = number_format($total_sell_prod, 2, ',', '.');
        $total_comm_prod = number_format($total_comm_prod, 2, ',', '.');
        $total_sell_prod_final = number_format($total_sell_prod_final, 2, ',', '.');

        # Get all database salesman users
        $users = DB::table('users')
        ->where([['type', 'salesman']])
        ->select([
            'id', 'name', 'email', 'type'
        ])
        ->get();

        # Filtering commission values per user
        $user_comm_array = [];

        foreach ($users as $user) {
            $user_total_comm_ser = 0; 
            $user_total_comm_prod = 0;

            foreach ($selling_services as $selling) {
                if ($user->id === $selling->id_user) {
                    $user_total_comm_ser += ($selling->price * $selling->commission) / 100;
                }
            }

            foreach ($selling_products as $selling) {
                if ($user->id === $selling->id_user) {
                    $user_total_comm_prod += ($selling->price * $selling->commission) / 100;
                }
            }
            # Formating values to brazilian default money format "0.000,00"
            $total = number_format($user_total_comm_ser + $user_total_comm_prod, 2, ',', '.');
            $user_total_comm_ser = number_format($user_total_comm_ser, 2, ',', '.');
            $user_total_comm_prod = number_format($user_total_comm_prod, 2, ',', '.');

            $user_comm_array[$user->id] = [
                'services' => $user_total_comm_ser,
                'products' => $user_total_comm_prod,
                'total' => $total,
            ];
        }

        # Formating final services prices to brazilian money format
        foreach ($selling_services as $selling) {
            $selling->price = number_format($selling->price, 2, ',', '.');
        }

        # Formating final products prices to brazilian money format
        foreach ($selling_products as $selling) {
            $selling->price = number_format($selling->price, 2, ',', '.');
        }

        # Sending data to home view
        return view('home.index', compact(
            'get_services',
            'get_products',
            'title', 
            'total_sell_prod',
            'total_comm_prod',
            'total_sell_prod_final',
            'total_sell_ser',
            'total_comm_ser',
            'total_sell_ser_final',
            'users',
            'user_comm_array',
            'selling_services',
            'selling_products'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
