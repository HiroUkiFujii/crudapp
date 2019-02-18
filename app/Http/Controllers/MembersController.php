<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class MembersController extends Controller
{
    public function index(Request $request)
    {
      $keyword = $request->input('keyword');
      $query = \App\member::query();
      if(!empty($keyword))
      {
        $query->where('name','like','%'.$keyword.'%');
        $query->orwhere('email','like','%'.$keyword.'%');
        $query->orwhere('tel','like','%'.$keyword.'%');
      }

      $members = $query->orderBy('name','email','tel')->paginate(10);
      return view('member.index')->with('members',$members)->with('keyword',$keyword);
    }

    public function new_index()
    {
      return view('member.new_index');
    }
/*ValiDemoRequestをDIしてるので見やすい！！↓*/
    public function new_confirm(\App\Http\Requests\ValiDemoRequest $request)
    {
      $data = $request ->all();
      return view('member.new_confirm')->with($data);
    }

    public function new_finish(Request $request)
    {
      $member = new \App\Member;
      $member->name = $request->name;
      $member->email = $request->email;
      $member->tel = $request->tel;
      $member->save();
      return redirect()->to('members/list');
    }

    public function edit_index($id)
    {
      $member = \App\member::findOrFail($id);
      return view('member.edit_index')->with('member',$member);
    }

    public function edit_confirm(\App\Http\Requests\ValiDemoRequest $request)
    {
      $data = $request->all();
      return view('member.edit_confirm')->with($data);
    }

    public function edit_finish(Request $request, $id)
    {
      $member = \App\member::findOrFail($id);
      $member->name = $request->name;
      $member->email = $request->email;
      $member->tel = $request->tel;
      $member->save();
      return redirect()->to('members/list');
    }

    public function delete($id)
    {
      $member = \App\member::find($id);
      $member -> delete();
      return redirect() ->to('members/list');
    }
}
