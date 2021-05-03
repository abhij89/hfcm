<?php

namespace Abhij89\Hfcm\Controllers;

use Illuminate\Http\Request;
use Abhij89\Hfcm\Models\HfcmSnippet;
use Illuminate\Routing\Controller;

class HfcmController extends Controller
{
    public function index(Request $request)
    {
        $snippet = HfcmSnippet::first();
        return response()->json([
            'snippet' => $snippet
        ]);
    }

    public function store(Request $request)
    {
        $snippet = HfcmSnippet::firstorCreate();
        $snippet->header = $request->header;
        $snippet->footer = $request->footer;
        $snippet->body = $request->body;
        $snippet->save();

        return $snippet;
    }
}
