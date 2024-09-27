<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestStoreRequest;
use App\Http\Requests\GuestUpdateRequest;
use App\Models\Guest;
use App\Traits\CountryCodeTrait;
use Illuminate\Http\JsonResponse;

class GuestController extends Controller
{
    use CountryCodeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $mem_start = memory_get_usage();
        $guests = Guest::all();
        $headers = [
            'X-Debug-Time' => microtime(true) - LARAVEL_START,
            'X-Debug-Memory' => (memory_get_usage() - $mem_start) / 1024
        ];
        return response()->json($guests, 200, $headers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GuestStoreRequest $request
     * @return JsonResponse
     */
    public function store(GuestStoreRequest $request): JsonResponse
    {
        $mem_start = memory_get_usage();
        $guest = new Guest();
        $guest->name = $request->post('name');
        $guest->second_name = $request->post('second_name');
        $guest->email = $request->post('email');
        $guest->phone_number = $request->post('phone_number');
        $guest->country = $request->post('country') ?? $this->getCountryName($request->post('phone_number'));
        $guest->save();
        $headers = [
            'X-Debug-Time' => microtime(true) - LARAVEL_START,
            'X-Debug-Memory' => (memory_get_usage() - $mem_start) / 1024
        ];
        return response()->json($guest, 200, $headers);
    }

    /**
     * Display the specified resource.
     *
     * @param Guest $guest
     * @return JsonResponse
     */
    public function show(Guest $guest): JsonResponse
    {
        $mem_start = memory_get_usage();
        $headers = [
            'X-Debug-Time' => microtime(true) - LARAVEL_START,
            'X-Debug-Memory' => (memory_get_usage() - $mem_start) / 1024
        ];
        return response()->json($guest, '200', $headers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GuestUpdateRequest $request
     * @param Guest $guest
     * @return JsonResponse
     */
    public function update(GuestUpdateRequest $request, Guest $guest): JsonResponse
    {
        $mem_start = memory_get_usage();
        $guest->update($request->all());
        $guest->save();
        $headers = [
            'X-Debug-Time' => microtime(true) - LARAVEL_START,
            'X-Debug-Memory' => (memory_get_usage() - $mem_start) / 1024
        ];
        return response()->json($guest, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Guest $guest
     * @return JsonResponse
     */
    public function destroy(Guest $guest): JsonResponse
    {
        $mem_start = memory_get_usage();
        $guest->delete();
        $headers = [
            'X-Debug-Time' => microtime(true) - LARAVEL_START,
            'X-Debug-Memory' => (memory_get_usage() - $mem_start) / 1024
        ];
        return response()->json(null, 204, $headers);
    }
}
