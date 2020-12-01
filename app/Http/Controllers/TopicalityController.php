<?php

namespace App\Http\Controllers;

use App\Http\Resources\Topicality as ResourcesTopicality;
use App\Topicality;
use Illuminate\Http\Request;

class TopicalityController extends Controller
{
    /**
     * Sow all topicalities.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return ResourcesTopicality::collection(Topicality::orderByDesc('created_at')->get());
    }


    /**
     * Create a topicality.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (Topicality::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }


    /**
     * Show topicality by id.
     *
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */

    public function show(Topicality $topicality)
    {
        return new ResourcesTopicality($topicality);
    }


    /**
     * Update topicality by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Topicality $topicality)
    {
        if ($topicality->update($request->all())) {
            return response()->json([
                'success' => 'Actualité modifiée avec succès'
            ], 200);
        }
    }


    /**
     * Delete topicality by id.
     *
     * @param  \App\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Topicality $topicality)
    {
        $topicality->delete();
    }
}
