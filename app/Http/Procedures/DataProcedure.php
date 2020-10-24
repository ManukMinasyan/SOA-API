<?php

namespace App\Http\Procedures;

use Illuminate\Http\Request;
use Sajya\Server\Procedure;
use App\Http\Resources\DataResource;
use App\Http\Requests\DataFindRequest;
use App\Http\Requests\DataStoreRequest;
use App\Models\Data;

class DataProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'Data';

    /**
     * Execute the procedure.
     *
     * @param Request $request
     *
     * @return array|string|integer
     */
    public function handle(Request $request)
    {
        return 1;
    }

    /**
     * Find Data By Uuid
     *
     * @param  Request  $request
     * @return string
     */
    public function find(DataFindRequest $request)
    {
        return new DataResource(Data::where('page_uuid', $request->page_uuid)->first());
    }

    /**
     * Store data.
     *
     * @param  Request  $request
     * @return string
     */
    public function store(DataStoreRequest $request)
    {
        $validated = $request->validated();

        if(!$data = Data::wherePageUuid($validated['page_uuid'])->first()){
            $data = new Data($validated);
            $data->save();
        }

        return new DataResource($data);
    }
}
