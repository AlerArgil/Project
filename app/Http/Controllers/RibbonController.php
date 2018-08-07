<?php

namespace App\Http\Controllers;
use App\Repositories\RibbonRepository;
use App\Repositories\PhotoRepository;
use Illuminate\Http\Request;
use App\Ribbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Console\Kernel;
use App\Photo;
use Illuminate\Support\Facades\Cache;
class RibbonController extends Controller
{
    protected $ribbons;
    protected $photos;
    protected $like;
    public function __construct(RibbonRepository $ribbons, PhotoRepository $photos)
    {
        $this->middleware('auth');
        $this->ribbons = $ribbons;
        $this->photos = $photos;
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'desc'=>'required|string',

        ]);
        $request->user()->ribbons()->create([
            'name' => $request->name,
            'desc' => $request->desc,

        ]);
        Cache::forever($request->user()->id,Cache::increment('balance',50));
        return redirect('/home');
    }
    public function rcreate(Request $request)
    {
        $ribbons = $request->user()->ribbons()->get();

        //для версии 5.1
        //$tasks = Task::where('user_id', $request->user()->id)->get();

        return view('ribbon.rcreate', [
            'ribbons' => $ribbons,
        ]);
    }
    public function ribbonslist(Request $request){
        $ribbons = Ribbon::paginate(5);
        return view('ribbon.ribbonlist',[
            'ribbons' => $ribbons,
        ]);
    }
    public function manage(Request $request){
        //$ribbons = $request->user()->ribbons()->get();
        return view('ribbon.manage',[
            'ribbons' => $this->ribbons->forUser($request->user()),
        ]);
    }
    public function destroy(Request $request, Ribbon $ribbon)
    {
        $this->authorize('destroy', $ribbon);

        $ribbon->delete();

        return redirect('/manage');
        // Удаление задачи...
    }
    public function edit(Request $request, Ribbon $ribbon){
        //$this->authorize('destroy', $ribbon);
        $this->validate($request, [
            'name'=>'required|string',
            'desc'=>'required|string',
        ]);

        $ribbon->update([
            'name'=>$request->input('name'),
            'desc'=>$request->input('desc'),
            ]);
        //ribbon->prof=$request->prof;
        //$ribbon->nam=$request->nam;
        return redirect('/home');
    }
    public function load(Request $request, Ribbon $ribbon){
        if($request->hasFile('photo')) {
            $url=Storage::url($request->file('photo')->store('public/photos'));
            $ribbon->photos()->create([
                'path'=>$url
            ]);
            //$file = $request->file('photo');
            //$file->move(public_path() . '/path','filename.img');
            //Storage::putFile('photos',new File('/public/storage'));
            //$path = $request->file('photo')->store('photos');
            //DB::table('photos')->insert([
            //    'path'=>$path,
            //]);
            Cache::forever($request->user()->id,Cache::increment('balance',2));
        }
        return redirect('/home');
    }
    public function deletephoto(Request $request){
        $photo = Photo::find($request->photo);
        $photo->delete();
        Cache::forever($request->user()->id,Cache::increment('balance',-2));
        return redirect('/manage');
    }
    public function getlike(Request $request){
        $photo = Photo::find($request->photo);
        $like=$photo->like_by->count();
        //$photo->laik = $request->input('state');
        //$photo->save();
        if(!$photo->like_by->count()){

            $photo->like_by()->attach($request->user()->id);
            $photo->laik=$like+1;
            $photo->update();
            Cache::forever($request->user()->id,Cache::increment('balance'));
            return redirect('/ribbonslist');
        }
        foreach($photo->like_by as $us) {
            //dd($request->user()->id);
            if ($us->id == $request->user()->id) {
                //dd('detach');
                $photo->like_by()->detach($request->user()->id);
                $photo->laik=$like-1;
                $photo->update();
                Cache::forever($request->user()->id,Cache::decrement('balance',5));
                return redirect('/ribbonslist');
            }
        }
        //dd('detach');
        $photo->like_by()->attach($request->user()->id);
        $photo->laik=$like+1;
        $photo->update();
        Cache::forever($request->user()->id,Cache::increment('balance'));
        return redirect('/ribbonslist');
    }
}
