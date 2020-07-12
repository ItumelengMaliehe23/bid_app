<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        $profiles = Profile::orderBy('created_at','desc')->paginate(10);
        return view('profiles.index')->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'company_about' => 'required',
            'comp_pro_img' => 'image|nullable|max:1999|required',
            'comp_cov_img' => 'image|nullable|max:1999|required'
        ]);

        // Handle File Upload
        if($request->hasFile('comp_pro_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('comp_pro_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('comp_pro_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('comp_pro_img')->storeAs('public/comp_pro_imgs', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('comp_cov_img')){
            // Get filename with the extension
            $filenameWithExtb = $request->file('comp_cov_img')->getClientOriginalName();
            // Get just filename
            $filenameb = pathinfo($filenameWithExtb, PATHINFO_FILENAME);
            // Get just ext
            $extensionb = $request->file('comp_cov_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStoreb= $filenameb.'_'.time().'.'.$extensionb;
            // Upload Image
            $pathb = $request->file('comp_cov_img')->storeAs('public/comp_cov_imgs', $fileNameToStoreb);
        } else {
            $fileNameToStoreb = 'noimage.jpg';
        }

        // Create Profile
        $profile = new Profile;
        $profile->company_name = $request->input('company_name');
        $profile->company_about = $request->input('company_about');
        $profile->user_id = auth()->user()->id;
        $profile->comp_pro_img = $fileNameToStore;
        $profile->comp_cov_img = $fileNameToStoreb;
        $profile->save();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return redirect('/home')->with('success', 'Profile Created')->with('profiles', $user->profiles);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
