<?php

namespace App\Http\Controllers;
use App\Hod;
use App\Event;
use App\Contact;
use App\Minister;
use App\Program;
use App\Bible;
use App\Parachurch;
use Calendar;
use App\Commission;
use App\Denomination;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * dashboard Index 
     *
     * @return void
     */


	public  function index()
	{

        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
    $calendar = Calendar::addEvents($events);

	$dcount=Denomination::count('name');
    $bcount=Bible::count('name'); 
    $pcount=Parachurch::count('name');
    $genderM=Hod::whereIn('gender', ['male'])->count();
    $genderF=Hod::whereIn('gender', ['female'])->count();
	$ministers=Minister::count();
    $ministersH=Minister::where('province','harare')->count();

	return view('dashboard',compact('dcount','ministers', 'genderM','genderF','calendar','bcount','pcount'));
	}
    
}
