<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product,$image,$imageName,$directory,$imageUrl,$extension,$message;

    public static function getImageUrl($request,$directory)
    {
        self::$image        =$request->file('image');
        self::$extension    =self::$image->getClientOriginalExtension();
        self::$imageName    ='class7_'.time().'.'.self::$extension;
        self::$image->move($directory,self::$imageName);
        return $directory.self::$imageName;

    }

    public static function addProduct($request)
    {


        self::$product =new Product();
        self::$product->title      = $request->title;
        self::$product->category     = $request->category;
        self::$product->brand  = $request->brand;
        self::$product->price     = $request->price;
        self::$product->description =$request->description;
        self::$product->image     = self::getImageUrl($request,'upload/product-image/');
        self::$product->save();

    }

    public static function updateProduct($request,$id)
    {
      self::$product = Product::find($id);
      if ($request->file('image'))
      {
          if (file_exists(self::$product->image))
          {
              unlink(self::$product->image);
          }
          self::$imageUrl = self::getImageUrl($request,'upload/product-image/');

      }
      else
      {
          self::$imageUrl = self::$product->image;
      }

        self::$product->title      = $request->title;
        self::$product->category     = $request->category;
        self::$product->brand  = $request->brand;
        self::$product->price     = $request->price;
        self::$product->description =$request->description;
        self::$product->image     = self::$imageUrl ;
        self::$product->save();

    }

    public static function deleteProduct($id)
    {
       self::$product = Product::find($id);
       if (file_exists(self::$product->image))
       {
           unlink(self::$product->image);
       }
       self::$product->delete();
    }
}
