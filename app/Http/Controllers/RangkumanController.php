<?php

namespace App\Http\Controllers;

use App\Http\Requests\RangkumanRequest;
use App\Http\Resources\RangkumanCollection;
use App\Models\Kelas;
use App\Models\Rangkuman;
use Throwable;
use function App\Http\Resources\RangkumanCollection;

class RangkumanController extends Controller
{

    public function getKelas()
    {
        $data = Kelas::all();

        return response()->json([
            'message' => 'List kelas yang tersedia',
            'data' => $data
        ]);
    }

    public function getMapel()
    {
        $data = Kelas::with('getMapel')->whereHas('getMapel')->get();

        return response()->json([
            'message' => 'List mapel yang tersedia',
            'data' => $data
        ]);
    }

    public function getRangkuman($mapel_id)
    {
        $data = Rangkuman::where('mapel_id', $mapel_id)
            ->with('getAuthor', 'getClass', 'getSubject')
            ->paginate(10);

        return response()->json([
            'message' => 'List data rangkuman',
            'data' => RangkumanCollection::collection($data)->response()->getData(true)
        ], 200);
    }

    public function createRangkuman(RangkumanRequest $rangkumanRequest)
    {
        try {
            $data = $rangkumanRequest->validated();
            Rangkuman::create($data);

            return response()->json(
                [
                    'data' => $data
                ], 200
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'error' => 'failed to create data, please try again'
                ]
            );
        }
    }
}
