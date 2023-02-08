<?php

namespace App\Http\Controllers;
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
            'title' => 'required',
            'description' => 'required',
            'date_max' => 'required',
            'num_candidates' => 'required',
            'cicle_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $offers = Offers::create($input);

        return response()->json(['offer' => $offers->toArray()], $this->successStatus);
    }

    public function show() {
        $offers = Offers::all();


        if (is_null($offers)) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        return view('userViews.userView', compact('offers'));
    }

    public function update(Request $request, Offers $offer) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'date_max' => 'required',
            'num_candidates' => 'required',
            'cicle_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $offer->title = $input['title'];
        $offer->description = $input['description'];
        $offer->date_max = $input['date_max'];
        $offer->num_candidates = $input['num_candidates'];
        $offer->cicle_id = $input['cicle_id'];
        $offer->save();

        return response()->json(['offer' => $offer->toArray()], $this->successStatus);
    }

    public function destroy(Offers $offer) {
        $offer->delete();

        return response()->json(['offer' => $offer->toArray()], $this->successStatus);
    }
}
