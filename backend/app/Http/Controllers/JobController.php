<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Get corrected query and results.
     *
     * @param Request $request
     *
     * @return View
     */
    public function getQueryResults(Request $request)
    {
        $oldQuery = file_get_contents(storage_path('sql/old_query.sql'));
        $newQuery = file_get_contents(storage_path('sql/new_query.sql'));
        $newQueryResults = DB::connection('mysql_second')->select($newQuery);
        
        return view('job.query-results', [
            'data' => [
                'old_query' => $oldQuery, 
                'new_query' => $newQuery, 
                'new_query_results' => $newQueryResults
            ]
        ]);
    }
}
