<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB, Auth, Session, Image,Carbon;
use App\Cafe;
use App\BoardGame;


class ProductController extends Controller
{
	
    public function products(Request $request)
    { dd('1');
        try{
            if($request->isMethod('post'))
            {
                $validator = Validator::make($request->input(), [
                    'name' => 'required',
                    'sku' => 'required',
                    'short_description' => 'required',
                    'quantity' => 'required',
                    'description' => 'required',
                    'price' => 'required',
                    'images' => 'required', 
                ]);

               
                if ($validator->fails()) {
                    return redirect()->route('products')
                        ->withErrors($validator)
                        ->withInput();
                }

               
                    DB::beginTransaction();
                    $products = new Product;
                    $products->fill($request->input());


                   //Image upload
                    if($request->hasFile('images')) {
                        $photo = $request->file('images');
                        if(isset($photo) && !empty($photo) && $photo->isValid()) {
                            $rules = array('photo' => 'required|mimes:png,jpg,jpeg');
                            $validator = Validator::make(array('photo'=> $photo), $rules);
                            if($validator->passes()) {
                                $file_name = CommonHelper::generate_safe_filename($request->input('name')).'_'.time().'.'.$photo->getClientOriginalExtension();
                                $file_path = public_path(config('constants.photo_path').$file_name);

                                // Resize Image
                                $save_photo = Image::make($photo->getRealPath())->resize(config('constants.image_width'), config('constants.image_height'))->save($file_path);

                                $products->images = $file_name;
                            }
                        }
                    }
                    $check = $products->save();

                    if($check) {
                        DB::commit();
                        return redirect()->route('products')->with('success');
                    } else {
                        throw new \Exception(trans('page_title.bg').' '.trans('common.flash.insert_fail'));
                    }
                
            }
            else{
               

                $data['products'] = Product::orderBy('id', 'desc')->get();

                return view('products', $data ?? NULL);
            }
        }
        Catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->route('products')->with('error', $e->getMessage());
        }
    }

    public function bg_edit(Request $request, $id)
    {
        try{
            if($request->isMethod('post'))
            {
                $validator = Validator::make($request->input(), [
                    'name' => 'required',
                    'sku' => 'required',
                    'short_description' => 'required',
                    'quantity' => 'required',
                    'description' => 'required',
                    'price' => 'required',
                    'images' => 'required', 
                ]);

                // if form validation errors
                if ($validator->fails()) {
                    return redirect()->route('products_edit', $id)
                        ->withErrors($validator)
                        ->withInput();
                }
                DB::beginTransaction();
                $products = Product::find($id);
                $products->fill($request->input());
                $check = $bg->save();

                //Image upload

                if($request->hasFile('images')) {
                    $photo = $request->file('images');
                    if(isset($photo) && !empty($photo) && $photo->isValid()) {
                        $rules = array('photo' => 'required|mimes:png,jpg,jpeg');
                        $validator = Validator::make(array('photo'=> $photo), $rules);
                        if($validator->passes()) {
                            $file_path = public_path(config('constants.bg_photo_path').$file_name);
                            // Resize Image
                            $save_photo = Image::make($photo->getRealPath())->resize(config('constants.image_width'), config('constants.image_height'))->save($file_path);

                            $products->images = $file_name;
                        }
                    }
                }
                $check = $products->save();

                if($check) {
                    DB::commit();
                    return redirect()->route('products')->with('success');
                } else {
                    throw new \Exception(trans('page_title.bg').' '.trans('common.flash.update_fail'));
                }

            }
           
        }
        Catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->route('products_edit', $id)->with('error', $e->getMessage());
        }

    }



   




}
