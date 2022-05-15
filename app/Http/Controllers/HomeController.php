<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function contactSend(Request $request)
    {
        $result = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:5|max:100',
            'message' => 'required|min:5'
        ]);
        if ($result) {
            Message::create([
                'email' => strtolower($request->email),
                'subject' => $request->subject,
                'message' => $request->message
            ]);
        }

        return redirect(route('app_contact'))->with('success', "Votre message a été envoyer avec succés");
    }
}
