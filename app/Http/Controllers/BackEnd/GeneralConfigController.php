<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Repositories\CountryRepository;
use App\Repositories\EnquiriesRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\RegionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;

class GeneralConfigController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var CityRepository
     */

    protected  $cityRepository;

    /**
     * @var RegionRepository
     */

    protected  $regionRepository;

    /**
     * @var CountryRepository
     */

    protected  $countryRepository;

    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * @var PostRepositoryAlias
     */
    private $postRepository;

    /**
     * @var EnquiriesRepository
     */
    private $enquiriesRepository;


    /**
     * GeneralConfigController constructor.
     * @param EnquiriesRepository $enquiriesRepository
     * @param CompanyRepository $companyRepository
     * @param UserRepository $userRepository
     * @param CountryRepository $countryRepository
     * @param RegionRepository $regionRepository
     */
    public function __construct(
                                EnquiriesRepository $enquiriesRepository,
                                CompanyRepository $companyRepository,
                                UserRepository $userRepository,
                                CountryRepository $countryRepository,
                                RegionRepository $regionRepository){
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->countryRepository = $countryRepository;
        $this->regionRepository = $regionRepository;
        $this->companyRepository = $companyRepository;
        $this->enquiriesRepository = $enquiriesRepository;

    }

    public function generalConfiguration(){
        return view('admin.dashboard',compact('applications'));
    }

    public function company()
    {

         $company = $this->companyRepository->getAll();
              return view('admin.company',compact('company'));
    }

    public function dashboard()
    {
        $user = \Auth::user();

        return view('admin.dashboard',compact('applications'));
    }


    public function updateInformation(Request $request)
    {
       $inputs = $request->post();
        $user = \Auth::user();

    try{
         $this->userRepository->update($user->id,$inputs);
        $response = redirect()->back()->with('success', 'Votre information a été mise en jour avec succés!');
    }catch (\Exception $e) {

        $message = $e->getMessage();
        $response = redirect()->back()->with('error', 'Echec lors de mise en jour de votre information');
    }

        return $response;
    }

    public function updateProfile(Request $request){

       $user = \Auth::user();
       $avatarImage = $request->file('avatar');

        // Build the input for validation
        $fileArray = array('image' => $avatarImage);

        // Tell the validator that this file should be an image
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png|required|max:10000' // max 10000kb
        );

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules);

        // Check to see if validation fails or passes
        if ($validator->fails())
        {
            // Redirect or return json to frontend with a helpful message to inform the user
            // that the provided file was not an adequate type
            return redirect()->back()->with('error', 'Echec lors de mise en jour du photo de profil. Fichier charger doit etre un image de type jpeg,jpg,png et taille max 5Mo');
        } else {
            $newName = time().$user->username.'.'.$avatarImage->getClientOriginalExtension();

            $destinationPath = public_path('frontend/images');
            $avatarImage->move($destinationPath, $newName);

           $this->userRepository->update($user->id,['avatar'=>$newName]);

            $response = redirect()->back()->with('success', 'Photo de profil a été mise en jour avec succés!');
        }

        return $response;
    }

    public function updateLogo(Request $request)
    {

        $user = \Auth::user();
        $logo = $request->file('logo');
        $companyId = $request->get('company');

        // Build the input for validation
        $fileArray = array('image' => $logo);

        $imgSize = filesize($logo);
        $imgSizeMb = number_format($imgSize / (1024 * 1024), 2);

        // Tell the validator that this file should be an image
        $rules = array(
            'image' => 'mimes:gif,jpeg,jpg,png|required|max:1024' // max 1024kb or 1Mb
        );
        //Customizing error messages
        $messages = [
            'image.mimes' => __('message.user.logo-photos-tap.image-type-validation'),
            'image.max' => __('message.user.logo-photos-tap.image-size-validation', ['max' => 1024, 'imageSizeKb' => $imgSize . 'Kb', 'imageSizeMb' => $imgSizeMb]),
        ];
        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
            $errorHtml = '<ul class="list-ticked">';
            foreach ($errors['image'] as $error) {
                $errorHtml .= '<li>' . $error . '</li>';
            }
            $errorHtml .= '</ul>';

            // Redirect or return json to frontend with a helpful message to inform the user
            // that the provided file was not an adequate type
            return response()->json([
                'status' => 'error',
                'message' => $errorHtml,
            ]);
        } else {

            try {
                $response =  \DB::transaction(function () use ($user, $logo,$companyId){
                    //Saving logo in logo repository
                    $logoName = time() . $user->username . '.' . $logo->getClientOriginalExtension();
                    Image::make($logo)->resize(600, 600)->save(public_path('/uploads/profile/logo/' . $logoName));

                    //Updating company logo table
                    $this->companyRepository->update($companyId,['logo'=>$logoName]);

                    return response()->json([
                        'status' => 'success',
                        'message' => __('message.user.logo-photos-tap.logo-change-success'),
                    ]);
                });

             return $response;

            } catch (\Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('message.user.logo-photos-tap.logo-change-error',['message'=>$e->getMessage()]),
                ]);
            }
        }
    }


    public function updatePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), \Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with(["error" => "Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.", 'passwordError'=>'active']);
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with(["error" => "Le nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent.", 'passwordError'=>'active']);
        }

         //@TODO check validation through front-end
        if(strcmp($request->get('new-password-confirm'), $request->get('new-password')) != 0){
            //Current password and new password are same
            return redirect()->back()->with(["error" => "Les deux nouveaux mots de passe sont différents. Veuillez réessayer.", 'passwordError'=>'active']);
        }

        //Change Password
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with(["success" => "Le mot de passe a été changé avec succès!", 'passwordError'=>'active']);
    }

    public function companyUpdate(Request $request){

        $inputs = $request->post();

        try{
            $this->companyRepository->update($inputs['id'],$inputs);

            return response()->json([
                'status' => 'success',
                'message' => __('message.company-details.update-success-info'),
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => __('message.company-details.update-error-info'),
            ]);
        }
    }

    public function homeSliders(Request $request){
        $images = $request->file('images');
        $companyId = $request->post()['company'];
        $company = $this->companyRepository->getById($companyId);
        $user = \Auth::user();

        if(!$images){
           return response()->json(['status'=>false, 'message'=>'Please select an image. Image is required!']);
        }

        try{
            $response =  \DB::transaction(function () use ($images,$company,$user){
                //Saving logo in logo repository
                $sliderImages = [];

                    foreach ($images as $image){
                        $newName = time().'-home.'.$image->getClientOriginalExtension();
                        Image::make($image)->resize(1920,950)->save(public_path('/images/home/'.$newName));
                        $sliderImages[] = $newName;
                    }

                //Preparing image data
                $inputs['user_updated_id'] = $user->id;
                $oldImages = json_decode($company->home_sliders);
                $finalSlider = array_merge($oldImages,$sliderImages);
                $inputs['home_sliders'] = json_encode($finalSlider);
                $this->companyRepository->update($company->id,$inputs);
                return response()->json(['status'=>true, 'message'=>'Images loaded successfully!']);
            });

            return $response;

        }catch (\Exception $exception){
            return response()->json(['status'=>false, 'message'=>$exception->getMessage()/*'Error occurred while loading home slider image(s)!'*/]);
        }
    }


    public function uploadImage(Request $request)
    {

        $file = $request->file()['images'];
        $user = \Auth::user();

        // Build the input for validation
        $fileArray = array('image' => $file);

        // Tell the validator that this file should be an image
        $rules = array(
            'image' => 'mimes:gif,jpeg,jpg,png|required' // max 1024kb or 1Mb
        );
        //Customizing error messages
        $messages = [
            'image.mimes' => __('message.user.logo-photos-tap.image-type-validation')
        ];
        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            /*      $errors = $validator->errors()->messages();
                  $errorHtml = '<ul class="list-ticked">';
                  foreach ($errors['image'] as $error) {
                      $errorHtml .= '<li>' . $error . '</li>';
                  }
                  $errorHtml .= '</ul>';*/

            // Redirect or return json to frontend with a helpful message to inform the user
            // that the provided file was not an adequate type
            return response()->json([
                'status' => false,
                'message' => 'Error! Ensure file is not an image '. $file->getClientOriginalExtension(). ' file given !!!'
            ]);
        }

        try {
            $response = \DB::transaction(function () use ( $file ,$user ) {
                //Saving logo in logo repository
                $fileName = time().rand(1,500). $user->username . '.' . $file->getClientOriginalExtension();
                Image::make($file)/*->resize(600, 600)*/->save(public_path('/uploads/summernoteImages/' . $fileName));

                return response()->json([
                    'success' => true,
                    'url' => asset('/uploads/summernoteImages/' . $fileName),
                ]);
            });

            return $response;

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ooops!  Your upload triggered the following error:  '.$file['error'],
                'exception' => $e->getMessage()
            ]);
        }
    }

    public function galleryImages(Request $request)
    {

        $file = $request->file()['images'];
        $user = \Auth::user();

        // Build the input for validation
        $fileArray = array('image' => $file);

        // Tell the validator that this file should be an image
        $rules = array(
            'image' => 'mimes:gif,jpeg,jpg,png|required' // max 1024kb or 1Mb
        );
        //Customizing error messages
        $messages = [
            'image.mimes' => __('message.user.logo-photos-tap.image-type-validation')
        ];
        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            /*      $errors = $validator->errors()->messages();
                  $errorHtml = '<ul class="list-ticked">';
                  foreach ($errors['image'] as $error) {
                      $errorHtml .= '<li>' . $error . '</li>';
                  }
                  $errorHtml .= '</ul>';*/

            // Redirect or return json to frontend with a helpful message to inform the user
            // that the provided file was not an adequate type
            return response()->json([
                'status' => false,
                'message' => 'Error! Ensure file is not an image '. $file->getClientOriginalExtension(). ' file given !!!'
            ]);
        }

        try {
            $response = \DB::transaction(function () use ( $file ,$user ) {
                //Saving logo in logo repository
                $fileName = time().rand(1,500). $user->username . '.' . $file->getClientOriginalExtension();
                Image::make($file)/*->resize(600, 600)*/->save(public_path('/uploads/summernoteImages/' . $fileName));

                return response()->json([
                    'success' => true,
                    'url' => asset('/uploads/summernoteImages/' . $fileName),
                ]);
            });

            return $response;

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ooops!  Your upload triggered the following error:  '.$file['error'],
                'exception' => $e->getMessage()
            ]);
        }
    }

    public function deleteFile(Request $request)
    {
        $url = $request->post()['url'];
        try {
            $response = \DB::transaction(function () use ( $url) {
                $exploreFile = explode('/',$url);
                $filename = $exploreFile[5];
                $filePath = public_path('/uploads/summernoteImaages/' . $filename);

                unlink($filePath);

                return response()->json([
                    'success' => true,
                    'message' => 'File successfully deleted!!!',
                ]);
            });

            return $response;

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Ooops!  Your deleting triggered the following error:  '.$e->getMessage()
            ]);
        }
    }
}

