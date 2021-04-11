<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColorDetailsResource;
use App\Http\Resources\ColorResource;
use App\Models\ColorDetails;
use Illuminate\Http\Request;
use App\Models\GlobalKansai;
use App\Models\Colors;
use App\Models\ProductGroups;
use App\Models\Trends;
use App\Models\PartialSiteContents;
use App\Models\Contents;
class ApiController extends Controller
{
    public function company(Request $request)
    {
        $company = GlobalKansai::where('country_code','AE')->get()->first();
        $company->token = $request->token;
        return $company;
    }
    public function colors(string $page)
    {
        $colors = Colors::where('link', $page)->with(['color_details' => function($query){
            $query->with(['color_specs']);
        }])->get();
        
        return ColorResource::collection($colors)->response();
    }
    public function products(string $page)
    {
        $products = ProductGroups::where('link', $page)->get();
        return response($products, 201);
    }
    public function trends(string $page)
    {
        $trends = Trends::where('link', $page)->get();
        return response($trends, 201);
    }
    public function settings(string $site, string $page)
    {
        $settings = PartialSiteContents::where('site',ucwords($site))->where('page',$page)->get()->first();   
        return response($settings, 201); 
    }
    public function contents(string $site, string $page=null)
    {
        $contents = Contents::where('site', $site)->where('page',($page == 'landingpage'?'':$page) )->orderBy('order')->get();   
        return response($contents, 201); 
    }
}
