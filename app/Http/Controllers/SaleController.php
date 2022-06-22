<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public static function send(Request $request){
        $url = 'https://preprod.paymeservice.com/api/generate-sale';
        $currency = explode('|', $request->currency);

        //Missing data replaced by 'null' to avoid exceptions and invoke API validation error
        $data = [
            'seller_payme_id' => 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N',
            'currency' => $currency[0] ?? null,
            'sale_price' => $request->amount ?? null,
            'product_name' => $request->name ?? null,
            'installments' => '1',
            'language' => 'en',
        ];

        $c = curl_init($url);
        curl_setopt_array($c, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-type: application/json',
            ],
        ]);

        $response = curl_exec($c);
        curl_close($c);

        $response = json_decode($response);
        
        if($response->status_code === 0){
            $sale = new Sale;
            $sale->name = $request->name;
            $sale->price = $response->price;
            $sale->currencie_id = $currency[1];
            $sale->api_status = $response->status_code;
            $sale->api_sale_url = $response->sale_url ?? null;
            $sale->api_sale_id = $response->payme_sale_id ?? null;
            $sale->api_sale_code = $response->payme_sale_code ?? null;
            $sale->api_transaction_id = $response->transaction_id ?? null;

            $sale->save();

           $msg = 'Sale added.';

        } else {
            $msg = $response->status_error_details;
        }

        return redirect()->route('pay')->with('msg', $msg);
    }

}
