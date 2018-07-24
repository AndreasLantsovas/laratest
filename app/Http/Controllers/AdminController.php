<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Country;
use App\Link;
use App\Location;
use Mapper;

class AdminController extends Controller
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


/**
 * Показать все записи.
 */
    public function index(){
        //$events = DB::table('events')->get();
        //orderBy('start_date', 'asc')->get()
        $events = Event::orderBy('start_date', 'asc')->get();
 //   dd($events);
        return view('admin', compact('events'));

    }


    public function ShowPublished(){
        $events = Event::published()->get();
        return view('admin', compact('events'));

    }

/**
 * Удалить запись.
 */
     public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete($id);
        return redirect()->route('admin')->with('success', 'Information has been deleted');
     }

/**
 * Добавить запись.
 */
    public function store(Request $request){


        //валидация данных
        $this->validate($request, array(
            'name' => 'required|max:550',
            'details' => 'required|max:550|min:3',
            'start_date' =>'required',
            'end_date' =>'required'
            ));



        $event = new Event;
        $event->name = $request->name;

        //вынести форматирование даты в отдельную функцию
        $event->start_date = date ('Y-m-d',  strtotime(str_replace('/', '-', $request->start_date)));
        $event->end_date = date ('Y-m-d',  strtotime(str_replace('/', '-', $request->end_date)));
        $event->details = $request->details;
        $event->alias = strtolower (str_replace(' ', '-', $request->name).'-'.date('ymd',  strtotime(str_replace('/', '-', $request->start_date))));
        $event->country_id = $request->country_id;
        
//dd($event);

        $event->save();

       
        return redirect('admin')->with('success', 'Information has been added');

     }

/**
 * форма для добавления запись.
 */
    public function create(){
        $events = new Event;
        $events->published = 0;

        $countries = Country::all();
        
        return view('create', compact('events', 'countries'));
     }

/**
 * форма для редактирования запись.
 */
    public function edit($id){

        $countries = Country::all();
        $events = Event::find($id);

        return view('edit',compact('events', 'countries'));

     }

    public function update(Request $request)
     {
        //echo $request['id'];

        $EventUpdate = Event::find($request['id']);

        $EventUpdate->name = $request->input('name');
        $EventUpdate->details = $request->input('details');
        $EventUpdate->start_date = $request->input('start_date');
        $EventUpdate->end_date = $request->input('end_date');
        $EventUpdate->published = $request->input('published');
        $EventUpdate->country_id = $request->input('country_id');
        $EventUpdate->alias = strtolower (str_replace(' ', '-', $request->input('name')).'-'.date('ymd',  strtotime($request->input('start_date'))));
        
        if ($EventUpdate->published === null) {
            $EventUpdate->published = 0;
        }
        else {
            $EventUpdate->published = 1;
        }

        $EventUpdate->save();       

        return redirect('admin')->with('success', 'Information has been edited');
    }


/**
 * Показать одну записи в админке.
 */
    public function show($id){

        $event = Event::find($id);

        $links = Link::where('event_id', '=', $id)->get();

        if (!$event->location) {
               $map ='have not location';
        }

        else{

            $map = Mapper::map($event->location->lat, $event->location->lng, ['zoom' => 12, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']])->render();
        }

        return view('admin.show', compact('event', 'links', 'map'));
        //dd($request);
    }

/**
 * Показатьстраницу со всеми странами.
 */
    public function countries(){

        $countries = Country::all();

        return view('admin.countries', compact('countries'));
        
    }


/**
 *  
 */

    public function links($id){
        //dd($id);
        $event = Event::find($id);
        $links = Link::where('event_id', '=', $id)->get();
        return view('admin.links', compact('event', 'links'));
    }


/**
 * Добавление линков или обновление если линк с указанным discription существует
 */
    public function link_store(Request $request, $id){

        if ($request->input('link_description') === 'video') {
            
            $link = 'https://www.youtube.com/embed/'.str_replace('https://www.youtube.com/watch?v=', '', $request->input('link'));
        }
            //dd($youtubeLink);
        else {

                $link = $request->input('link');
            }
   
        $link = Link::updateOrCreate(['description' => $request->input('link_description'), 'event_id' => $id ],
            ['link'=>$link, 'description'=>$request->input('link_description')]);
        $event = Event::find($id);
        $links = Link::where('event_id', '=', $id)->get();
        
        return redirect()->back()->with(compact('event', 'links'));
        //return view('admin.links', compact('event', 'links'));
    }

/**
 * Удаление линка
 */
    public function link_delete($event_id, $link_id){

        $link = Link::findOrFail($link_id);
        $link->delete($link_id);

        $event = Event::find($event_id);
        $links = Link::where('event_id', '=', $event_id)->get();

        return redirect()->back()->with('success','Information has been delited' ,compact('event', 'links'));

        //return view('admin.links', compact('event', 'links'));
    }

/**
 * Локация
 */
    public function location($id){
        
        $event = Event::find($id);
      //  dd($event->location->formatted_address);

        if (!$event->location) {
               $map ='have not location';
        }

        else{

            $map = Mapper::map($event->location->lat, $event->location->lng, ['zoom' => 12, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']])->render();
        }


        return view('admin.location', compact('map', 'event'));
    }



    public function location_store (Request $request, $id){
      //dd($id);

       $location = Location::updateOrCreate(['event_id' => $id ],
            ['lat'=>$request->input('lat'), 'lng'=>$request->input('lng'), 'formatted_address'=>'No']);

    return redirect()->back();   
        
        

       echo "string";
    }


}






















