<?php 

/*
 * paypal config and setting 
*/

return[
 //Sandbox
  'sandbox_client_id'=>env('PAYPAL_SANDBOX_CLIENT_ID',''),
  'sandbox_secret'=>env('PAYPAL_SANDBOX_SECRET',''),

 //live
  'live_client_id'=>env('PAYPAL_LIVE_CLIENT_ID'),
  'live_secret'=>env('PAYPAL_LIVE_SECRET'),

 //Paypal SDK configuration
  'settings'=>[
  	 //Mode (live or sandbox)
     'mode'=>env('PAYPAL_MODE','sandbox'),
     'http.ConnectionTimeOut'=>3000,
     //logs
     'log.LongEnabled'=>true,
     'log.FileName'=>storage_path().'/logs/paypal.log',
     //level : debug , info , warnin , error
     'log.LogLevel'=>'DEBUG'
   ]
];