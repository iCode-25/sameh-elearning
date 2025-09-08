<?php

namespace App\Http\Controllers\Front;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Booking\ApplyFormRequest;
use App\Http\Requests\Front\Flight\FlightMultiSearchRequest;
use App\Http\Requests\Front\Flight\FlightSearchRequest;
// use App\Http\Requests\Front\ProgrammeBooking\;
use App\Models\About;
use App\Models\AirMaster;
use App\Models\Airport;
use App\Models\Blog;
use App\Models\Card;
use App\Models\Level;
use App\Models\Categorygallery;
use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\HotelCity;
use App\Models\Informationflight;
use App\Models\Informationhotel;
use App\Models\Informationtour;
use App\Models\Message;
use App\Models\News;
use App\Models\OrderCard;
use App\Models\Privacypolicy;
use App\Models\Programme;
use App\Models\ProgrammeBooking;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Termsandcondition;
use App\Models\Testimonial;
use App\Models\TourType;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class CardController extends Controller
{

    public function index()
    {
        $about = About::first();

         return view('front.index', get_defined_vars());
    }


    public function regular_card()
    {
        $regular_cards = Card::where('category_card', 'regular')->get();
        return view('front.pages.regular_card', get_defined_vars());
    }


    public function royal_card()
    {
        $royal_cards = Card::where('category_card', 'royal')->get();
        return view('front.pages.royal_card', get_defined_vars());
    }


    public function imperial_card()
    {
        $imperial_cards = Card::where('category_card', 'imperial')->get();
        return view('front.pages.imperial_card', get_defined_vars());
    }


    public function show_card($id)
    {
        $show_card = Card::find($id);
        return view('front.pages.details_card', compact('show_card'));
    }


     public function order_card($id)
    {
        $order_card = Card::find($id);
        return view('front.pages.order_card', compact('order_card'));
    }




    public function store(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\d{11}$/|max:15',
            'email' => 'required|email|max:255',
            'number_card' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:1',
        ], [
            'first_name.required' => TranslationHelper::translate('First name is required.'),
            'first_name.string' => TranslationHelper::translate('First name must be a string.'),
            'first_name.max' => TranslationHelper::translate('First name must not exceed 255 characters.'),

            'last_name.required' => TranslationHelper::translate('Last name is required.'),
            'last_name.string' => TranslationHelper::translate('Last name must be a string.'),
            'last_name.max' => TranslationHelper::translate('Last name must not exceed 255 characters.'),

            'phone.required' => TranslationHelper::translate('Phone number is required.'),
            'phone.regex' => TranslationHelper::translate('Phone number must be exactly 11 digits.'),
            'phone.max' => TranslationHelper::translate('Phone number must not exceed 15 digits.'),

            'email.required' => TranslationHelper::translate('Email is required.'),
            'email.email' => TranslationHelper::translate('Please enter a valid email address.'),
            'email.max' => TranslationHelper::translate('Email must not exceed 255 characters.'),

            'number_card.required' => TranslationHelper::translate('Number of cards is required.'),
            'number_card.integer' => TranslationHelper::translate('Number of cards must be an integer.'),
            'number_card.min' => TranslationHelper::translate('Number of cards must be at least 1.'),

            'total_price.required' => TranslationHelper::translate('Total price is required.'),
            'total_price.numeric' => TranslationHelper::translate('Total price must be a number.'),
            'total_price.min' => TranslationHelper::translate('Total price must be at least 1.'),
        ]);

        $card = Card::findOrFail($id);

        $order = OrderCard::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'number_card' => $request->number_card,
            'total_price' => $request->total_price,
            'card_id' => $card->id,
        ]);

        return redirect()->route('order-receipt', ['id' => $order->id]);
    }


    public function orderReceipt($id)
    {
        $order = OrderCard::with('cards')->findOrFail($id);
        return view('front.pages.order_receipt', compact('order'));
    }


}
