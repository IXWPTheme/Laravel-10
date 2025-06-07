<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Sites;
use App\Models\Units;
use App\Models\StartFinding;
use Intervention\Image\Facades\Image;  // Add this line
use Illuminate\Support\Str;

class SiteFindingController extends Controller
{
    public function siteFindingList(Request $request){
        $data = [
            'pageTitle'=>'Site Finding List & Units management'
        ];
        return view('back.pages.admin.site-finding-list',$data);
    } 

    public function addSites(Request $request){
        $data = [
            'pageTitle'=>'Add Sites'
        ];
        return view('back.pages.admin.add-sites',$data);
    }
   
    public function  storeSites(Request $request){
        //VALIDATE THE FORM
        $request->validate([
            'sites_name'=>'required|min:5|unique:sites,sites_name',
            'sites_image'=>'required|image|mimes:png,jpg,jpeg,svg',
        ],[
            'sites_name.required'=>':Attribute is required',
            'sites_name.min'=>':Attribute must contains atleast 5 characters',
            'sites_name.unique'=>'This :attribute is already exists',
            'sites_image.required'=>':Attribute is required',
            'sites_image.image'=>':Attribute must be an image',
            'sites_image.mimes'=>':Attribute must be in JPG,JPEG,PNG or SVG format'
        ]);

        if( $request->hasFile('sites_image') ){
            $path = 'images/sites/';
            $file = $request->file('sites_image');
            $filename = time().'_'.$file->getClientOriginalName();

            // Create directory if it doesn't exist (with proper permissions)
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true);
        }

            //Upload sites image
            $upload = $file->move(public_path($path),$filename);

            if($upload){
                //Save sites into Database
                $sites = new Sites();
                $sites->sites_tech_name = 'Anand';
                $sites->sites_tech_employee_id = '123456789';
                $sites->sites_name = $request->sites_name; 
                $sites->sites_slug = null;
                $sites->sites_address = $request->sites_name; 
                $sites->sites_city = $request->sites_name; 
                $sites->cus_company	= $request->sites_name; 
                $sites->finding_ref	= $request->sites_name; 
                $sites->sites_desc = $request->sites_name; 
                $sites->sites_image = $filename;
                $saved = $sites->save();

                if( $saved ){
                    $lastInsertedId = $sites->id; // Get the last inserted ID
                    return redirect()->route('admin.manage-site-finding.add-units', ['id'=>$lastInsertedId])->with('success','<b>'.ucfirst($request->sites_name).'</b> Sites has been successfully added.');
                }else{
                    return redirect()->route('admin.manage-site-finding.add-sites')->with('fail','Something went wrong. Try again later.');
                }
            }else{
                return redirect()->route('admin.manage-site-finding.add-sites')->with('fail','Something went wrong while uploading Sites image.');
            }
        }
    }
     public function addUnitsSites(Request $request){
        $independent_subcategories = Sites::all();
        $categories = Sites::all();
        $data = [
            'pageTitle'=>'Add Units of Site',
            'categories'=>$categories,
            'subcategories'=>$independent_subcategories
        ];

        return view('back.pages.admin.add-units',$data);
    }
    public function storeUnits(Request $request){
        //VALIDATE THE FORM
        $request->validate([
            'unit_name'=>'required|min:5|unique:sites,sites_name'            
        ],[
            'unit_name.required'=>':Attribute is required',
            'unit_name.min'=>':Attribute must contains atleast 5 characters',
            'unit_name.unique'=>'This :attribute is already exists'
            
        ]);

        $units = new Units();
        $units->unit_site_id = $request->site_id;
        $units->unit_name = $request->unit_name; 
        $units->finding_reference_id =  '123456'; 
        $units->unit_type =  $request->unit_name;       
        $units->unit_slug = $request->unit_name; 
        $units->unit_model = $request->unit_name; 
        $units->unit_serial_id = $request->unit_name; 
        $units->unit_cust_reference = $request->unit_name; 
        $units->unit_image = $request->unit_name;            
        $saved = $units->save();

         if( $saved ){
                $lastInsertedId = $units->id; // Get the last inserted ID
                $siteId = $units->unit_site_id;
                return redirect()->route('admin.manage-site-finding.add-finding', ['site_id'=>$siteId, 'unit_id'=>$lastInsertedId])->with('success','<b>'.ucfirst($request->unit_name).'</b> Unit has been successfully added.');
            } else {
                return redirect()->route('admin.manage-site-finding.add-units')->with('fail','Something went wrong. Try again later.');
            }
            
    }

    public function addFinding(Request $request){
        $independent_subcategories = StartFinding::all();
        $start_finding = StartFinding::all();
        $data = [
            'pageTitle'=>'Add Finding of Site & Units',
            'startfinding'=>$start_finding,
            'subcategories'=>$independent_subcategories
        ];

        return view('back.pages.admin.add-finding', $data);
    }

    public function storeFinding(Request $request){
        //VALIDATE THE FORM
        $request->validate([
            'find_name' => 'required|min:5|unique:start_findings,find_name',
            'before_photos' => 'required|array',
            'before_photos.*' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048' // 2MB max per image
        ], [
            'find_name.required' => 'Finding name is required',
            'find_name.min' => 'Finding name must be at least 5 characters',
            'find_name.unique' => 'This finding name already exists',
            'before_photos.required' => 'At least one before photo is required',
            'before_photos.array' => 'Invalid file upload',
            'before_photos.*.required' => 'Each photo is required',
            'before_photos.*.image' => 'Each file must be an image',
            'before_photos.*.mimes' => 'Only JPG, JPEG, PNG, or SVG images are allowed',
            'before_photos.*.max' => 'Each image must be less than 2MB'
            
        ]); 
        if($request->hasFile('before_photos')) {
        $path = 'images/finding/';
        $uploadedFiles = [];
        
        // Create directory if it doesn't exist
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true);
        }

        foreach($request->file('before_photos') as $file) {
            $filename = time().'_'.uniqid().'_'.$file->getClientOriginalName();
            //$upload = $file->move(public_path($path), $filename);
            
            // Create multiple sizes if needed
             $image = Image::make($file);
    
            // Save original
            $upload_original = $image->save(public_path($path.'original/'.$filename));
    
            // Save thumbnail
            $upload_thumbnail = $image->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();})->save(public_path($path.'thumbnails/'.$filename));     
            
            if($upload_original || $upload_thumbnail) {
                $uploadedFiles[] = $filename;
            }
        }

        if(!empty($uploadedFiles)) {
            $findNamea = time() .'-'. $request->find_name;   
            $units = new StartFinding();
            $units->find_site_id = $request->site_id;
            $units->find_unit_id = $request->unit_id; 
            $units->find_reference_id = '123456'; 
            $units->find_name = $request->find_name;       
            $units->find_slug = $findNamea; 
            $units->find_desc = $request->find_name; 
            $units->find_before_img = json_encode($uploadedFiles); // Store as JSON array
            $units->find_after_img = $uploadedFiles[0]; // First image as after image
            $units->find_status = 'New';            
            $saved = $units->save();

            if($saved) {               
                return redirect()->route('admin.manage-site-finding.add-finding', [
                    'site_id'=>$request->site_id, 
                    'unit_id'=>$request->unit_id
                ])->with('success','<b>'.ucfirst($request->find_name).'</b> Site Finding has been successfully added.');
            }
        }
    }
    
        return redirect()->route('admin.manage-site-finding.add-finding', [
            'site_id'=>$request->site_id, 
            'unit_id'=>$request->unit_id
        ])->with('fail','Something went wrong. Try again later.');
    }
}
