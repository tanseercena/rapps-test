<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SkeletonApi
{
    public static $base_url = 'https://symfony-skeleton.q-tests.com/';

    public static function getToken($email, $password) {
        $response = Http::withBody(json_encode([
                'email' => $email,
                'password' => $password
            ]), 'application/json')
            ->post(self::$base_url . 'api/v2/token');

        if($response->status() == 200) {
            return $response->json();
        }

        return false;
    }

    public static function getAuthors() {
        $response = Http::withToken(auth()->user()->password)
            ->accept('application/json')
            ->get(self::$base_url. "api/v2/authors", [
               'orderBy' => 'id',
                'direction' => 'ASC',
                'limit' => 50,
                'page' => 1
            ]);

        if($response->status() == 200) {
            return $response->json();
        }

        return [];
    }

    public static function getSingleAuthor($id) {
        $response = Http::withToken(auth()->user()->password)
            ->accept('application/json')
            ->get(self::$base_url. "api/v2/authors/".$id);

        if($response->status() == 200) {
            return $response->json();
        }

        return [];
    }

    public static function deleteAuthor($id) {
        $response = Http::withToken(auth()->user()->password)
            ->accept('application/json')
            ->delete(self::$base_url. "api/v2/authors/".$id);

        if($response->status() == 204) {
            return true;
        }

        return false;
    }

    public static function deleteBook($id) {
        $response = Http::withToken(auth()->user()->password)
            ->accept('application/json')
            ->delete(self::$base_url. "api/v2/books/".$id);

        if($response->status() == 204) {
            return true;
        }

        return false;
    }

    public static function createBook($request) {
        $response = Http::withToken(auth()->user()->password)
        ->withBody(json_encode([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'number_of_pages' => (int)$request->number_of_pages,
            'author' => [
                'id' => $request->author
            ]
        ]), 'application/json')
            ->post(self::$base_url . 'api/v2/books');

        if($response->status() == 200) {
            return $response->json();
        }

        dd($response->body());

        return false;
    }
}
