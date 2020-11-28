<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\order;
use App\Models\source_of_lead;
use App\Models\brand_promoter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class AdminController extends Controller
{
    //
   

    public function export_data()
    {
        date_default_timezone_set("Asia/Dhaka");
        $date = date("d-m-Y G.i.s");
        $data = Session::get('order_list');
        Session::pull('order_list');
        return Excel::download(new OrderExport($data), 'order_report_'.$date.'.xlsx');
    }
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
    public function submit_report_edit(Request $request)
    {
        Session::pull('order_list');
        $order_no = $request->order_no;
        $customer_name = $request->customer_name;
        $ticket_no = $request->ticket_no;
        $source_of_lead = $request->source_of_lead;
        $customer_address = $request->customer_address;
        $customer_phone_number = $request->customer_phone_no;
        $customer_instruction = $request->customer_instruction;
        $order_generated_by = 1;//Auth
        
        //file_put_contents('test.txt',$order_no." ".$customer_name." ".$ticket_no." ".$source_of_lead." ".$customer_address." ".$customer_phone_number." ". $customer_instruction);
        order::where('id',$order_no)->update(['customer_name'=>$customer_name,
        'ticket_no'=>$ticket_no,
        'customer_phone_no'=>$customer_phone_number,
        'customer_address'=>$customer_address,
        'source_of_lead'=>$source_of_lead,
        'customer_instruction'=>$customer_instruction,
        'order_generated_by'=>$order_generated_by,
       
        
        ]);
        $admin_order_report_credential = Session::get('admin_order_report_credential');
        //file_put_contents('test.txt',json_encode($bp_report_credential));
        $from_date = $admin_order_report_credential['from_date'];
        $to_date = $admin_order_report_credential['to_date'];
        $delivery_partner = $admin_order_report_credential['delivery_partner'];
        $order_generator = $admin_order_report_credential['order_generator'];
        if($order_generator =='All' &&   $delivery_partner =="All")
        {
          // file_put_contents('test.txt','1');
            $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->get();
        }
        else if($order_generator =='All' &&   $delivery_partner != "All")
        {
            //file_put_contents('test.txt','2');
            $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('delivery_partner',$delivery_partner)->get();
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
        return view('admin.report',['orders'=>$orders]);

        
    }
    public function bp_remarks(Request $request)
    {
        $order_id =$request->id;
       
         return view('admin.bp-remarks',['id'=>$order_id]);
    }
    public function bp_remarks_submit(Request $request)
    {
        $id = $request->id;
        
        //$user_id = 1;//Auth
        $report = brand_promoter::find($id);
        $report->update($request->all());
         $bp_report_credential = Session::get('bp_report_credential');
        // //file_put_contents('test.txt',json_encode($bp_report_credential));
        $from_date = $bp_report_credential['from_date'];
        $to_date = $bp_report_credential['to_date'];
        $brand_promoter_id = $bp_report_credential['brand_promoter_id'];
        if($brand_promoter_id ==="All")
        {
         $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        else
        {
         $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->where('brand_promoter_id',$brand_promoter_id)->get();

        }
        foreach($orders as $order)
        {
            $order['bp_name']= user::where('id',$order->brand_promoter_id)->first()->name;
        }
        return view('admin.report-bp',['orders'=>$orders]);
       // $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->where('brand_promoter_id',$user_id)->get();
      
        // return view('bp.report',['orders'=>$orders]);
    }
    public function show_bp_report(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
             'to_date'=>'required'

        ]);
         
            $from_date = date("Y-m-d", strtotime($request->from_date));
            $to_date = date("Y-m-d", strtotime($request->to_date."+1 days"));
            $brand_promoter_id = $request->brand_promoter;
            //$bp_name = user::where('id',$user_id)->first()->name;
            
           //file_put_contents('test.txt',$from_date." ".$to_date);
           if($brand_promoter_id ==="All")
           {
            $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->get();
           }
           else
           {
            $orders = brand_promoter::whereBetween('created_at',[$from_date,$to_date])->where('brand_promoter_id',$brand_promoter_id)->get();

           }
           foreach($orders as $order)
           {
               $order['bp_name']= user::where('id',$order->brand_promoter_id)->first()->name;
           }

            $bp_report_credential =['from_date'=>$from_date,'to_date'=>$to_date,'brand_promoter_id'=>$brand_promoter_id];
            Session::put('bp_report_credential',$bp_report_credential);
         
           

            return view('admin.report-bp',['orders'=>$orders]);
            
    }
    public function view_report_menue()
    {
        $delivery_partner = user::where('user_role','delivery-partner')->get();
        $order_generator = user::where('user_role','order-generator')->get();
        return view('admin.report_menue',['delivery_partners'=>$delivery_partner,'order_generators'=>$order_generator]);
    }
    public function view_bp_track_report_menue()
    {
        $brand_promoter = user::where('user_role','bp')->get();
        return view('admin.bp_tracker_menue',['brand_promoters'=>$brand_promoter]);

    }
    public function edit_report(Request $request)
    {
       $order_id =$request->id;
       $order = order::where('id',$order_id)->first();
       
       $source_of_lead = source_of_lead::get();
        return view('admin.edit_report',['order'=>$order,'source_of_leads'=>$source_of_lead]);
    }
    public function show_report(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
             'to_date'=>'required',
            'delivery_partner' => 'required',
            'order_generator'=>'required'

        ]);
            $from_date = date("Y-m-d", strtotime($request->from_date));
            $to_date = date("Y-m-d", strtotime($request->to_date."+1 days"));
           //file_put_contents('test.txt',$from_date." ".$to_date);
            $delivery_partner = $request->delivery_partner;
            $order_generator = $request->order_generator;
            $admin_order_report_credential =['from_date'=>$from_date,'to_date'=>$to_date,'delivery_partner'=>$delivery_partner,'order_generator'=>$order_generator];
            Session::put('admin_order_report_credential',$admin_order_report_credential);
           // $orders = order::get();
            if($order_generator =='All' &&   $delivery_partner =="All")
            {
              // file_put_contents('test.txt','1');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->get();
            }
            else if($order_generator =='All' &&   $delivery_partner != "All")
            {
                //file_put_contents('test.txt','2');
                $orders = order::whereBetween('order_generated_date_time',[$from_date,$to_date])->where('delivery_partner',$delivery_partner)->get();
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
        $order = order::latest()->first();
        if($order)
        {
            $order_no = $order->id;
        }
        else
        {
            $order_no = 0;
        }

        return view('admin.order_generate',['source_of_leads'=>$source_of_lead,'order_no'=>$order_no+1]);
    }
    public function edit_user(Request $request)
    {
        $user_id = $request->id;
       // file_put_contents('test.txt',$user_id);
        $user = User::where('id',$user_id)->first();
        return view('admin.edit_user',['user'=>$user]);
    }
}
