<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\CategoryAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Ads::with(['categoryAds'])->latest()->get());
        return view('ads.v-allAds', [
            'ads' => Ads::with(['categoryAds'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.v-createAds', [
            'categories_ads' => CategoryAds::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'institution_name' => 'required',
            'categoryads_id' => 'required',
            'ads_url' => 'required|image|file',
        ]);
        if ($request->ads_url) {
            $validatedData['ads_url'] = $request->ads_url->store('img/ads');
        }
        $validatedData['status'] = 1;
        $categoryAds['status'] = 0;

        // dd($validatedData);
        Ads::create($validatedData);
        CategoryAds::where('id', $validatedData['categoryads_id'])->update($categoryAds);
        activity()->log('Add new banner ads');


        return redirect('/ads')->with('success', 'New ads has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad)
    {
        return view('ads.v-showAds', [
            'ads' => $ad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        return view('ads.v-editAds', [
            'ads' => $ad,
            'categories_ads' => CategoryAds::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        // dd($request);
        $validatedData = $request->validate([
            'institution_name' => 'required',
            'categoryads_id' => 'max:255',
            'ads_url' => 'image|file',
            'status' => 'required',
        ]);
        if ($request->ads_url) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['ads_url'] = $request->ads_url->store('img/ads');
        }
        if ($request->categoryads_id != $ad->categoryads_id) {
            $categoryAds['status'] = 1;
            CategoryAds::where('id', $ad->categoryads_id)->update($categoryAds);
        }
        if ($request->categoryads_id) {
            $categoryAds['status'] = 0;
            CategoryAds::where('id', $validatedData['categoryads_id'])->update($categoryAds);
        }
        if ($request->status) {
            if ($request->status === 0) {
                $categoryAds['status'] = 1;
            }
            $categoryAds['status'] = 0;
            CategoryAds::where('id', $ad->categoryads_id)->update($categoryAds);
        }

        // dd($validatedData);
        Ads::where('id', $ad->id)->update($validatedData);
        activity()->log('Edit ads');


        return redirect('/ads')->with('success', 'Ads has been edited !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        activity()->log('Deleted a ads');
        if ($ads->ads_url) {
            Storage::delete($ads->ads_url);
        }
        Ads::destroy($ads->id);

        //edited status on category ads status
        if ($ads->status === 1) {
            $categoryAds['status'] = 1;
            CategoryAds::where('id', $ads->categoryads_id)->update($categoryAds);
        }

        return redirect('/ads')->with('success', 'Ads has been deleted !');
    }
}
