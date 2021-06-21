<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Cookie;
 
class iCard extends Controller
{
    //
     
 
    public function Brand(Request $request)
    {
      try {
        $pack =  $request->input('pack');
        $all =  $request->input('all');
        $uri = "http://icardtestapp.azurewebsites.net/Fulllist?all= $all&pack= $pack";
          $response = Http::asForm()->withHeaders([
              'Content-Type' => 'application/x-www-form-urlencoded'
           ])->get($uri);
           return response($response)->withHeaders([
            'Content-Type' => 'application/json',
                ]);
              } catch (Throwable $e) {
                return response()
        ->json(['message' => 'Error Network', 'Code' => '0']);
            }

    }

    //=============================
    public function BrandDetails(Request $request)
    {
      try {
        $id =  $request->input('id');
        $header = $request->header('Authorization');
          $uri = "http://icardtestapp.azurewebsites.net/Brand?id=$id";
          
          $response = Http::asForm()->withHeaders([
            'Authorization' => $header
         ])->get($uri);
         return response($response)->withHeaders([
          'Content-Type' => 'application/json',
              ]);
            } catch (Throwable $e) {
              return response()
              ->json(['message' => 'Error Network', 'Code' => '0']);
          }
    }


    //=============================
    public function ValidateCard(Request $request)
    {
      //  ValidateCard?cardno=7120112250&amount=0
      try {
      $cardno =  $request->input('cardno');
      $amount =  $request->input('amount');
      $header = $request->header('Authorization');
        $uri = "http://icardtestapp.azurewebsites.net/ValidateCard?cardno=$cardno&amount=$amount";
        
        $response = Http::asForm()->withHeaders([
          'Authorization' => $header
       ])->post($uri);
       return response($response)->withHeaders([
        'Content-Type' => 'application/json',
            ]);
          } catch (Throwable $e) {
            return response()
        ->json(['message' => 'Error Network', 'Code' => '0']);
        }

    }

     
      public function pay(Request $request)
      {
        try {
        $items =  $request->input('items');
        $confirmcode =  $request->input('confirmcode');
        $cardno =  $request->input('cardno');
        $captchaCode =$request->input('captchaCode');
 
          $iteams = json_encode($items);
          $params = array(
            'confirmcode' => $confirmcode,
            'cardno'=>$cardno,
        );
        return  $iteams;
          $uri = "https://icardtestapp.azurewebsites.net/apipay?items=" .json_encode($items) . "&confirmcode=$confirmcode&cardno=$cardno";
        //  return  $uri;
    $response = Http::asForm()->withHeaders([
        'apitoken' =>'c2fghj3#kleu4i$^nfddk3w4dow624kdlk+%#%RE$G^HDS543Dhhr%^H+78Ssrf#4f',
        
   ])->post($uri);
    return response($response)->withHeaders([
     
      'Content-Type' => 'application/json',
           ]);
            } catch (Throwable $e) {
              return response()
              ->json(['message' => 'Error Networksss', 'Code' => '0']);
        }


      }
      public function img(Request $request)
      {
        try {
          $id =  $request->input('id');
         
          $uri = "https://icardtestapp.azurewebsites.net/img/brands/100x100/$id.png";
          
    $response = Http::asForm()->withHeaders([
   ])->get($uri);
    return response($response)->withHeaders([
      
      'Content-Type' => 'image/png',
           ]);
            } catch (Throwable $e) {
              return response()
              ->json(['message' => 'Error Networksss', 'Code' => '0']);
        }


      }

       
}
