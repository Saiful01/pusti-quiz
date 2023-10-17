<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Jorenvh\Share\Share;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $title="পুষ্টি হোম শেফ";
        $description="পুষ্টি হোম শেফ";
        $pageUrl="https://masterclass.pustihomechef.com/";
        $image="/img/Artboard 8.png";

        return view('frontend.index', compact('title','description','pageUrl','image'));

    }
    public function certificate()
    {
        $applicantIds = request()->session()->get('applicant_id');
        if (!$applicantIds){
            return redirect()->route('home');
        }
        $firstApplicantId = $applicantIds[0];

       $applicant= Applicant::find($firstApplicantId);
       $shareComponent = \Share::page(
            'https://masterclass.pustihomechef.com/certificate',
            "পুষ্টি হোম শেফ",
        )->facebook();



        $title="পুষ্টি হোম শেফ";
        $description="পুষ্টি হোম শেফ";
        $pageUrl="https://masterclass.pustihomechef.com/certificate";
         $image= "https://masterclass.pustihomechef.com/".$applicant->file;

        View::share('ogImage', $image);
        View::share('ogTitle', $title);
        View::share('ogDescription', $description);
        View::share('ogUrl', $pageUrl);

        Session::forget('applicant_id');

        return view('frontend.certificate',compact('applicant','shareComponent','title','description','pageUrl','image'));

    }
    public function quizSave(Request $request)
    {
        //return $request->all();


        try {

            // Load the certificate template image
            $template = Image::make(public_path('certificate.png'));

            // Add the applicant's name to the certificate
            $template->text($request['name'], 450, 400, function ($font) {
                $font->file(public_path('/font/HindSiliguri-Bold.ttf'));
                $font->size(50);
                $font->color('#fffff');
            });


            // Save the certificate image with a dynamic name
            $imageName = $request['name'] . '_certificate.jpg';
            $template->save(public_path('certificates/' . $imageName));
            $request['file']= 'certificates/' . $imageName;

            $applicant = Applicant::create($request->all());

            Session::push('applicant_id', $applicant->id);

            return [
                'code' => 200,
                'message' => "অভিনন্দন! আপনি সফলভাবে উত্তর দিয়েছেন, অনুগ্রহ করে আপনার সার্টিফিকেট ডাউনলোড করুন এবং সোশ্যাল মিডিয়াতে শেয়ার করুন",
                'data' => $applicant,
            ];
        } catch (\Exception $e) {
            return [
                'code' => 400,
                'message' => $e->getMessage(),
            ];
        }

    }
}


