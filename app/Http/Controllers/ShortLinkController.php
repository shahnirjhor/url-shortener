<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $links = $this->filter($request)->paginate(10)->withQueryString();
        return view('short-link.index', compact('links'));
    }

    private function filter(Request $request)
    {
        $query = ShortLink::orderBy('id', 'DESC');

        if ($request->id)
            $query->where('id', $request->id);

        if ($request->title)
            $query->where('title', 'like', '%' . $request->title . '%');

        return $query;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url|unique:short_links,link,' . auth()->user()->id,
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        $input['title'] = auth()->user()->name;

        ShortLink::create($input);

        return redirect()->route('short-link.index')->with('success', trans('Shorten Link Generated Successfully!'));
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        $input = array();
        $input['hits'] = $find->hits + 1;
        $find->update($input);

        return redirect($find->link);
    }
}
