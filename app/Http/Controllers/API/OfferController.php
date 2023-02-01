<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offers;
use App\Cicles;
use Validator;

class OfferController extends Controller { 
    public $successStatus = 200;

    public function index() {
        $offers = Offers::paginate(10);
        $cicles = Cicles::all();

        return view('user.offers')->with('offers', $offers)->with('cicles', $cicles);
    }

    public function store(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title'=> 'required',
            'description' => 'required',
            'date_max'=> 'required',
            'cicle_id'=>'required',
            'num_candidates'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $offer = Offers::create($input);

        return response()->json(['Offer' => $offer->toArray()], $this->successStatus);
    }

    public function show($id) {
        $offer = Offers::find($id);

        if (is_null($offer)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return response()->json(['Offer' => $offer->toArray()], $this->successStatus);
    }

    public function update(Request $request, Offers $offer) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title'=> 'required',
            'description' => 'required',
            'date_max'=> 'required',
            'cicle_id'=> 'required',
            'num_candidates'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $offer->title = $input['title'];
        $offer->description = $input['description'];
        $offer->date_max = $input['date_max'];
        $offer->num_candidates = $input['num_candidates'];
        $offer->save();

        return response()->json(['Offer' => $offer->toArray()], $this->successStatus);
    }

    public function destroy(Offers $offer) {
        $offer->delete();

        return response()->json(['Offer' => $offer->toArray()], $this->successStatus);
    }
}
