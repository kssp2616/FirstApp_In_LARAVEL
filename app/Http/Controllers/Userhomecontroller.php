<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\cardrequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\post;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\card;
use App\Models\rating;
use Illuminate\Support\Facades\DB;
use Auth;
class Userhomecontroller extends Controller
{
    //
    public function index()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $data=post::latest()->paginate(8);
    	return view('/home',[
        'posts'=>$data,
        'cards_count'=>$count_card
    	]);
    }
     /*start bar menu*/
    public function allproducts()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $products=post::latest()->paginate(8);

      return view('search-results')->with('products',$products)->with('cards_count',$count_card);
    }
    public function clothes()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $products=DB::table('posts')
                ->join('categories','category_id','categories.id')
                ->select('posts.*','categories.name')
                ->where('categories.name','Clothes')
                ->paginate(8);
    /*$rat=rating::all();
    foreach ($products as $product)
    {
    $postid = Photo::find($product->posts->id);
    
    
    }*/
      return view('search-results')->with('products',$products)->with('cards_count',$count_card);
    }
    public function sacs()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $products=DB::table('posts')
                ->join('categories','category_id','categories.id')
                ->select('posts.*','categories.name')
                ->where('categories.name','Sacs')
                ->orWhere('categories.name','Backpack')
                ->paginate(8);

      return view('search-results')->with('products',$products)->with('cards_count',$count_card);
    }
    public function accessoires()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $products=DB::table('posts')
                ->join('categories','category_id','categories.id')
                ->select('posts.*','categories.name')
                ->where('categories.name','Glasses')
                ->orWhere('categories.name','Watches')
                ->paginate(8);

      return view('search-results')->with('products',$products)->with('cards_count',$count_card);
    }
    public function others()
    { if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
      $products=DB::table('posts')
                ->join('categories','category_id','categories.id')
                ->select('posts.*','categories.name')
                ->where('categories.name','Computers')
                ->orWhere('categories.name','tools')
                ->paginate(8);
      return view('search-results')->with('products',$products)->with('cards_count',$count_card);
    }
    /*End bar menu*/

    public function search(Request $request)
    {
      $request->validate([
       'query' => 'required|min:3',
      ]);
      
      $query=$request->input('query');
      $products=post::where('title','Like',"%$query%")->orWhere('description','Like',"%$query%")
          ->orWhere('content','Like',"%$query%")
          ->paginate(8);

      return view('search-results')->with('products',$products);
    }
    public function payment()
    {
      return view('users.posts.payment');
    }
    public function contactpage()
    {
    	return view('users.contact');
    }
    public function Card()
    {  if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      }
      $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();

      return view('users.posts.Mycard',[
              'posts'=>post::all(),
              'cards'=>card::all(),
              'cards_count'=>$count_card
      ]);
    }
    public function store(cardrequest $request)
    {
      card::create([
           'user_id'=>$request->user_id,
           'item_id'=>$request->item_id,
           'qte'=>$request->qte
      ]);

        session()->flash('success','post added to your card successfully');

        return redirect('/Mycard');
    }
    /*Check if (card $card) or $id*/
    public function destroy($id)
    {
        card::where('id',$id)->delete(); 
           
            session()->flash('success','Product Deleted Successfully');
        
        return redirect('/Mycard');
    }
    public function SendToSupport(Request $request)
    {
      $request->validate([
      'name'=>'required',
      'email'=>'required|email',
      'subject'=>'required',
      'body'=>'required'
      ]);
      $name=$request->input('name');
      $email=$request->input('email');
      $subject=$request->input('subject');
      $body=$request->input('body'); 
      
      Mail::to("mmed40089@gmail.com")->send(new ContactUs($name,$email,$subject,$body));
      
      return redirect('/Contact')->with('message','Your Message Sent Successfully!');
      //https://www.youtube.com/watch?v=zzw1NlnMWwY&ab_channel=KhalidElshafie
    }
   
}
