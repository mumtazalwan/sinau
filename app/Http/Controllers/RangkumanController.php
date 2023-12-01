<?php

namespace App\Http\Controllers;

use App\Http\Requests\RangkumanRequest;
use App\Http\Resources\DetailRangkumanCollection;
use App\Http\Resources\RangkumanListCollection;
use App\Models\Kelas;
use App\Models\Rangkuman;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Throwable;

class RangkumanController extends Controller
{

    public function get_class(): JsonResponse
    {
        $data = Kelas::all();

        return response()->json([
            'message' => 'List kelas yang tersedia',
            'data' => $data
        ]);
    }

    public function get_subject(): JsonResponse
    {
        $data = Kelas::with('getMapel')->whereHas('getMapel')->get();

        return response()->json([
            'message' => 'List mapel yang tersedia',
            'data' => $data
        ]);
    }

    public function get_summary($mapel_id): JsonResponse
    {
        $data = Rangkuman::where('mapel_id', $mapel_id)
            ->with('getAuthor', 'getClass', 'getSubject')
            ->paginate(10);

        return response()->json([
            'message' => 'List data rangkuman',
            'data' => RangkumanListCollection::collection($data)->response()->getData(true)
        ], 200);
    }

    public function detail(Rangkuman $rangkuman): DetailRangkumanCollection
    {
        return new DetailRangkumanCollection($rangkuman->append('getAuthor'));
    }

    public function upload_summary(RangkumanRequest $rangkumanRequest): JsonResponse
    {
        try {
            $data = $rangkumanRequest->validated();
            $data['rangkuman_pdf'] = $rangkumanRequest->file('rangkuman_pdf')->store();

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
