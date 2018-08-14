<?php

namespace App\Http\Controllers\Api\V1;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountriesRequest;
use App\Http\Requests\Admin\UpdateCountriesRequest;

class CountriesController extends Controller
{
    public function index()
    {
        return Country::all();
    }

    public function show($id)
    {
        return Country::findOrFail($id);
    }

    public function update(UpdateCountriesRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());
        

        return $country;
    }

    public function store(StoreCountriesRequest $request)
    {
        $country = Country::create($request->all());
        

        return $country;
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return '';
    }
}
