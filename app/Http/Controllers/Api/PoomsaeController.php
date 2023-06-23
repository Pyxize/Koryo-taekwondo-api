<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PoomseResource;
use App\Models\Poomse;
use Illuminate\Http\Request;

class PoomsaeController extends Controller
{
    public function index()
    {
        return PoomseResource::collection(Poomse::limit(5)->get());
    }
}
