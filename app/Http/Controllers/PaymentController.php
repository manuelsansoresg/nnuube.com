<?php

namespace App\Http\Controllers;

use App\Models\TitleUser;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    public function success(Request $request)
    {
        $title = TitleUser::activateTitle($request);
        return view('pago.success', compact( 'title'));
    }

    public function failure(Request $request)
    {
        $token = $request->token;
        return view('pago.failure');
    }

    public function ending(Request $request)
    {
        $token = $request->token;
        return view('pago.pending');
    }
}
