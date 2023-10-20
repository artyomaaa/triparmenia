<?php

namespace App\Http\Controllers;

use App\Http\Services\StatusCode;
use App\Service;
use App\ServiceImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class SiteController extends Controller
{
//    home blade page
    public function index()
    {

//        if (Auth::check()) {
//            return redirect('/my-account');
//        }
        return view('site.welcome');
    }

    public function partners()
    {

        return view('site.partners');
    }


    public function service()
    {
        return view('service.service_form');
    }

    public function services_add(Request $request)
    {
        $rules = [
            'phone' => 'required',
            'adress' => 'required',
            'language' => 'required',
            'date' => 'required',
//          'car_model' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(),
                StatusCode::HTTP_UNPROCESSABLE_ENTITY,
                'Validation Error');
        }
        $input = $request->except('_token');
        $service = new Service();
        $service->fill($input);
        $service->save();
        return $this->_response_body(true);


    }

    public function services_images(Request $request)
    {
        foreach ($request->service_image as $file) {
            $name = time() . '_' . $file->getclientOriginalname();

            $file->move(public_path('/assets/images/service'), $name);


            $serviceimage = new ServiceImage();

            $serviceimage->service_image = $name;

            $serviceimage->service_id = $request->service_id;
            $serviceimage->save();
        }

        return $this->_response_body(true);

    }

    public function delete($id)
    {
        $service = ServiceImage::find($id);
//       dd($service);
        $path = public_path() . '/assets/images/service/' . $service->service_image;
        File::delete($path);
        $service->delete();
        return redirect('/my-account');
    }

    public function change()
    {
        return view('service.service_change');
    }

    public function change_service(Request $request, $id)

    {

        $rules = [
            'phone' => 'required',
            'adress' => 'required',
            'language' => 'required',
            'date' => 'required',
//            'car_model' => 'required',
//
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(),
                StatusCode::HTTP_UNPROCESSABLE_ENTITY,
                'Validation Error');
        }

        $input = $request->except('_token');

        $service = Service::find($id);

        $service->fill($input);

        $service->update();

        return redirect('/my-account');


    }

    public function destroy($id)
    {

        $service = Service::find($id);
//        dd( $service->user_id);
        $user = User::where('id', '=', $service->user_id);
        $user->delete();
        $services = ServiceImage::where('service_id', '=', $service->id)->get();
        foreach ($services as $query) {
            $path = public_path() . '/assets/images/service/' . $query->service_image;
            File::delete($path);
            $query->delete();
        }
        $service->delete();
        return redirect('/');
    }

    public function driver_page()
    {
        $users = User::where('role_id', '=', 2)->paginate(15);

        return view('driver_turist.driver', compact('users'));
    }

    public function about_driver($id)
    {
        $users = User::find($id);
        if (isset($users->services->id)) {
            $services = ServiceImage::where('service_id', '=', $users->services->id)->get();
            //       dd($services);
            //       dd($users);
        } else {
            return view('site.abort');

        }
        return view('driver_turist.driver_about', compact('users', 'services'));
    }

    public function abort()
    {
        return view('site.abort');
    }


}
