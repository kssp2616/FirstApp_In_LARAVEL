<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

use App\Models\order;
use App\Http\Requests\orderrequest;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
//part II
use PayPal\Api\PaymentExecution;
class paymentcontroller extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;
    
    public function __construct()
    {
      if(config('paypal.settings.mode')=='live')
      {
      	$this->clientId=config('paypal.live_client_id');
      	$this->secret=config('paypal.live_secret');
      }else{
      	$this->clientId=config('paypal.sandbox_client_id');
      	$this->secret=config('paypal.sandbox_secret');
      }
      $this->apiContext=new ApiContext(new OAuthTokenCredential($this->clientId,$this->secret));
      $this->apiContext->setConfig(config('paypal.settings'));
    }
    public function payWithPaypal(Request $request)
    {  
    

       $title=$request->input('title');
       $price=$request->input('price');
       
       //set payer
       $payer = new Payer();
       $payer->setPaymentMethod("paypal");

       //item(s)
       $item = new Item();
       $item->setName($title)
	    ->setCurrency('USD')
	    ->setQuantity(1)
	    ->setDescription("item description")
	    ->setPrice($price);

       //itemList
	    $itemList= new ItemList();
	    $itemList->setItems([$item]);

	   //amount
	    $amount = new Amount();
        $amount->setCurrency("USD")
	    ->setTotal($price);
	   //transaction
         $transaction = new Transaction();
		 $transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Buying something from my web site");
	   //redirect Urls
		 $RedirectUrls = new RedirectUrls();
		 $RedirectUrls->setReturnUrl('http://127.0.0.1:8000/status')
		              ->setCancelUrl('http://127.0.0.1:8000/canceled');
	   //payment
		 $payment = new Payment();
		 $payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($RedirectUrls)
		    ->setTransactions(array($transaction));
		try{
			$payment->create($this->apiContext);
		}catch(\PayPal\Exception\PPConnectionException $ex)
		{
			die($ex);
		}
		$paymentLink = $payment->getApprovalLink();
		return redirect($paymentLink);
    }

    public function status(Request $request){
        if(empty($request->input('PayerID')) || empty($request->input('token')))
        {
        	die('Payment Failed.');
        }
        $paymentId = $request->get('paymentId');
        $payment   = Payment::get($paymentId,$this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution,$this->apiContext);
        if($result->getState()=='approved')
        {
          //replace it here(insertion)
        	die('thank you.');
        }
        echo "Payment Failed Again";
        die($result);
    }

    public function canceled(){
    	return "Payment Canceled. No Worries ";
    }
}
