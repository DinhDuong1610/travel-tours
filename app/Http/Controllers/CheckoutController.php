<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\CreateCheckoutRequest;
use App\Models\Checkout;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        $checkouts = Checkout::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.checkout.index', compact('checkouts'));
    }
    public function store(CreateCheckoutRequest $request) {
        $checkout = new Checkout();
        $checkout->user_id = $request->user_id;
        $checkout->destination_id = $request->destination_id;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->phone = $request->phone;
        $checkout->number_of_passengers = $request->number_of_passengers;
        $checkout->departure_date = $request->departure_date;
        $checkout->notes = $request->notes;
        $checkout->save();

        return redirect()->route('pages.welcome');
    }

    public function updateStatus(Request $request, $id) {
        $checkout = Checkout::find($id);
        $checkout->status = $request->status;
        $checkout->save();

        return redirect()->route('admin.checkout.index');
    }
}
