<?php
/**
 * Created by PhpStorm.
 * User: Window
 * Date: 19-May-17
 * Time: 9:00 AM
 */
namespace application\controllers;
use application\models\Orders;
use application\models\Pages;
use application\models\Tours;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payee;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use vendor\base\Controller;
use vendor\helpers\Request;
use vendor\helpers\Session;
use vendor\security\Csrf;

class PaypalController extends Controller{
    private $_api_context;
    public function __construct()
    {
        $paypal_id = 'ASpheGX05ijFxf_7MWinWsvC1nIwrsJTe6btcRd-zNt96Y1eAoDc-4AbYcJTnQ05GzOlqC7MzUljaNMQ';
        $paypal_scret = 'EDYnrxv5LV3BpT1a_kCpC7o_La1adjkHca0Hfp5uq3SodGpbU4SNUVIkllBd6GnWUk1f3y5C2UVOWhEQ';
        $config =  array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => basePath().'/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    );
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_id,$paypal_scret));
        $this->_api_context->setConfig($config);
       // dd($this->_api_context);
    }
    public function actionIndex(){
        if(isset($_POST['paypal'])) {
            $paypal = $_POST['paypal'];
            $tour_id = $paypal['tour_id'];
            $user_name =$paypal['full_name'];
            $email =$paypal['email'];
            $phone =$paypal['phone'];
            $address =$paypal['address'];
            $total_guest = $paypal['total_guest'];
            $error = false;
            if(empty($user_name) || $user_name =''){
                $error =true;
                $message['username'] = "Tên không được để trống";
            }

            if(empty($email) || $email =''){

                $error =true;
                $message['email'] = "Email không được để trống";
            }
            if(empty($phone) || $phone =''){
                $error =true;
                $message['phone'] = "Điện thoại không được để trống";
            }
            if(empty($address) || $address =''){
                $error =true;
                $message['address'] = "Địa chỉ không được để trống";
            }
            if($error){
                $message['error'] = true;
                echo json_encode($message);
                return;
            }
            Session::setState('tour_id',$tour_id);
            $tour = Tours::model()->findById($tour_id);
            if($tour){
                $tour_name = $tour->name;
                $tour_price = number_format($tour->price/22000,2);
                $total_price = $tour_price * $total_guest;
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $item1 = new Item();
            $item1->setName($tour_name)
                ->setCurrency('USD')
                ->setQuantity($total_guest)
                ->setPrice($tour_price);
            $itemList = new ItemList();
            $itemList->setItems(array($item1));

            $details = new Details();
            $details
                ->setSubtotal($total_price);
// ### Amount
// Lets you specify a payment amount.
// You can also specify additional details
// such as shipping, tax.
            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($total_price)
                ->setDetails($details);
// ### Payee
// Specify a payee with that user's email or merchant id
// Merchant Id can be found at https://www.paypal.com/businessprofile/settings/
            $payee = new Payee();
            $payee->setEmail('abc@123.com');
// ### Transaction
// A transaction defines the contract of a
// payment - what is the payment for and who
// is fulfilling it.
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setPayee($payee)
                ->setInvoiceNumber(uniqid());

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(baseUrl() . '/paypal/status')
                ->setCancelUrl(baseUrl() . '/paypal/status');

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

           // dd($payment);
            try {
                $payment->create($this->_api_context);
            } catch (PayPalConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Some error occur, sorry for inconvenient');
                }
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            Session::setState('paypal_payment_id', $payment->getId());
            $order = new Orders();
                $order->username = $user_name;
                $order->email = $email;
                $order->phone = $phone;
                $order->tour_id = $tour_id;
                $order->total_guest = $total_guest;
                $order->address = $address;
                $order->price = $total_guest * $tour->price;
                $order->status = 'pendding';
                $order->payment_id = $payment->getId();
                $order->save();

            if (isset($redirect_url)) {
                // redirect to paypal
                    $message['error'] = false;
                    $message['url'] = $redirect_url;
                    echo json_encode($message);
                return ;
            }

            return $this->redirect('original.route')
                ->with('error', 'Unknown error occurred');
        }
        }
        else
            $this->redirect('/');
    }
    public function actionStatus(){

        $payment_id = Session::getState('paypal_payment_id');
        // clear the session payment ID
        Session::unsetState('paypal_payment_id');
        $tour_id = Session::getState('tour_id');
        $page = Pages::model()->findOne(['route'=>'tours/detail','model_id'=>$tour_id]);
        Session::unsetState('tour_id');
        if (empty(Request::getGet('PayerID')) || empty(Request::getGet('token'))) {
            return $this->redirect(baseUrl().'/'.$page->slug);
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId(Request::getGet('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') { // payment made
            Session::setState('payment_sucess',true);

            $order = Orders::model()->findOne(['payment_id'=>$payment_id]);
            $order->token = Request::getGet('token');
            $order->status = 'success';
            $order->save();
            $tour = Tours::model()->findById($tour_id);
            $tour->total_book = $tour->total_book + $order->total_guest;
            $tour->total_residual = $tour->total_residual - $order->total_guest;
            $tour->save();
            Session::setState('order_id',$order->id);
            return $this->redirect(baseUrl().'/'.$page->slug);

        }
        Session::setState('payment_sucess',false);
        return $this->redirect(baseUrl().'/'.$page->slug);
    }
    public static function beforAction($action)
    {
        new Csrf(false);
        return true;
    }

}