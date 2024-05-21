<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\User;



class EventController extends Controller
{
    //


    public static function index(){

        $search = request('search');

        if($search){
            $events = Event::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);

    }

    public static function criarEvento(){

        return view('criar-evento');
    }

    public static function store(Request $request) {

        $event = new Event;

        $event->nome = $request->nome;
        $event->cidade = $request->cidade;
        $event->descricao = $request->descricao;
        $event->privado = $request->privado;
        $event->items = $request->items;
        $event->date = $request->date;

        #Upload imagem

        if($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestFile = $request->foto;

            $extension = $requestFile->extension();

            $fileName = uniqid() . "." . $extension;

            $requestFile->move(public_path('imgs/events'), $fileName);

            $event->foto = $fileName;

        } else {
            return redirect('/criar-evento')->with('msgerror', "Foto inválida!");
        }

        $user = Auth::user();
        $event->user_id = $user->id;
        $event->save();

        return redirect('/')->with('msg', "Evento cadastrado com sucesso!");

    }

    public static function eventSingle($id) {

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        $user = auth()->user();
        $hasUserJoined = false;

        $userEvents = $user->eventsAsParticipants->toArray();

        foreach($userEvents as $userEvent){
            if($userEvent['id'] == $id){
                $hasUserJoined = true;
            }

        } 

        return view('evento', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public static function entrarPage() {
        return view('entrar');
    }

    public static function cadastrar() {
        return view('cadastrar');
    }

    public static function dashboard() {

        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipants = $user->eventsAsParticipants;

        return view('dashboard', ['events' => $events, 'eventsAsParticipants' => $eventsAsParticipants]);
    }

    public static function destroy($id) {

        $event = Event::findOrFail($id);

        $path = public_path('/imgs/events/' . $event->foto); 
        
        if(Storage::delete($path)){
              
            $event->delete();

            return redirect('/dashboard')->with('msg', 'Evento excluido!');
            
        }
        
    }

    public static function edit($id) {

        $event = Event::findOrFail($id);

        
        if($event->user_id == auth()->user()->id){
            return view('edit', ['event' => $event]);
        } else {
            return redirect('dashboard');
        }
        

    }

    public static function update(Request $request) {


        #Upload imagem
/*
        if($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $requestFile = $request->foto;

            $extension = $requestFile->extension();

            $fileName = uniqid() . "." . $extension;

            $requestFile->move(public_path('imgs/events'), $fileName);

            $oldfoto = public_path('imgs/events') . $request->oldfoto;

            Storage::delete($oldfoto);

           
            $request->foto = $fileName;
            
            echo $request->foto;
            $request->request->remove('oldfoto');
        } 

        #dd($request->all());
        $request->request->remove('oldfoto');
*/
        Event::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard')->with('msg','Evento atualizado!');

    }

    public static function eventJoin($id) {

        $user = auth()->user();

        $user->eventsAsParticipants()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', "Confirmada sua presença no evento " . $event->nome );

    }

    public static function left($id){

        $user = auth()->user();

        $user->eventsAsParticipants()->detach();

        return redirect('/dashboard');

    }
}
