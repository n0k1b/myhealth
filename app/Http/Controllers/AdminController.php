<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\restaurant_info;
use App\Models\menu;
use App\Models\expense;
use App\Models\order;
use App\Models\customer;
use App\Models\menu_category;
use App\Models\subscriber;
use App\Models\table_unique_id;
use Hash;
use Session;
use Auth;
use DB;
use App\Models\Classes\UssdReceiver;
use App\Models\Classes\UssdSender;
use App\Models\Classes\UssdException;
use App\Models\Classes\Logger;
 use App\Models\Classes\Subscription;
use App\Models\Classes\SubscriptionException;
use App\Models\Classes\SMSSender;
use App\Models\Classes\SMSServiceException;
use App\Models\Classes\OtpSender;
use App\Models\Classes\VerifyOtp;


use App\Models\Classes\SubscriptionReceiver;





class AdminController extends Controller
{

  public $res_id;
  public $auth_user_id;

    //frontend start


 public $app_id = "APP_038049";
    public $app_password = "e616e3b1711542e02c221acfacdabb6c";
    
    public function update_subscription_status()
    {
         $subscription = new Subscription('https://developer.bdapps.com/subscription/send', $this->app_id, $this->app_password);
         $subscriber = subscriber::where('subscription_status','!=','Other Operator')->where('subscription_status','!=','REGISTERED')->where('subscription_status','!=','TEMPORARY BLOCKED')->get();
         foreach($subscriber as $data)
         {
             $address = $data->mask;
             $status = $subscription->getStatus($address);
             subscriber::where('mask',$address)->update(['subscription_status'=>$status]);
         }
         
    }
    
    
        public function ussd() {
        //return $a;
        $production = true;
        if ($production == false) {
            $ussdserverurl = 'http://localhost:7000/ussd/send';
        } else {
            $ussdserverurl = 'https://developer.bdapps.com/ussd/send';
        }
        try {
            $receiver = new UssdReceiver();
            $ussdSender = new UssdSender($ussdserverurl, $this->app_id, $this->app_password);
            $subscription = new Subscription('https://developer.bdapps.com/subscription/send', $this->app_id, $this->app_password);
            // ile_put_contents('text.txt',$receiver->getRequestID());
            //$operations = new Operations();
            //$receiverSessionId  =   $receiver->getSessionId();
            $content = $receiver->getMessage(); // get the message content
            $address = $receiver->getAddress(); // get the ussdSender's address
            $requestId = $receiver->getRequestID(); // get the request ID
            $applicationId = $receiver->getApplicationId(); // get application ID
            $encoding = $receiver->getEncoding(); // get the encoding value
            $version = $receiver->getVersion(); // get the version
            $sessionId = $receiver->getSessionId(); // get the session ID;
            $ussdOperation = $receiver->getUssdOperation(); // get the ussd operation
            //file_put_contents('status.txt',$address);
            $responseMsg = " Subscription request successfull. Reply 1 for confirmation when pop-up generated .";
            if ($ussdOperation == "mo-init") {
                try {
                   
                    $ussdSender->ussd($sessionId, $responseMsg, $address, 'mt-fin');
                    $subscription->subscribe($address);
                }
                catch(Exception $e) {
                }
            }
        }
        catch(Exception $e) {
          //  file_put_contents('USSDERROR.txt', $e);
        }
    }
    public function edit_code_ui(Request $request)
    {
        $id = $request->id;
        $code = customer::where('id',$id)->first();
        //$code = $code->name;
        return view('owner.edit_category_info',['data'=>$code]);
    }
    
    public function update_code(Request $request)
    {
        $id = $request->id;
        $code = $request->name;
        customer::where('id',$id)->update(['name'=>$code]);
        return redirect()->route('show_all_code')->with('success','Code updated successfully');
    }
    
    public function verify_bdapps_otp(Request $request)
    {
        $otp = $request->otp;
        $reference_no = $request->reference_no;
         $mobile_number = $request->mobile_number;
        
        $verify_otp = new VerifyOtp($this->app_id,$this->app_password);
        $a = $verify_otp->verify_otp($otp,$reference_no);
       $a = json_decode(json_encode($a));
       file_put_contents('test.txt',json_encode($a));
        //return json_encode($a);
        if($a->statusCode =="E1854")
        {
            
            return view('otp',['reference_no'=>$reference_no,'mobile_number'=>$mobile_number])->with('error','OTP NOT MATCH');
        }
        
        else if($a->statusCode =="E1852")
        {
             return redirect()->to('/')->with('error','Maximum Number of otp attempt reached');
        }
        else if($a->statusCode == 'S1000')
        {
             $mask = $a->subscriberId;
             $subscriptionStatus = $a->subscriptionStatus;
             
             subscriber::where('mobile_number',$mobile_number)->update(['subscription_status'=>$subscriptionStatus,'mask'=>$mask]);
             
             return redirect()->to('/')->with('success','You will get SHE Identification Number (SIN) shortly.');
        }
        else
        {
              return redirect()->to('/')->with('error','Some error occured with bdapps api.Please try again after sometimes');
        }
       
 
    }
    public function send_bdapps_otp(Request $request)
    {
    $request->validate([
        'mobile_number' => 'required|regex:/01[13-9]\d{8}$/',
        'address' => 'required',
        'user_name'=>'required',
        'reference_name'=>'required'
    ]);
        
        $address = $request->mobile_number;
        $user_address = $request->address;
        $user_name = $request->user_name;
        if(str_starts_with($address,'018') || str_starts_with($address,'016') )
        {
            $otp_sender = new OtpSender($this->app_id,$this->app_password);
            $a = $otp_sender->send_otp($address);
          // return json_encode($a);
            $a = json_decode(json_encode($a));
            if($a->statusCode =="S1000")
            {
                $reference_no = $a->referenceNo;
                $check_avail = subscriber::where('mobile_number',$address)->first();
                if($check_avail)
                {
                    subscriber::where('mobile_number',$address)->delete();
                }
                 subscriber::create(['name'=>$user_name,'address'=>$user_address,'mobile_number'=>$address,'reference_name'=>$request->reference_name]);
                return view('otp',['reference_no'=>$reference_no,'mobile_number'=>$address]);
            }
            else
            {
                return redirect()->back()->with('error','Some error occured with bdapps Api. Please try again after sometimes');
            }
        //   // return $a->referenceNo;
             
          
        }
        else
        {
            $otp = mt_rand(100000,999999);
            Session::put('put',$otp);
                     $mobile_number = '88'.$address;
                $url = "http://gsms.pw/smsapi";
          $data = [
            "api_key" => "C20003436040f26e6f69b0.10063985",
            "type" => "text",
            "contacts" => $mobile_number,
            "senderid" => "8809601001329",
            "msg" => "Your She OTP is ".$otp,
          ];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          curl_close($ch);
          subscriber::create(['name'=>$user_name,'address'=>$user_address,'mobile_number'=>$address,'subscription_status'=>'Other Operator']);
          return view('otp_regular',['otp'=>$otp,'mobile_number'=>$address]);
          
        }
      
        
       // $otp_sender = new OtpSender($this->app_id,$this->app_password);
       // $a = $otp_sender->send_otp($address);
        
       // return $reference_no;
        //return json_encode($a);
    }
    
    public function verify_other_otp(Request $request)
    {
        $otp = $request->otp;
        $v_otp = $request->v_otp;
        $mobile_number = $request->mobile_number;
        if($otp == $v_otp)
        {   
            
     $code = customer::first();
     $code = $code->name;
     $code = $code.mt_rand(100000,999999);
     subscriber::where('mobile_number',$mobile_number)->update(['code_number'=>$code]);
            $msg = "Congratulations. You have successfully registered in SHE. 
Reg. SIN No :".$code."  
This code is valid for December 31,2021.

Team_SHE.";
              //$otp = mt_rand(100000,999999);
            //Session::put('put',$otp);
                     $mobile_number = '88'.$mobile_number;
                $url = "http://gsms.pw/smsapi";
          $data = [
            "api_key" => "C20003436040f26e6f69b0.10063984",
            "type" => "text",
            "contacts" => $mobile_number,
            "senderid" => "8809601001329",
            "msg" => $msg,
          ];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          curl_close($ch);
          
            return redirect()->to('/')->with('success','You will get SHE Identification Number (SIN) shortly.');
        }
        else
        {
             return view('otp_regular',['otp'=>$v_otp,'mobile_number'=>$mobile_number])->with('error','Otp Not Matched');
          // return redirect()->to('otp_regular')->with('error','OTP NOT MATCHED');
        }
    }
    public function send_sms(Request $request)
    {
            $msg = $request->msg;
          $sender = new SMSSender("https://developer.bdapps.com/sms/send", $this->app_id,$this->app_password);
           $sender->broadcast($msg);
           return redirect()->back()->with('success','Message Send Successfully');
    
    }
    
    public function subscriptionReport(Request $request)
    {
         $sender = new SMSSender("https://developer.bdapps.com/sms/send", $this->app_id,$this->app_password);
    
    $receiver     = new SubscriptionReceiver();
  
     $status = $receiver->getStatus();
    
      $application_id = $receiver->getApplicationId();
     $address = $receiver->getsubscriberId();
     //$address = ltrim($address, '88'); 
     $address = "tel:".$address;
     $timestamp = $receiver->getTimestamp();

     $myfile = fopen("SubscriptionNotificationLog.txt", "a+") or die("Unable to open file!");
     fwrite($myfile,$application_id." ".$address." ".$timestamp." ".$timestamp." ".$status.' '."Shee"."\n");
     
     $code = customer::first();
     $code = $code->name;
     $code = $code.mt_rand(100000,999999);
     
     if(subscriber::where('mask',$address)->first())
     {
     subscriber::where('mask',$address)->update(['code_number'=>$code,'subscription_status'=>$status]);
     }
     else
     {
         subscriber::create(['code_number'=>$code,'subscription_status'=>$status,'mask'=>$address]);
     }
    
    $msg = "Congratulations. You have successfully registered in SHE. 
Reg. SIN No :".$code."  
This code is valid for this December 31,2021.
Team_SHE.";
if($status !== 'UNREGISTERED')
    $sender->sms($msg,$address);
    }
    
    
 

    public function owner_home()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d');
        //file_put_contents('test.txt',$date);
        
        $total_pending_charge =subscriber::where('subscription_status','INITIAL CHARGING PENDING')->count();//subscriber::where('');
        $total_subscriber = subscriber::where('subscription_status','REGISTERED')->count();
        $total_temporary_block = subscriber::where('subscription_status','TEMPORARY BLOCKED')->count();
        $total_unsubscriber =subscriber::where('subscription_status','UNREGISTERED')->count();
        $total_user = subscriber::count();
        $total_other_operator = subscriber::where('subscription_status','Other Operator')->count();
        $total_error_user = subscriber::whereNull('subscription_status')->count();
        

        return view('owner.dashboard',['total_user'=>$total_user,'total_subscriber'=>$total_subscriber,'total_unsubscriber'=>$total_unsubscriber,'total_other_operator'=>$total_other_operator,'total_temporary_block'=>$total_temporary_block,'total_error_user'=> $total_error_user,'pending_charge'=>$total_pending_charge]);
    }
    public function logout()
    {

        auth()->logout();
        return redirect()->route('home');

    }

    public function login(Request  $request)
    {
        $credentials = array(
            'email' => $request->email,
            'password'=>$request->password
            );
            if (auth()->attempt($credentials)) {
               
                
                  return redirect()->route('owner_home');
                

            }
            else
            {
                return redirect()->back()->with('error','Email and password credential are wrong');
            }
    }




   
    



    public function test(Request $request)
    
    {
        $count = $request->count;
        
        $subscription = new Subscription('https://developer.bdapps.com/subscription/send', $this->app_id, $this->app_password);
        $subscribe = subscriber::where('mask','!=',NULL)->get();
        return $subscribe;
          
          
    }
   





    public function frontend_index(Request $request)
    {
       // file_put_contents('test.txt',"gello");
        $res_id = Session::get('res_id');

        $datas = menu::where('res_id',$res_id)->get();
        $datas = $datas->groupBy('category_id');
        $all_foods = menu::where('res_id',$res_id)->get();


       //
       $current_date = date("Y-m-d");
       $current_date = date("Y-m-d", strtotime($current_date."+1 days"));
       $previous_one_month_date = date("Y-m-d", strtotime($current_date."-30 days"));
       $previous_one_week_date = date("Y-m-d", strtotime($current_date."-7 days"));

      //whereBetween('created_at',[$current_date,$previous_one_month_date])
       $recomended = order::whereBetween('created_at',[$previous_one_month_date,$current_date])->where('active_status',1)->where('res_id',$res_id)->get();
      // file_put_contents('test.txt',$current_date." ".$previous_one_month_date." ".json_encode($recomended));
       $recomended = $recomended->groupBy('menu_id')->map->count();

       $menu_id_recomended = array();
       foreach($recomended as $menu_id =>$menu)
       {
           array_push($menu_id_recomended,$menu_id);
       }

       //$menu_id_recomended = json_encode($recomended);
//file_put_contents('test.txt',json_encode($menu_id_recomended)." ".$recomended);
       $recomended = menu::whereIn('id', $menu_id_recomended)->get();

       $fow = order::whereBetween('created_at',[$previous_one_week_date,$current_date])->where('active_status',1)->where('res_id',$res_id)->get();
       // file_put_contents('test.txt',$current_date." ".$previous_one_month_date." ".json_encode($recomended));
        $fow = $fow->groupBy('menu_id')->map->count();

        $menu_id_fow = array();
        foreach($fow as $menu_id =>$menu)
        {
            array_push($menu_id_fow,$menu_id);
        }

     
        $food_of_weeks = menu::whereIn('id', $menu_id_recomended)->get();

        $categories = menu_category::where('res_id',$res_id)->get();
        // file_put_contents('test.txt',json_encode($data2));
        return view('frontend.menu',compact('datas','categories','all_foods','recomended','food_of_weeks'));


    }

  

    public function show_all_code()
    {
        $code = customer::get();

      

        return view('owner.all_category',['datas'=>$code]);
    }
   


    public function show_all_subscriber()
    {
        
      
        $res_info = DB::table('subscriber')->get();

        return view('owner.all_subscriber',['datas'=>$res_info]);
    }
    
   
   
    
  


    //Report end




}