<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\Card;
use App\Models\City;
use App\Models\News;
use App\Models\Test;
use App\Models\User;
use App\Models\About;
use App\Models\Level;
use App\Models\Story;
use App\Models\Videos;
use GuzzleHttp\Client;
use App\Models\Airport;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Packages;
use App\Models\TourType;
use App\Models\AirMaster;
use App\Models\HotelCity;
use App\Models\Programme;
use App\Models\Workshops;
use App\Models\Testimonial;
use App\Models\Voucherspage;
use Illuminate\Http\Request;
use App\Models\Privacypolicy;
use App\Models\Categorygallery;
use App\Models\Informationtour;
use App\Models\EventsManagement;
use App\Models\Informationhotel;
use App\Models\ProgrammeBooking;
use App\Models\ContentManagement;
use App\Models\Informationflight;
use App\Models\Termsandcondition;
use App\Helpers\TranslationHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RegistrationWorkshops;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Front\Booking\ApplyFormRequest;
use App\Http\Requests\Front\Flight\FlightSearchRequest;
use App\Http\Requests\Front\Flight\FlightMultiSearchRequest;
use App\Http\Requests\Front\ProgrammeBooking\ProgrammeBookingCheckoutRequest;


class WebController extends Controller
{

    public function index()
    {
        $levels = Level::get();
        $packages = auth('web')->user()?->id == null ? Packages::active()->whereHas('lessons')->latest()->limit(6)->get() : Packages::active()->where('level_id', auth('web')->user()->level_id)->whereHas('lessons')->latest()->limit(6)->get();
        $lessons = auth('web')->user()?->id == null ? Videos::active()->latest()->limit(6)->get() : Videos::active()->where('level_id', auth('web')->user()->level_id)->latest()->limit(6)->get();
        $tests_lessons = Videos::active()->where('price', 0)->latest()->get();
        $blogs = Blog::latest()->limit(6)->get();
        $users = User::where('is_active', 1)->where('is_banned', 0)->where('is_admin', 0)->get();
        return view('front.index', get_defined_vars());
    }

    public function gallery($id)
    {
        $category = Categorygallery::find($id);

        $galleries = Gallery::where('categorygallery_id', $id)->get();
        return view('front.pages.gallery', compact('category', 'galleries'));
    }

    public function all_about_us()
    {
        $about_us = Testimonial::all();
        $cities = City::with('country')->latest()->take(8)->get();
        return view('front.pages.about_us', get_defined_vars());
    }

    public function about()
    {
        $blogs = Blog::latest()->take(3)->get();
        return view('front.pages.about', get_defined_vars());
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::latest()->paginate(3);
        if ($request->ajax()) {
            return view('front.pages.blogs_data', compact('blogs'))->render();
        }
        return view('front.pages.blogs', get_defined_vars());
    }


    public function blog_details($blog)
    {
        $blog = Blog::find($blog);
        $blogs = Blog::latest()->take(3)->get();
        return view('front.pages.blog-details', get_defined_vars());
    }

    public function educational_content()
    {
        return view('front.pages.educational_content', get_defined_vars());
    }



    public function sorting_game()
    {
        return view('front.pages.sorting_game', get_defined_vars());
    }



    public function news_video()
    {
        $news = Videos::active()->select('id', 'title', 'video_url', 'thumbnail')
            ->latest()
            ->paginate(12);
        return view('front.pages.news_video', compact('news'));
    }

    public function photo_gallery()
    {
        $photoGallery = Cache::remember('photo_gallery_categories', 3600, function () {
            return Categorygallery::select('id', 'name', 'image')->get();
        });

        return view('front.pages.photo_gallery', compact('photoGallery'));
    }

    public function adminPaymentControl()
    {
        return view('front.pages.admin-control');
    }
    public function setPaid()
    {
        DB::table('settings_money')->where('id', 1)->update(['is_paid' => true]);
        return back()->with('success', 'تم تفعيل المنصة');
    }
    public function setUnpaid()
    {
        DB::table('settings_money')->where('id', 1)->update(['is_paid' => false]);
        return back()->with('error', 'تم إيقاف المنصة');
    }


    public function stories()
    {
        $stories = Story::select('id', 'title', 'content', 'image')
            ->latest()
            ->paginate(10);
        return view('front.pages.stories', compact('stories'));
    }

    public function contentManagement()
    {
        $contentManagements = Cache::remember('content_managements', 1800, function () {
            return ContentManagement::select('id', 'title', 'description')->get();
        });

        return view('front.pages.contentManagement', compact('contentManagements'));
    }

    public function events()
    {
        $events = EventsManagement::select('id', 'title', 'date', 'location', 'image')
            ->latest()
            ->paginate(6);

        return view('front.pages.events', compact('events'));
    }

    public function video()
    {
        $videos = Videos::active()->select('id', 'title', 'video_url', 'thumbnail')
            ->latest()
            ->paginate(12);

        return view('front.pages.video', compact('videos'));
    }

    public function Workshops()
    {
        $categories = Cache::remember('workshops_categories', 3600, function () {
            return Level::select('id', 'name')->get();
        });

        return view('front.pages.Workshops', compact('categories'));
    }

    public function competition()
    {
        $tests = Test::select('id', 'title', 'questions_count')
            ->latest()
            ->paginate(10);

        return view('front.pages.competition', compact('tests'));
    }

    //




    public function details_stories($id)
    {
        $details_stories = Story::find($id);
        return view('front.pages.details_stories', compact('details_stories'));
    }




    public function details_contentManagement($id)
    {
        $details_contentManagement = ContentManagement::find($id);
        return view('front.pages.details_contentManagement', compact('details_contentManagement'));
    }



    public function details_events($id)
    {
        $details_event = EventsManagement::find($id);
        return view('front.pages.details_events', compact('details_event'));
    }




    public function workshopsByCategory($id)
    {
        $category = Level::with([
            'workshops' => function ($query) {
                $query->where('is_active', 1)->orderBy('created_at', 'desc');
            }
        ])->findOrFail($id);
        return view('front.pages.workshops_by_category', compact('category'));
    }


    public function details_workshops($id)
    {
        $details_workshops = Workshops::find($id);
        return view('front.pages.details_Workshops', compact('details_workshops'));
    }




    public function details_competition($id)
    {
        $details_competition = Test::with('quizzes')->findOrFail($id);
        return view('front.pages.details_competition', compact('details_competition'));
    }

    public function details_competition_home($id)
    {
        $details_competition = Test::with('quizzes')->findOrFail($id);
        return view('front.pages.details_competition_home', compact('details_competition'));
    }



    public function sustainability()
    {
        return view('front.pages.sustainability', get_defined_vars());
    }




    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
            'workshops_id' => 'required|exists:workshops,id',
        ], [
            'name.required' => \App\Helpers\TranslationHelper::translate('Please enter your full name.'),
            'phone.required' => \App\Helpers\TranslationHelper::translate('Please enter your phone number.'),
            'email.required' => \App\Helpers\TranslationHelper::translate('Please enter your email address.'),
            'email.email' => \App\Helpers\TranslationHelper::translate('Please enter a valid email address.'),
            'age.required' => \App\Helpers\TranslationHelper::translate('Please enter your age.'),
            'age.integer' => \App\Helpers\TranslationHelper::translate('Age must be a number.'),
            'workshops_id.required' => \App\Helpers\TranslationHelper::translate('Error in selecting the workshop, please try again.'),
        ]);
        RegistrationWorkshops::create($request->all());
        return redirect()->back()->with('success', \App\Helpers\TranslationHelper::translate('Registration successful!'));
    }






    public function termsandcondition()
    {
        $termsandcondition = Termsandcondition::first();
        return view('front.pages.termsandcondition', get_defined_vars());
    }

    public function privacypolicy()
    {
        $privacypolicy = Privacypolicy::first();
        return view('front.pages.privacypolicy', get_defined_vars());
    }

    public function message_contact()
    {
        $contact = Contact::first();
        return view('front.pages.message', get_defined_vars());
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|regex:/^\d{11}$/|max:11',
                'message' => 'required|string',
            ], [
                'name.required' => TranslationHelper::translate('The name field is required.'),
                'name.string' => TranslationHelper::translate('The name must be a string.'),
                'name.max' => TranslationHelper::translate('The name must not be greater than 255 characters.'),
                'phone.required' => TranslationHelper::translate('The phone field is required.'),
                'phone.regex' => TranslationHelper::translate('The phone must be a valid phone number.'),
                'phone.max' => TranslationHelper::translate('The phone must not be greater than 11 characters.'),
                'message.required' => TranslationHelper::translate('The message field is required.'),
                'message.string' => TranslationHelper::translate('The message must be a string.'),
            ]);

            Message::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => TranslationHelper::translate('Your Message has been sent'),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(), // يرجّع الأخطاء بصيغة مصفوفة
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => TranslationHelper::translate('An error occurred while sending your message. Please try again later.'),
            ], 500);
        }
    }

    public function contact_us()
    {
        $about = About::first();
        $contact = Contact::first();
        return view('front.pages.contact', get_defined_vars());
    }



    public function searchCategory(Request $request)
    {
        $categories = Level::where('name', 'LIKE', '%' . $request->input('search') . '%')->get();
        if ($categories->isEmpty()) {
            return redirect()->back()->with('error', 'No category found');
        }
        return view('front.pages.blog.sher_blogs_category', compact('categories'));
    }
}
