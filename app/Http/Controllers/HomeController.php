<?php

namespace App\Http\Controllers;

use DB;
use Image;
use App\User;
use App\Feed;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::WHERE('user_id', auth()->user()->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);

        return view('home', ['feeds' => $feeds]);
    }

    public function add(Request $request) {
        $this->validate($request, [
            'feed' => 'required'
            ]);

        $feeds = new Feed;
        $feeds->feed = $request->input('feed');
        $feeds->user_id = auth()->user()->id;
        $feeds->save();
        return redirect('/home')->with('info', 'Success!');
    }

    public function profile()
    {
        $users = User::WHERE('id', auth()->user()->id)->get();
        return view('profile', ['users' => $users]);
    }

    public function update(Request $request){

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );

            $user = auth()->user();
            $user->avatar = $filename;
            $user->save();
        }

        return back();

    }

    public function friends(Request $request) {
        $user = auth()->user();

        $users = DB::table('users')
                ->where('id', '!=', $user->id)
                ->orderBy('firstname', 'ASC')
                ->paginate(5);

        return  view('friends', ['users' => $users]);;
    }

    public function stalk($id) {
        $encryptedId = decrypt($id);

        $users = DB::table('users')
                ->where('id', '=', $encryptedId)
                ->get();

        $feeds = DB::table('feeds')
                ->where('user_id', '=', $encryptedId)
                ->orderBy('created_at', 'desc')
                ->paginate(3);

        return  view('stalk', ['users' => $users, 'feeds' => $feeds]);
    }
}
