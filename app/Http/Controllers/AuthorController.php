<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // READ ALL AUTHORS
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data'    => $authors
        ], 200);
    }

    // CREATE AUTHOR
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $author = Author::create([
            'name' => $request->name,
            'bio'  => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data'    => $author
        ], 201);
    }
}