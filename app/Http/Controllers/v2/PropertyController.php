<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idx2 = Http::withToken(env('BRIDGE_API_ACCES_TOKEN'))

            ->get('https://api.bridgedataoutput.com/api/v2/OData/miamire/Property');

        return $idx2->json();
    }



    public function list(string $page)
    {
        $idx2 = Http::withToken(env('BRIDGE_API_ACCES_TOKEN'))
            ->get('https://api.bridgedataoutput.com/api/v2/miamire/listings', [
                'limit' => 10,
                'offset' => $page,
                'sortBy' => 'BridgeModificationTimestamp'
            ]);

        return $idx2->json();
    }

    public function show(string $id)
    {
        $idx2 = Http::withToken('06b6bf826c2e3d64ac35c2f96965dbed')
            ->get(
                sprintf('https://api.bridgedataoutput.com/api/v2/OData/miamire/Property(\'%s\')', $id)
            );

        return $idx2->json();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
