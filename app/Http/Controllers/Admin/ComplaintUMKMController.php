<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintUMKMController extends Controller
{
    public function complaint(){
        $title = 'Komplain UMKM';
        $complaints = Complaint::all()->where('status', 'Menunggu konfirmasi');
        $complaints_handled = Complaint::where('admin_id', Auth::user()->id)->where('status', 'Sedang diproses')->get();
        // $replies = Reply::with('replies')->orderBy('created_at', 'DESC')->get();
        return view('admin.complaint', compact('complaints', 'complaints_handled'))->with('title', $title);
    }

    public function complaint_handled($id){
        $complaint = Complaint::find($id);
        $complaint->admin_id = Auth::user()->id;
        $complaint->status = "Sedang diproses";
        $complaint->save();
        return redirect('admin/complaint');
    }

    // public function replies(){
    //     $replies = Reply::all()->where('');
    //     return view('admin.complaint', compact('replies'));
    // }

    public function reply_message($id, Request $request){
        $complaint = Complaint::find($id);
        $complaint->admin_status = "Selesai";
        $complaint->save();

        $reply = new Reply();
        $reply->complaint_id = $id;
        $reply->from = Auth::user()->id;
        $reply->to = $complaint->umkm_id;
        $reply->reply_desc = $request->reply_desc;
        $reply->save();
        
        return redirect('admin/complaint');
    }

    public function complaint_done(){
        $title = 'Komplain Selesai';
        $complaints = Complaint::where('status', 'Selesai')->where('admin_status', 'Selesai')->where('admin_id', Auth::user()->id)->get();
        // $complaints_handled = Complaint::where('admin_id', Auth::user()->id)->where('status', 'Sedang diproses')->get();
        // $replies = Reply::with('replies')->orderBy('created_at', 'DESC')->get();
        return view('admin.complaint_done', compact('complaints'))->with('title', $title);
    }
}
