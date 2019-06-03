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
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailerAutoload;


class DenominationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->dispatch(new SendMessageJob("This is a test", "263775391733", "EFZ"));
        
        // $categories= DB::table('categories')->get();

        $denominations=Denomination::with('hod','contact','commission','programs','category')->get();


        return view('denominations.denominations-view')->with('denominations', $denominations);

    }

    protected  function sendMail($message,$sendTo,$Receiver)
    {
        
        $mail= new PHPMailer(true); // create a n
        $mail->SMTPDebug  = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth   = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->isSMTP(); 
        $mail->Host = "mail.churchsoftware.co.za";
        $mail->Port       = 25; // or 587
        $mail->IsHTML(true);
        $mail->Username = "info@churchsoftware.co.za";                 
        $mail->Password = "3sixty1@123";
        $mail->SetFrom("efz@gmail.com", 'EFZ');
        $mail->Subject = "Denomination Registration";
        $mail->Body    = $message;
        $mail->AddAddress($sendTo,$Receiver);
        if ($mail->send()) {
            return 'Email Sended Successfully';
        } else {
            return 'Failed to Send Email';
        }
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
        return view('denominations.denominations-add')->with('programs',$programs)
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

        DB::beginTransaction();
        $this->validate($request, [
            'name' => 'required|unique:denominations',
            // 'email' => 'required|string|email|max:255|unique:users'
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
            'email' => 'sometimes|nullable|email',
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

         /*saving in the database*/

        $denomination = $this->createDenomination($request->all());

        /*Updating status in the database*/
        $page = Denomination::find($denomination->id);

         $dens=DB::table('categories')->where("name",$denomination->category)->get();
         foreach ($dens as $den) {
          
             $totalperyear= 4*$den->subscription;
             if ($denomination->sub_balance > $totalperyear) {

               Denomination::find($denomination->id)
                  
                    ->update([
                        "status" => "bad",
                    ]);
                             
             }else{
                 
                Denomination::find($denomination->id)
                    // ->where('id',$denomination->id)
                    ->update([
                        "status" => "good",
                    ]);
             }
         }
        
        


        Hod::create([
            'denomination_id' => $denomination->id,
            'title' => $request->input('title'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'home_tel' => $request->input('home_tel'),
            'email' => $request->input('email'),
            'marital_status' => $request->input('marital_status'),
            'gender' => $request->input('gender'),
            'hod_or_rep' => $request->input('hod_or_rep'),
        ]);  


        Contact::create([
            'denomination_id' => $denomination->id,
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

        $commission = $denomination->commission()->create([

            'denomination_id' => $denomination->id,
            'research_and_dev' => $string1,
            'gender_dev' => $string2,
            'humanitarian' =>$string3,
            'peace_justice' =>$string4,
            'comm_for_min' =>$string5,

        ]);
       

        $denomination = Denomination::find($denomination->id);
         $string='';
         
             foreach ($request->input('programs') as $value)
             {
                  $program = $denomination->programs()->create([
            // 'denomination_id' => $denomination->id,
                'programs' => $value,
                  ]);
             }

        
      DB::commit();
      // $this->sendEmail($request->input('fafullname'),$$request->input('fafullemail'));
        // return redirect()->back()->with('message', 'Denomination Added successfully');
      return redirect()->route('denomination.show', [$denomination->id])->with('message', 'Denomination Added successfully');
         

    } 



    protected function createDenomination($request) {
        $data = [
            'name' => $request['name'],
            'year_found' => $request['year'],
            'number_of_branches' => $request['number_of_branches'],
            'number_of_members' => $request['number_of_members'],
            'countries_spread' =>implode("," , $request['countries_spread']),
            'category' => $request['category'],
            'sub_balance' => $request['sub_balance'],
            'hq_address' => $request['hq_address']
        ];
        Denomination::unguard();

        return Denomination::create($data);
    }



    //  public function sendEmail($receiver,$username,$password,$dname)
    //     {
    //     $from = "info@efz.co.zw";    //senders email address
    //     $subject = 'Denomination Registration';  //email subject
        
    //     //sending confirmEmail($receiver) function calling link to the user, inside message body
    //    $message ="<p>Thank you for registering on your Denomination on EFZ database, the following information has been captured for use by EFZ, please kindly check if all the information is correct. Get in touch with the Church Administrator for any amendments. </p>";
        
        
    //    $mail = $this->phpmailerlib->load();
    // try {
    //         //Server settings
    //         $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    //         $mail->isMail();                                      // Set mailer to use SMTP
    //         $mail->Host = 'mail.churchsoftware.co.za';  // Specify main and backup SMTP servers
    //         $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //         $mail->Username = 'info@churchsoftware.co.za';                 // SMTP username
    //         $mail->Password = '3sixty1@123';                           // SMTP password
    //         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //         $mail->Port = 25;                                    // TCP port to connect to
    //         //Recipients
    //         $mail->setFrom('info@churchsoftware.co.za', 'Edge Online');
    //         $mail->addAddress($receiver, $name);     // Add a recipient
    //         // $mail->addAddress('Aaron');               // Name is optional
    //         $mail->addReplyTo('info@churchsoftware.co.za', 'Edge');
    //         //$mail->addCC('cc@example.com');
    //         //$mail->addBCC('bcc@example.com');

    //         //Attachments
    //         //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //         //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //         //Content
    //         $mail->isHTML(true);                                  // Set email format to HTML
    //         $mail->Subject = $subject;
    //         $mail->Body    = $message;
    //         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //         $mail->send();
    //         DB::table('emails')->where(array('status'=>1,'type'=>'company'))->update(array('status'=>2));
    //     } catch (Exception $e) {
    //         // echo 'Message could not be sent.';
    //         // echo 'Mailer Error: ' . $mail->ErrorInfo;
    //     }
       
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function show(Denomination $denomination)
    {
        return view('denominations.denominations-single')->with('denomination', $denomination);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function edit(Denomination $denomination)
    {

      
        $programs=DB::table('programslist')->get();
        $myprograms=Program::where('denomination_id',$denomination->id)->get();
        $commissions=Commission::where('denomination_id',$denomination->id)->first();
        
     
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

        return view('denominations.denominations-edit')->with('denomination', $denomination)
                                        ->with('programs',$programs)
                                        ->with('countries',$countries)
                                        ->with('mprograms',$mprograms)
                                        ->with('data',$data)
                                        ->with('gd',$gd)
                                        ->with('rd',$rd)
                                        ->with('hu',$hu)
                                        ->with('pj',$pj)
                                        ->with('cm',$cm)
                                        ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denomination $denomination)
    {

        DB::beginTransaction();
        Denomination::unguard();
           $data = [
            'name' => $request['name'],
            'year_found' => $request['year'],
            'number_of_branches' => $request['number_of_branches'],
            'number_of_members' => $request['number_of_members'],
            'countries_spread' => $request['countries_spread'],
            'category' => $request['category'],
            'sub_balance' => $request['sub_balance'],
            'hq_address' => $request['hq_address']
        ];
        $denomination->update($data);



        $hod=Hod::where('denomination_id',$denomination->id)->first();

        $hod->update([
            'denomination_id' => $denomination->id,
            'title' => $request->input('title'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'home_tel' => $request->input('home_tel'),
            'email' => $request->input('email'),
            'marital_status' => $request->input('marital_status'),
            'gender' => $request->input('gender'),
            'hod_or_rep' => $request->input('hod_or_rep'),
        ]);  

        $contact=Contact::whereDenominationId($denomination->id)->first();


        $contact->update([
            'denomination_id' => $denomination->id,
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

        $commission = $denomination->commission()->update([

            'denomination_id' => $denomination->id,
            'research_and_dev' => $string1,
            'gender_dev' => $string2,
            'humanitarian' =>$string3,
            'peace_justice' =>$string4,
            'comm_for_min' =>$string5,

        ]);
       

        $denomination = Denomination::find($denomination->id);
         $string='';
         
             foreach ($request->input('programs') as $value)
             {
                  $program = $denomination->programs()->update([
            // 'denomination_id' => $denomination->id,
                'programs' => $value,
                  ]);
             }
      DB::commit();
             return redirect()->back()->with('message', 'Denomination Edited successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Denomination  $denomination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denomination $denomination)
    {
        if($denomination->delete()) {
            return redirect()->back()->with('message', "Record deleted successfully");
        }

        return redirect()->back()->with('error', "An error occured while deleting record");
    }
}
