<?php

namespace App\Http\Controllers;
use DB;
use App\Hod;
use App\Contact;
use App\Program;
use App\Category;
use App\Commission;
use App\Denomination;
use App\Jobs\SendMessageJob;
use App\ParaChurch;
use Illuminate\Http\Request;

class ParaChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $parachurches=ParaChurch::all();
        return view('para.para-view')->with('parachurches',$parachurches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $programs=DB::table('programslist')->get();
        $categories=DB::table('categories')->get();
        $countries=DB::table('countries')->get();
        return view('para.para-add')->with('programs',$programs)
                                        ->with('categories',$categories)->with('countries',$countries);
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
            'name' => 'required',
            // 'year' => 'required',
            'number_of_branches' => 'numeric',
            'number_of_members' => 'numeric', 
            'sub_balance' => 'numeric',
            // 'countries_spread' => 'required',
            // 'hq_address' => 'required',
            // 'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'home_tel' => 'numeric',
            'email' => 'email',
            // 'marital_status' => 'required', 
            'gender' => 'required',
            // 'hod_or_rep' => 'required',
            // 'fafullname' => 'required',
            // 'facontact_number' => 'required',
            // 'faemail' => 'required',
            // 'wfullname' => 'required',
            // 'wcontact_number' => 'required',
            // 'wemail' => 'email',
            // 'yfullname' => 'required',
            // 'ycontact_number' => 'required',
            // 'yemail' => 'required'
            
        ]);

       DB::beginTransaction();
        ParaChurch::unguard();
       $parachurch= ParaChurch::create([

        'name'=>$request->input('name'),
        'year'=> $request->input('year'),
        'address' => $request->input('address'),
        'mobile' => $request->input('mobile'),
        'email' => $request->input('email'),
        'sub_balance' => $request->input('sub_balance'),
        'number_of_branches' => $request->input('number_of_branches'),
        'category' => $request->input('category')

        ]);
       HOD::unguard();

         Hod::create([
            'para_church_id' => $parachurch->id,
            'title' => $request->input('title'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'home_tel' => $request->input('home_tel'),
            'email' => $request->input('email'),
            'marital_status' => $request->input('marital_status'),
            'gender' => $request->input('gender'),
            'hod_or_rep' => $request->input('hod_or_rep'),
        ]);  

  Contact::unguard();
        Contact::create([
            'para_church_id' => $parachurch->id,
            'fafullname' => $request->input('fafullname'),
            'facontact_number' => $request->input('facontact_number'),
            'faemail' => $request->input('faemail'),
            'wfullname' => $request->input('wfullname'),
            'wcontact_number' => $request->input('wcontact_number'),
            'wemail' => $request->input('wemail'),
            'yfullname' => $request->input('yfullname'),
            'ycontact_number' => $request->input('ycontact_number'),
            'yemail' => $request->input('yemail'),
        ]); 




             $string1='';
            if (is_array($request->input('research_and_dev')) || is_object($request->input('research_and_dev')))
                {
                 foreach ($request->input('research_and_dev') as $research_and_dev){
                    $string1 .=  $research_and_dev.',';
                 }

             }

            $string2='';
          if (is_array($request->input('gender_dev')) || is_object($request->input('gender_dev')))
                {
             foreach ($request->input('gender_dev') as $gender_dev){
                $string2 .=  $gender_dev.',';
             }
         }
              $string3='';
             if (is_array($request->input('humanitarian')) || is_object($request->input('humanitarian')))
                {
             foreach ($request->input('humanitarian') as $humanitarian){
                $string3 .=  $humanitarian.',';
             }
                    }

              $string4='';

             if (is_array($request->input('peace_justice')) || is_object($request->input('peace_justice')))
                {
             foreach ($request->input('peace_justice') as $peace_justice){
                $string4 .=  $peace_justice.',';
                 }
                }
            $string5='';

             if (is_array($request->input('comm_for_min')) || is_object($request->input('comm_for_min')))
                {
             foreach ($request->input('comm_for_min') as $comm_for_min){
                $string5 .=  $comm_for_min.',';
                   }
                 }

        $commission = $parachurch->commission()->create([

            'para_church_id' => $parachurch->id,
            'research_and_dev' => $string1,
            'gender_dev' => $string2,
            'humanitarian' =>$string3,
            'peace_justice' =>$string4,
            'comm_for_min' =>$string5,

        ]);
       

        $parachurch = ParaChurch::find($parachurch->id);
         $string='';
         
             foreach ($request->input('programs') as $value)
             {
                  $program = $parachurch->programs()->create([
            // 'denomination_id' => $denomination->id,
                'programs' => $value,
                  ]);
             }
DB::commit();

        //return redirect()->back()->with('message', 'Para Church Added successfully');
        return redirect()->route('parachurch.show', [$parachurch->id])->with('message', 'Para Church Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParaChurch  $paraChurch
     * @return \Illuminate\Http\Response
     */
    public function show(ParaChurch $parachurch)
    {
         return view('para.para-single')->with('paraChurch', $parachurch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParaChurch  $paraChurch
     * @return \Illuminate\Http\Response
     */
    public function edit(ParaChurch $parachurch)
    {
        $programs=DB::table('programslist')->get();
        $myprograms=Program::where('para_church_id',$parachurch->id)->get();
        $commissions=Commission::where('para_church_id',$parachurch->id)->first();
        
     
        $mp=collect([]);
        foreach ($myprograms as $program) {
            
            $mp->push($program->programs);
        }

        $mprograms=$mp->toArray();

        // return $mprograms;


     $gd= explode(',', $commissions->gender_dev);
     $rd= explode(',', $commissions->research_and_dev);
     $hu= explode(',', $commissions->humanitarian);
     $pj= explode(',', $commissions->peace_justice);
     $cm= explode(',', $commissions->comm_for_min);



        $data = array(
            'gender_dev' => $gd,
            'research_and_dev'=>$rd,
            'humanitarian'=>$hu
        );




       

        $categories=DB::table('categories')->get();
        $countries=DB::table('countries')->get();
        return view('para.para-edit')->with('parachurch', $parachurch)
                                     ->with('programs',$programs)
                                        ->with('countries',$countries)
                                        ->with('mprograms',$mprograms)
                                        ->with('data',$data)
                                        ->with('gd',$gd)
                                        ->with('rd',$rd)
                                        ->with('hu',$hu)
                                        ->with('pj',$pj)
                                        ->with('cm',$cm)
                                        ->with('categories',$categories);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParaChurch  $paraChurch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParaChurch $parachurch)
    {
        DB::beginTransaction();
        ParaChurch::unguard();
           $data = [
            'name' => $request['name'],
            'year' => $request['year'],
            'number_of_branches' => $request['number_of_branches'],
            'number_of_members' => $request['number_of_members'],
            'countries_spread' => $request['countries_spread'],
            'category' => $request['category'],
            'sub_balance' => $request['sub_balance'],
            'address' => $request['address']
        ];
        $parachurch->update($data);
        HOD::unguard();
        $hod=HOD::where('para_church_id',$parachurch->id)->first();

        $hod->update([
            'para_church_id' => $parachurch->id,
            'title' => $request->input('title'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'home_tel' => $request->input('home_tel'),
            'email' => $request->input('email'),
            'marital_status' => $request->input('marital_status'),
            'gender' => $request->input('gender'),
            'hod_or_rep' => $request->input('hod_or_rep'),
        ]);  

        $contact=Contact::where('para_church_id',$parachurch->id)->first();


        $contact->update([
            'para_church_id' => $parachurch->id,
            'fafullname' => $request->input('fafullname'),
            'facontact_number' => $request->input('facontact_number'),
            'faemail' => $request->input('faemail'),
            'wfullname' => $request->input('wfullname'),
            'wcontact_number' => $request->input('wcontact_number'),
            'wemail' => $request->input('wemail'),
            'yfullname' => $request->input('yfullname'),
            'ycontact_number' => $request->input('ycontact_number'),
            'yemail' => $request->input('yemail'),
        ]); 




             $string1='';
            if (is_array($request->input('research_and_dev')) || is_object($request->input('research_and_dev')))
                {
                 foreach ($request->input('research_and_dev') as $research_and_dev){
                    $string1 .=  $research_and_dev.',';
                 }

             }

            $string2='';
          if (is_array($request->input('gender_dev')) || is_object($request->input('gender_dev')))
                {
             foreach ($request->input('gender_dev') as $gender_dev){
                $string2 .=  $research_and_dev.',';
             }
         }
              $string3='';
             if (is_array($request->input('humanitarian')) || is_object($request->input('humanitarian')))
                {
             foreach ($request->input('humanitarian') as $humanitarian){
                $string3 .=  $humanitarian.',';
             }
                    }

              $string4='';

             if (is_array($request->input('peace_justice')) || is_object($request->input('peace_justice')))
                {
             foreach ($request->input('peace_justice') as $peace_justice){
                $string4 .=  $peace_justice.',';
                 }
                }
            $string5='';

             if (is_array($request->input('comm_for_min')) || is_object($request->input('comm_for_min')))
                {
             foreach ($request->input('comm_for_min') as $comm_for_min){
                $string5 .=  $comm_for_min.',';
                   }
                 }

        $commission = $parachurch->commission()->update([

            'para_church_id' => $parachurch->id,
            'research_and_dev' => $string1,
            'gender_dev' => $string2,
            'humanitarian' =>$string3,
            'peace_justice' =>$string4,
            'comm_for_min' =>$string5,

        ]);
       

        $parachurch = ParaChurch::find($parachurch->id);
         $string='';
         
             foreach ($request->input('programs') as $value)
             {
                  $program = $parachurch->programs()->update([
            // 'denomination_id' => $denomination->id,
                'programs' => $value,
                  ]);
             }
      DB::commit();
//             return redirect()->back()->with('message', 'ParaChurch Edited successfully');
        return redirect()->route('parachurch.show', [$parachurch->id])->with('message', 'Para Church Added successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParaChurch  $paraChurch
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParaChurch $parachurch)
    {
           if($parachurch->delete()) {
            return redirect()->back()->with('message', "Record deleted successfully");
        }

        return redirect()->back()->with('error', "An error occured while deleting record");
    
    }
}
