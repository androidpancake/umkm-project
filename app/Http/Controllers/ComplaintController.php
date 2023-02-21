<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function complaint(){
        $title = 'Komplain';
        $complaints = Complaint::where('umkm_id', Auth::user()->id)->get();
        return view('umkm.complaint', compact('complaints'))->with('title', $title);
    }

    public function complaint_action(Request $request){
        $complaint = new Complaint(); 

        $complaint->subject = $request->subject;
        $complaint->desc = $request->description;
        $complaint->umkm_id = Auth::user()->id;
        // $complaint->admin_id = 1; 
        $complaint->type = "Title";
        $complaint->status = "Menunggu konfirmasi";
        // $complaint->admin_status = "Menunggu konfirmasi";
        $complaint->save();

        return redirect('umkm/complaint');
    }

    public function reply_message($id, Request $request){
        $complaint = Complaint::find($id);
        $complaint->admin_status = "Selesai";
        $complaint->save();

        $reply = new Reply();
        $reply->complaint_id = $id;
        $reply->from = Auth::user()->id;
        $reply->to = $complaint->admin_id;
        $reply->reply_desc = $request->reply_desc;
        $reply->save();
        
        return redirect('umkm/complaint');
    }
    public function complaint_done($id){
        //perlu tanggal komplain yang sudah ditutup
        $complaint = Complaint::find($id);
        $complaint->status = "Selesai";
        $complaint->save();

        return redirect('umkm/complaint');
    }
}
