<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\retailer;
use App\Models\source_of_lead;
use App\Models\order;

class RetailerController extends Controller
{
    //
    public function submit_order(Request $request)
    {
        // $request->validate([
        //     'customer_name'=>'required',
        //     'customer_address'=>'required',
        //     'source_of_lead'=>'required',
        //     'sold_status'=>'required',
        //     'device_quantity'=>'required',
        //     'device_serial_number'=>'required',
        //     'brand_promoter_remarks'=>'required'

        // ]);
        $request['retailer_id'] = 1;//Auth;
        retailer::create($request->all());
        return redirect()->route('order-generate-retailer')->with('success','Order Created Successfully');



        //file_put_contents('test.txt',$order_no." ".$customer_name." ".$ticket_no." ".$source_of_lead." ".$customer_address." ".$customer_phone_number." ".$customer_instruction);

    }
    public function order_generate()
    {   
        $source_of_lead = source_of_lead::get();
        
        $order = retailer::latest()->first();
        if($order)
        {
            $order_no = $order->id;
        }
        else
        {
            $order_no = 0;
        }

        return view('retailer.order_generate',['source_of_leads'=>$source_of_lead,'order_no'=>$order_no+1]);
    }

    public function edit_report(Request $request)
    {
       $order_id =$request->id;
       $order = brand_promoter::where('id',$order_id)->first();
       
       $source_of_lead = source_of_lead::get();
        return view('bp.edit_report',['order'=>$order,'source_of_leads'=>$source_of_lead]);
    }
    public function submit_edit_report(Request $request)
    {
        $id = $request->order_no;
        $user_id = 1;//Auth
        $report = brand_promoter::find($id);
        $report->update($request->except('order_no'));
        $bp_report_credential = Session::get('bp_report_credential');
        //file_put_contents('test.txt',json_encode($bp_report_credential));
        $from_date = $bp_report_credential['from_date'];
        $to_date = $bp_report_credential['to_date'];
        $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->where('brand_promoter_id',$user_id)->get();
      
        return view('bp.report',['orders'=>$orders]);
      
    }
    
    public function show_report(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
             'to_date'=>'required'

        ]);
            $user_id = 1;//Auth
            $from_date = date("Y-m-d", strtotime($request->from_date));
            $to_date = date("Y-m-d", strtotime($request->to_date."+1 days"));
           //file_put_contents('test.txt',$from_date." ".$to_date);
           
            $bp_report_credential =['from_date'=>$from_date,'to_date'=>$to_date];
            Session::put('bp_report_credential',$bp_report_credential);
           $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->where('brand_promoter_id',$user_id)->get();
           // $orders = order::get();
           
          
        //     $order_list = array();
           
        //    Session::push('order_list',$order_list);

            return view('bp.report',['orders'=>$orders]);
            
            

     
    } 
}
