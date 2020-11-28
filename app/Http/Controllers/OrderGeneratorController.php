<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\source_of_lead;
use Session;

class OrderGeneratorController extends Controller
{
    //
    public function show_new_order()
    {
        $orders = order::where('delivery_partner','=',NULL)->get();
        $delivery_partner = user::where('user_role','delivery-partner')->get();
        foreach($orders as $order)
            {
                
                $order['order_generator'] =  user::where('id',$order->order_generated_by)->first()->name;
               
            }
        return view('order_generator.new_order',["orders"=>$orders,'delivery_partners'=>$delivery_partner]);
    }
    public function view_report_menue()
    {
        $delivery_partner = user::where('user_role','delivery-partner')->get();
        $order_generator = user::where('user_role','order-generator')->get();
        return view('order_generator.report_menue',['delivery_partners'=>$delivery_partner,'order_generators'=>$order_generator]);
    }
    public function order_generate()
    {   
        $source_of_lead = source_of_lead::get();
        
        $order = order::latest()->first();
        if($order)
        {
            $order_no = $order->id;
        }
        else
        {
            $order_no = 0;
        }

        return view('order_generator.order_generate',['source_of_leads'=>$source_of_lead,'order_no'=>$order_no+1]);
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
        $source_of_lead = $request->source_of_lead;
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

    public function show_report_order_generator(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
             'to_date'=>'required',
            'delivery_partner' => 'required',
            

        ]);
            $user_id = 1;//Auth
            $from_date = date("Y-m-d", strtotime($request->from_date));
            $to_date = date("Y-m-d", strtotime($request->to_date."+1 days"));
           //file_put_contents('test.txt',$from_date." ".$to_date);
            $delivery_partner = $request->delivery_partner;
            
          
           // $orders = order::get();
            if($delivery_partner =="All")
            {
              // file_put_contents('test.txt','1');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('order_generated_by',$user_id)->get();
            }
            else 
            {
                //file_put_contents('test.txt','2');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('order_generated_by',$user_id)->where('delivery_partner',$delivery_partner)->get();
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

            $order_list = array();
            foreach($orders as $order)
            {
                if($order->order_complet_status==0)
                {
                    $delivery_status = 'Pending';
                }
                else{
                    $delivery_status = 'Complete';
                }
                array_push($order_list,[ 'Order No'=>$order->id,
                'Customer Name'=>$order->customer_name,
                'Customer Phone Number'=>$order->customer_phone_no,
                'Ticket No'=>$order->ticket_no,
                'Customer Address'=>$order->customer_address,
                'Customer Instruction'=>$order->customer_instruction,
                'Admin Instruction'=>$order->admin_instruction,
                'Source of Lead'=>$order->source_of_lead,
                'Order Generator'=>$order->order_generator,
                'Delivery Partner'=>$order->delivery_partner,
                'Order Generated Date and Time'=>$order->order_generated_date_time,
                'Delivery Completed Data and Time'=>$order->order_completed_date_time,
                'Delivery Status'=>$delivery_status]);
            }
      
           Session::push('order_list',$order_list);

            return view('order_generator.report',['orders'=>$orders]);
            
            

     
    } 


}
