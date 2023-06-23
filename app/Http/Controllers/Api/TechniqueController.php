<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechniqueResource;
use App\Models\Technique;
use Illuminate\Http\Request;

class TechniqueController extends Controller
{
    public function index()
    {
        return TechniqueResource::collection(Technique::limit(5)->get());
    }
}
