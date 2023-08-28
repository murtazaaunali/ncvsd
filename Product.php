<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\Http\Requests\LoginRequest;
use Validator;
use Response;
use App\users;
use App\basic_model;
use App\Product_model;
use App\Category_model;
use App\Gallery_model;
use App\Document_model;
use App\Tutorial_model;
use Redirect;
use URL;
use Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\Input;
class Product extends Controller {
  	public function __construct(){
  		$this->data['title'] = 'Product Listing';
  	}
  	
	public function clean($string) {
	   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}  	
  	
	function index() {
     $this->verifylogin();
     $fields    = Input::all();
     $records_per_page = 10;
     $page    = isset($fields['page']) ? ($fields['page']-1)*$records_per_page : -1;
     $products  = new Product_model();
     $categories = new Category_model();
     $total_records   = $products->totalrecords();
     $products_data   = $products->records($page,$records_per_page);
     
     /*foreach($products_data as $rec){
	 	$slug = strtolower(str_replace('--','-',$this->clean($rec->header_title)));
	 	$products->update_recc($rec->product_id,$slug);
	 }
	 exit;*/
     
     $this->data['total_records'] = $total_records;
     $this->data['products'] = $products_data;
     $this->data['heading'] = 'Products';
     $this->data['records_per_page'] = $records_per_page;
     return $this->adminview('admin.products.list',$this->data);
    }
    function form($id=0)
    {
    	//echo $id;exit;
    	$categories 	= new Category_model();
    	$galleries 		= new Gallery_model();
    	$products 		= new Product_model();
    	$product 		= ($id == 0) ? array() : $products->getproduct($id);
    	$getquoteforms 	= $products->getquoteforms($id);
    	$videos 		= '';
    	$gallery 		= '';
    	$quotes 		= array();
    	if($id){$videos = $products->getproductvideos($id);}
    	if($id){$gallery = $galleries->getproductimages($id);}
    	//echo '<pre>';print_r($product);echo '</pre>';exit;

    	$this->data['categories']			= $categories->records();
    	$this->data['product_id'] 			= $id;
    	$this->data['category_id'] 			= '';
    	$this->data['quote_form'] 			= '';
    	$this->data['header_title']			= '';
    	$this->data['banner']				= '';
    	$this->data['imgid']				= '';
    	$this->data['seo_title']			= '';
    	$this->data['meta_description']		= '';
    	$this->data['meta_keywords']		= '';
    	$this->data['product_title']		= '';
    	$this->data['status']				= '';
    	$this->data['home']					= '';
    	$this->data['description']			= '';
    	$this->data['youtube_videos']		= array();
    	$this->data['phto_gallery']			= array();
    	$this->data['condition_videos']		= false;
    	$this->data['condition_gallery']	= false;
    	$this->data['heading'] 				= 'Add Product';
    	$this->data['breadcrumb'] 			= 'Add';
    	//print_r($videos);exit;
    	if( !empty($videos) ) $this->data['condition_videos']	= true;
    	if( !empty($gallery) ) $this->data['condition_gallery']	= true;
    	if( !empty($getquoteforms) ) $quotes = $getquoteforms;
    	
    	$this->data['quote_forms']		= $quotes;

    	
    	if(	!empty($product) ){
	    	$this->data['category_id'] 		= $product->category_id;
	    	$this->data['quote_form'] 		= $product->quote_form;
	    	$this->data['header_title']		= $product->header_title;
	    	$this->data['seo_title']		= $product->seo_title;
	    	$this->data['meta_keywords']	= $product->meta_keywords;
	    	$this->data['meta_description']	= $product->meta_description;
	    	$imgdata 						= $galleries->getbanner($product->product_id);
	    	
	    	if(!empty($imgdata))
	    	{
		    	$this->data['banner']		= $imgdata->url;
		    	$this->data['imgid']		= $imgdata->id;
			}
			
	    	$this->data['home']				= $product->home;
	    	$this->data['product_title']	= $product->title;
	    	$this->data['status']			= $product->status;
	    	$this->data['description']		= $product->description;
	    	$this->data['youtube_videos']	= $videos;
	    	$this->data['phto_gallery']		= $gallery;
	    	$this->data['heading'] 			= 'Edit Product';
	    	$this->data['breadcrumb'] 		= 'Edit';
		}
		
    	return $this->adminview('admin.products.form',$this->data);
	}
	
	public function deleterecords(Request $request){
		$products = new Product_model();
		$fields = Input::all();
		//echo '<pre>';print_r($fields);echo '</pre>';exit;
		foreach($fields['product_ids'] as $product_id){
			$products->rec_delete($product_id);
		}
		Session::flash('success','<div class="alert alert-success">Products Deleted succesfully</div>');
		return redirect('admin/product');
	}

	function delete($id = 0){
		$product = new Product_model();
		if($id){
			$product->rec_delete($id);
		}
		Session::flash('success','<div class="alert alert-success">Product Deleted succesfully</div>');
		return redirect('admin/product');
	}
	
	public function upload(Request $request)
	{
		$file = $request->file('file');
		$fields = Input::all();
		$filetype = 'gallery';
		if(isset($fields['filetype'])) $filetype = 'banner';
		$length = 15;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$newfilename = '';
		for ($i = 0; $i < $length; $i++)
		{
			$newfilename .= $characters[rand(0, $charactersLength - 1)];
		}
		$newname = $newfilename.'.'.$file->getClientOriginalExtension();
		//Move Uploaded File
		$destinationPath = 'uploads/products/gallery';
		if(isset($fields['filetype'])) $destinationPath = 'uploads/products/banner';
		$gallery 	= new Gallery_model();
		$data = array(
			'url'			=>	url('/').'/'.$destinationPath.'/'.$newname,
			'product_id'	=>	0,
			'product_img'	=>	0,
			'added_on'		=>	date('Y-m-d H:i:s'),
			'added_by'		=>	session("user_id"),
			'type'		=>	$filetype,
		);
		$insert_id = $gallery->create_records($data);
		$file->move($destinationPath,$newname);
		
		if(isset($fields['filetype'])) echo json_encode(array("id"=>$insert_id,"url"=>url('/').'/'.$destinationPath.'/'.$newname));
		else echo $insert_id;
	}
	public function process(Request $request)
	{
		//echo "<pre>"; print_r($request); echo "</pre>"; exit;
		$product = new Product_model();
		$gallery = new Gallery_model();
		$fields = Input::all();
		$file = $request->file('banner');
		$image_url = '';
		//echo "<pre>"; print_r($fields); echo "</pre>"; exit;
		
     	Session::flash('fields', array(
			'title'				=> $fields['title'],
			'description'		=> $fields['description'],
			'seo_title'			=> $fields['seo_title'],
			'category_id'		=> $fields['category_id'],
			'quote_form'		=> $fields['quote_form'],
			'home'				=> $fields['home'],
		));
     	
     	$rules = [
		    'title' => 'required',
		    'category_id' => 'required',
		    //'gallery_img' => 'required',
		    //'product_img' => 'required',
		];
		
		$customMessages = [
	        'category_id.required' => 'The category field is required.',
	        //'gallery_img.required' => 'Please add atleast one image in product gallery',
	        //'product_img.required' => 'Please check atleast one product gallery image'
    	];
    	
		$this->validate($request,$rules,$customMessages);
		if(!$fields['product_id']){

			$data = array(
				'title'				=> $fields['title'],
				'description'		=> $fields['description'],
				'home'				=> $fields['home'],
				//'banner'			=> $image_url,
				'header_title'		=> $fields['header_title'],
				'quote_form'		=> $fields['quote_form'],
				'slug'				=> strtolower(str_replace('--','-',$this->clean($fields['header_title']))),
				'seo_title'			=> $fields['seo_title'],
				'meta_keywords'		=> $fields['meta_keywords'],
				'meta_description'	=> $fields['meta_description'],
				'category_id'		=> $fields['category_id'],
				'added_on'			=> date('Y-m-d H:i:s'),
				'added_by'			=> session("user_id"),
				'status'			=> $fields['status'],
			);
			$product_id = $product->create_records($data);
			Session::flash('success','<div class="alert alert-success">Product Added succesfully</div>');

		}else{
			$product_id = $fields['product_id'];
			$data = array(
				'title'				=> $fields['title'],
				'description'		=> $fields['description'],
				'home'				=> $fields['home'],
				//'banner'			=> $image_url,
				'header_title'		=> $fields['header_title'],
				'seo_title'			=> $fields['seo_title'],
				'meta_keywords'		=> $fields['meta_keywords'],
				'meta_description'	=> $fields['meta_description'],
				'category_id'		=> $fields['category_id'],
				'status'			=> $fields['status'],
			);
			$product->update_records($data,$product_id);
			Session::flash('success','<div class="alert alert-success">Product updated succesfully</div>');
		}
		
		if(isset($fields['banner']) && $product_id){
			$gallery->deletebanner($product_id);
			$gallery->updatebanner($fields['banner'],$product_id);
			
		}
		
		
		$gallery->replacepreviousgallery($product_id);
		if($product_id && isset($fields['gallery_img']) ){
			foreach($fields['gallery_img'] as $ids){
				$gallery->update_record($ids,$product_id);
			}
		}
		
		if(isset($fields['product_img'])){
			$gallery->updateProductImg($fields['product_img'], $product_id);
		}

		$product->deletevideos($product_id);
		if( !empty($fields['youtube_videos']) ){
			foreach($fields['youtube_videos'] as $url){
				$data = array(
					'url'		=>$url,
					'product_id'=>$product_id,
					'added_on'	=> date('Y-m-d H:i:s'),
					'added_by'	=> session("user_id"),
				);
				
				$product->add_videos($data);
			}
		}
		
		return redirect('admin/product/edit/'.$product_id);
		//return $this->adminview('admin.products.list');
	}
	
	function fileupload($file){
		$length = 15;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$newfilename = '';
		for ($i = 0; $i < $length; $i++)
		{
			$newfilename .= $characters[rand(0, $charactersLength - 1)];
		}
		$newname = $newfilename.'.'.$file->getClientOriginalExtension();
		//Move Uploaded File
		$destinationPath = 'uploads/products/banner';
		$image_url = url('/').'/'.$destinationPath.'/'.$newname;
		$file->move($destinationPath,$newname);	
		return $image_url;		
	}
	
	/**
	* 
	* @Document
	* 
	*/
	
	function document($id=0) {
    	$products 	= new Product_model();
    	$documents_model 	= new Document_model();
    	$categories = new Category_model();
		$fields    = Input::all();

		$records_per_page = 5;
		$page  = isset($fields['page']) ? ($fields['page']-1)*$records_per_page : -1;
    	$total_records	= $documents_model->totalrecords($id);
    	$documents = $documents_model->getdocument($id,$page,$records_per_page);
    	$this->data['heading'] = 'Documents';
    	$this->data['product_id'] = $id;
    	$this->data['documents'] = $documents;
    	$this->data['total_records'] = $total_records;
		$this->data['records_per_page'] = $records_per_page;
    	return $this->adminview('admin.documents.document',$this->data);
    }

    public function documentupload(Request $request){
		$documents 	= new Document_model();
		$fields = Input::all();
		//echo '<pre>';print_r($fields);exit;

     	$rules = ['title' => 'required','document' => 'required'];
		$customMessages = [
			'title.required' => 'Title field is required.',
			'document.required' => 'Document is required.',
		];
		$this->validate($request,$rules,$customMessages);


		//BANNER UPLOAD 
		$file = $request->file('document');
		$file_size = round(($file->getSize() / 1024), 1).' KB';
		$type = $file->getClientOriginalExtension();
		
		$length = 15;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$newfilename = '';
		for ($i = 0; $i < $length; $i++)
		{
			$newfilename .= $characters[rand(0, $charactersLength - 1)];
		}
		$newname = $newfilename.'.'.$file->getClientOriginalExtension();
		//Move Uploaded File
		$destinationPath = 'uploads/products/document';
		$document_url = url('/').'/'.$destinationPath.'/'.$newname;
		$file->move($destinationPath,$newname);	
		
		//BANNER UPLOAD 	

		$data = array(
			'product_id'		=> $fields['product_id'],
			'title'				=> $fields['title'],
			'url'				=> $document_url,
			'type'				=> $type,
			'size'				=> $file_size,
			'added_on'			=> date('Y-m-d H:i:s'),
			'added_by'			=> session("user_id"),
			'status'			=> '0',
		);
		$documents->add_record($data);

		Session::flash('success','<div class="alert alert-success">Document added succesfully</div>');
		return redirect('admin/product/document/'.$fields['product_id']);

	}

	public function deletedocs(Request $request){
		$documents 	= new Document_model();
		$fields = Input::all();
		//echo '<pre>';print_r($fields);echo '</pre>';exit;
		foreach($fields['doc_ids'] as $doc_id){
			$documents->rec_delete($doc_id);
		}
		Session::flash('success','<div class="alert alert-success">Documents Deleted succesfully</div>');
		return redirect('admin/product/document/'.$fields['product_id']);
	}

	function deletedoc($id = 0,$productid=0){
		$documents 	= new Document_model();
		if($id){
			$documents->rec_delete($id);
		}
		Session::flash('success','<div class="alert alert-success">Document Deleted succesfully</div>');
		return redirect('admin/product/document/'.$productid);
	}
	
	/**
	* 
	* @Document
	* 
	*/
	
	/**
	* 
	* @Tutorial
	* 
	*/
	function tutorial($id=0) {
    	$products 			= new Product_model();
    	$tutorials_model 	= new Tutorial_model();
		$fields    			= Input::all();

		$records_per_page = 2;
		$page  = isset($fields['page']) ? ($fields['page']-1)*$records_per_page : -1;
    	$total_records	= $tutorials_model->totalrecords($id);
    	$tutorials = $tutorials_model->gettutorial($id,$page,$records_per_page);
    	$this->data['heading'] = 'Tutorials';
    	$this->data['product_id'] = $id;
    	$this->data['tutorials'] = $tutorials;
    	$this->data['total_records'] = $total_records;
		$this->data['records_per_page'] = $records_per_page;
    	return $this->adminview('admin.tutorials.tutorial',$this->data);
    }

    public function tutorialupload(Request $request){
		$tutorials 	= new Tutorial_model();
		$fields = Input::all();
		
		if($fields['type'] == 'file')
		{
			$rules = ['title' => 'required','document' => 'required'];
			$customMessages = [
				'title.required' => 'Title field is required.',
				'document.required' => 'Document is required.',
			];
		}
		else
		{
			$rules = ['title' => 'required','url' => 'required'];
			$customMessages = [
				'title.required' => 'Title field is required.',
				'url.required' => 'Embed Code field is required.',
			];
		}
		
    	$this->validate($request,$rules,$customMessages);
    	
    	$file_size 		= 0;
    	$url 			= "";
    	$file_extension	= "";
    	
    	if($fields['type'] == 'file')
    	{
			//BANNER UPLOAD 
			$file = $request->file('document');
			$file_size = round(($file->getSize() / 1024), 1).' KB';
			$file_extension = $file->getClientOriginalExtension();
			
			$length = 15;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$newfilename = '';
			for ($i = 0; $i < $length; $i++)
			{
				$newfilename .= $characters[rand(0, $charactersLength - 1)];
			}
			$newname = $newfilename.'.'.$file->getClientOriginalExtension();
			//Move Uploaded File
			$destinationPath = 'uploads/products/tutorial';
			$url = url('/').'/'.$destinationPath.'/'.$newname;
			$file->move($destinationPath,$newname);
		}
		else
		{
			$url = $fields['url'];
		}
		
		//BANNER UPLOAD 	

		$data = array(
			'product_id'		=> $fields['product_id'],
			'title'				=> $fields['title'],
			'url'				=> $url,
			'type'				=> $fields['type'],
			'file_extension'	=> $file_extension,
			'size'				=> $file_size,
			'added_on'			=> date('Y-m-d H:i:s'),
			'added_by'			=> session("user_id"),
			'status'			=> '0',
		);
		
		$tutorials->add_record($data);

		Session::flash('success','<div class="alert alert-success">Tutorial added succesfully</div>');
		return redirect('admin/product/tutorial/'.$fields['product_id']);

	}

	public function deletetuts(Request $request){
		$tutorials 	= new Tutorial_model();
		$fields = Input::all();
		foreach($fields['tut_ids'] as $id){
			$tutorials->rec_delete($id);
		}
		Session::flash('success','<div class="alert alert-success">Tutorials Deleted succesfully</div>');
		return redirect('admin/product/tutorial/'.$fields['product_id']);
	}

	function deletetut($id = 0,$productid=0){
		$tutorials 	= new Tutorial_model();
		if($id){
			$tutorials->rec_delete($id);
		}
		Session::flash('success','<div class="alert alert-success">Tutorial Deleted succesfully</div>');
		return redirect('admin/product/tutorial/'.$productid);
	}
	/**
	* 
	* @Tutorial
	* 
	*/
	
	function deleteimg($id){
		$gallery	= new Gallery_model();
		$image_link =  $gallery->deletegalleryimg($id);
		$image = pathinfo($image_link->url);
		$filename = $image['basename'];
		if($image_link->type == 'banner'){
			$destinationPath = 'uploads/products/banner/';
		}else{
			$destinationPath = 'uploads/products/gallery/';
		}
		unlink($destinationPath.$filename);
		return 'true';
	}
	
	function deletebanner($id){
		$products 	= new Product_model();
		$image_link =  $products->deletebanner($id);
		$image = pathinfo($image_link);
		$filename = $image['basename'];
		$destinationPath = 'uploads/products/banner/';
		unlink($destinationPath.$filename);
		return 'true';
	}	
    
}