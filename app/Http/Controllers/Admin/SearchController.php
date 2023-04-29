<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $model = '\App\Models\\' . $request->name;
        return $model::search($request->keywords)->paginate($request->perPage);
    }
}
