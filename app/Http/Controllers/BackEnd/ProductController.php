<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('admin.product.index',compact('products'));
    }

    public function listing()
    {
        $products = $this->productRepository->getAll();
        return view('frontend.produits',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
       return view('admin.product.create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = $request->post();
        $images = $request->file('images');
        $inputs['code'] = generateCode('VPSHOP','product','code');

        try{
            $response =  \DB::transaction(function () use ($images,$inputs){
                //Saving logo in logo repository
                $i  = 0;
                $imageNames = [];
                if($images){
                    foreach($images as $image){
                        $newName = strtolower($inputs['code'].$i++.'.'.$image->getClientOriginalExtension());
                        //$image->move(public_path('/frontend/images/shop/'), $newName);
                        \Image::make($image)->resize(416,400)->save(public_path('/frontend/images/shop/'.$newName));
                        $imageNames[] = strtolower($newName);
                    }
                    $inputs['image'] = json_encode($imageNames);
                }

                $this->productRepository->store($inputs);
                return  redirect(route('product.index'))->with(['status'=>'success','message'=>'Produit ajouté avec succes']);
            });
            return $response;
        }catch (\Exception $e){
                dd($e);
            $response = redirect(route('product.index'))->with(['status'=>'danger','message'=>'Erreur lors de mise en jour du produit']);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  $this->productRepository->getById($id);
        $products =  $this->productRepository->getAll();
        return view('frontend.produits-details', compact('product', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product =  $this->productRepository->getById($id);

        if(!$product){
            return redirect(route('product.index'))->with(['status'=>'danger','message'=>'produit introuvable']);
        }

        $data = ['label_en'=>'Description détaillée (En)','label_fr'=>'Description détaillée (Fr)'];
        $data['description_en'] = $product->description_en;
        $data['description_fr'] = $product->description_fr;
      return view('admin.product.edit', compact('product','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return  redirect(route('product.index'))->with(['status'=>'info','message'=>__('Fonctionalité en cours de traitement. Veuillez contacter l\'administrateur!')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->getById($id);

        if($product->is_published == 1){
            return  redirect(route('product.index'))->with(['status'=>'info','message'=>'Artcle est deja publié']);
        }

        if(!$product){
            return  redirect(route('product.index'))->with(['status'=>'danger','message'=>__('Article introuvable')]);
        }

        try{
            $this->productRepository->destroy($id);

            $response = redirect(route('product.index'))->with(['status'=>'success','message'=>__('Article supprimer avec succes')]);
        }catch (\Exception $e){
            $response = redirect(route('product.index'))->with(['status'=>'danger','message'=>'Erreur lors de traitement de votre requete']);
        }
        return $response;
    }

    public function publish($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>1,'user_updated_id'=>$user->id];
        $news = $this->productRepository->getById($id);

        if(!$news){
            return  redirect(route('product.index'))->with(['status'=>'danger','message'=>__('Article introuvable')]);
        }
        try{
            $this->productRepository->update($id,$inputs);
            $response = redirect(route('product.index'))->with(['status'=>'success','message'=>'Article publié avec succes']);
        }catch (\Exception $exception){
            $response = redirect(route('product.index'))->with(['status'=>'danger','message'=>'Erreur lors de traitement']);
        }

        return $response;
    }

    public function unPublish($id){

        $user = \Auth::user();
        $inputs = ['is_published'=>0];
        $inputs['user_updated_id'] = $user->id;

        $news = $this->productRepository->getById($id);

        if(!$news){
            return  redirect(route('product.index'))->with(['status'=>'danger','message'=>__('Article introuvable')]);
        }
        try{
            $this->productRepository->update($id,$inputs);
            $response = redirect(route('product.index'))->with(['status'=>'success','message'=>'Article depublié avec succes']);
        }catch (\Exception $exception){
            $response = redirect(route('product.index'))->with(['status'=>'danger','message'=>'Erreur lors de traitement']);
        }

        return $response;
    }
}
