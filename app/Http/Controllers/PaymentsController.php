<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Transaction;
use Braintree_Configuration;

class PaymentsController extends Controller
{
    public function transaction(Request $request){
        dd($request);
    }
    public function make(Request $request){

       
$amount = $request->input('amount');
$nonce = $request->input('payment_method_nonce');
$result = Braintree_Transaction::sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => True]
        ]); 
if ($result->success || !is_null($result->transaction)) {
   $transaction = $result->transaction;
   return redirect()->route('payment.transaction')->with('id', $transaction->id);;
} else {
   $errorString = "";
foreach($result->errors->deepAll() as $error) {
       $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
   	}
   	session(['errors' => $errorString]);
   	return redirect()->route('/shop');
}

    }
}
