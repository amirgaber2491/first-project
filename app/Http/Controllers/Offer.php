<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Offer extends Controller
{
    public function index()
    {
        $offers = \App\Models\Offer::all();
        return view('offers.index', compact('offers'));
    }
    public function create()
    {
        return view('offers.create');
    }
    public function store(OfferRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('photo')):
            $imageName = time() . '_' . $request->file('photo')->getClientOriginalName();
            Image::make($request->file('photo'))->save(public_path('/images/offers/
            ' . $imageName));
            $input['photo'] = $imageName;
        endif;

        \App\Models\Offer::create($input);

        return redirect(route('offer.index'));
    }
    public function edit($id)
    {
        $offer = \App\Models\Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }
    public function update(Request $request, $id)
    {
        $offer = \App\Models\Offer::findOrFail($id)->update($request->all());
        return redirect(route('offer.index'));
    }


}
