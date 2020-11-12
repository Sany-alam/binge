<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\source_of_lead;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function add_user(Request $request)
    {

      $this->validation($request);
      $request['password']=Hash::make($request->password);
      user::create($request->except('password_confirmation'));
      return redirect()->back()->with('success',"User Added Successfully");
    }

    public function validation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_name'=>'required|unique:users',
            'password' => 'required|confirmed',
            'phone_number' => 'required',
            'user_role'=>'required'

        ]);
    }

    public function update_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_name'=>'required|unique:users',
            'phone_number' => 'required',
            'user_role'=>'required'

        ]);
        user::where('id',$request->user_id)->update(['name'=>$request->name,'user_name'=>$request->user_name,'phone_number'=>$request->phone_number,'user_role'=>$request->user_role]);
        return redirect()->route('show_all_user')->with('success','Password Update Successfully');;
    }
    public function submit_order(Request $request)
    {
        $request->validate([
            'customer_name'=>'required',
            'customer_phone_no'=>'required',
            'customer_address'=>'required',
            'source_of_lead'=>'required'

        ]);
        date_default_timezone_set("Asia/Dhaka");
        $order_no = $request->order_no;
        $customer_name = $request->customer_name;
        $ticket_no = $request->ticket_no;
        $source_of_lead = "test";
        $customer_address = $request->customer_address;
        $customer_phone_number = $request->customer_phone_no;
        $customer_instruction = $request->customer_instruction;
        $order_generated_by = 1;//Auth
        $order_generated_date_time = date('Y-m-d G:i:s');
        order::create(['customer_name'=>$customer_name,
        'ticket_no'=>$ticket_no,
        'customer_phone_no'=>$customer_phone_number,
        'customer_address'=>$customer_address,
        'source_of_lead'=>$source_of_lead,
        'customer_instruction'=>$customer_instruction,
        'order_generated_by'=>$order_generated_by,
        'order_generated_date_time'=>$order_generated_date_time
        
        ]);
        return redirect()->route('order-generate')->with('success','Order Created Successfully');



        //file_put_contents('test.txt',$order_no." ".$customer_name." ".$ticket_no." ".$source_of_lead." ".$customer_address." ".$customer_phone_number." ".$customer_instruction);

    }
    public function confirm_order(Request $request)
    {
        $order_id = $request->order_id;
        $delivery_partner = $request->delivery_partner;
        $admin_instruction = $request->admin_instruction;
        order::where('id',$order_id)->update(['delivery_partner'=>$delivery_partner,"admin_instruction"=>$admin_instruction]);
    }
    public function show_new_order()
    {
        $orders = order::where('delivery_partner','=',NULL)->get();
        $delivery_partner = user::where('user_role','delivery-partner')->get();
        foreach($orders as $order)
            {
                
                $order['order_generator'] =  user::where('id',$order->order_generated_by)->first()->name;
               
            }
        return view('admin.new_order',["orders"=>$orders,'delivery_partners'=>$delivery_partner]);
    }
    public function show_all_user()
    {
        $users = User::get();
        return view('admin.user_creation',['users'=>$users]);
    }
    public function update_password(Request $request)
    {
        $user_id = $request->id;
        return view('admin.update_password',['user_id'=>$user_id]);
    }
    public function view_report_menue()
    {
        $delivery_partner = user::where('user_role','delivery-partner')->get();
        $order_generator = user::where('user_role','order-generator')->get();
        return view('admin.report_menue',['delivery_partners'=>$delivery_partner,'order_generators'=>$order_generator]);
    }
    public function show_report(Request $request)
    {
            $from_date = date("Y-m-d", strtotime($request->from_date));
            $to_date = date("Y-m-d", strtotime($request->to_date."+1 days"));
           //file_put_contents('test.txt',$from_date." ".$to_date);
            $delivery_partner = $request->delivery_partner;
            $order_generator = $request->order_generator;
           // $orders = order::get();
            if($order_generator =='All' &&   $delivery_partner =="All")
            {
              // file_put_contents('test.txt','1');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->get();
            }
            else if($order_generator =='All' &&   $delivery_partner != "All")
            {
                //file_put_contents('test.txt','2');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('order_completed_by',$delivery_partner)->get();
            }
            else if($order_generator !='All' &&   $delivery_partner == "All")
            {
               // file_put_contents('test.txt','3');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('order_generated_by',$order_generator)->get();
            }
            foreach($orders as $order)
            {
                
                $order['order_generator'] =  user::where('id',$order->order_generated_by)->first()->name;
                if($order->delivery_partner !=NULL)
                {
                    $user_name = user::where('id',$order->delivery_partner)->first()->name;
                    $order['delivery_partner'] = $user_name;
                }
                else{
                    $order['delivery_partner'] ="Not Assigned";
                }
            }

            return view('admin.report',['orders'=>$orders]);
            
            

     
    } 

    public function update_user_password(Request $request)
    {
        $request->validate([

            'password' => 'required|confirmed',

        ]);
        $user_id = $request->id;
        $password = Hash::make($request->password);
        user::where('id',$user_id)->update(['password'=>$password]);
        return redirect()->route('show_all_user')->with('success','Password Update Successfully');
    }
    public function order_generate()
    {   
        $source_of_lead = source_of_lead::get();
        return view('admin.order_generate',['source_of_leads'=>$source_of_lead]);
    }
    public function edit_user(Request $request)
    {
        $user_id = $request->id;
       // file_put_contents('test.txt',$user_id);
        $user = User::where('id',$user_id)->first();
        return view('admin.edit_user',['user'=>$user]);
    }
}
