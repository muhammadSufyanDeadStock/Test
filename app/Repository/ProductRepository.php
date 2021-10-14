<?php
namespace App\Repository;

use App\Models\products;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductRepository  implements IProductRepository{
    public function index(){
       $product= products::all();
        return View('products.index',compact('product'));
    }
    public function create(){
        return View('products.create');
    }
    public function store(){
        request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        products::create(request()->all());
        return redirect()->route('products');
    }
    public function edit(){
        $product=products::findOrFail(request()->id);
        return View('products.update',compact('product'));
    }
    public function update(){
        request()->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);
        products::findOrFail(request()->id)->update(request()->all());
        return redirect()->route('products');
    }
    public function delete(){
        if(request()->id){
            $product=products::findOrFail(request()->id);
            if($product){
                $product->delete();
                return redirect()->route('products');
            }
            else{
                abort(500);
            }
        }
    }
    public function export(){
        $fileName='Products.csv';
        $product=products::all();
        $headers=array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $columns=array('Sr.#','Title','Description','Price');
        $callback=function()use($product,$columns){
            $file=fopen('php://output','w');
            fputcsv($file,$columns);
            foreach ($product as $item) {
                fputcsv($file,array($item->id,
                $item->title,
                $item->description,
                $item->price
                ));
            }
            fclose($file);
        };
        return response()->stream($callback,200,$headers);
    }
    public function exportqueue(){
        $product=products::all();
        $file_name = 'example'.rand().'.csv';
        Storage::disk('public')->put($file_name,"");
        $contents = "storage/app/".$file_name;
        $file = fopen($contents, 'w');
         $headers = [
            'Sr.#',
            'Title',
            'Description',
            'Price',
        ];
        fputcsv($file, $headers);
        foreach ($product as $item) {
            fputcsv($file,array($item->id,
            $item->title,
            $item->description,
            $item->price
            ));
        }
        fclose($file);
        $headers=array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$file_name",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        return Storage::download($file_name,"xyz",$headers);
    }
}
