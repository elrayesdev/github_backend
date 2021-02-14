<?php

namespace App\Http\Controllers;


use App\Classes\Filtering;
use App\Classes\Query;
use App\Classes\SearchURLBuilder;
use App\Classes\Sorting;
use App\Services\GitHubService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class GitHubController extends Controller
{
    use ApiResponser;

    public $githubService;

    public function __construct(
        GitHubService $githubService
    )
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request){
        $validated = $this->searchValidation($request);
        $uri = $this->uriBuilder($request);
        $search = $this->githubService->searchRepositories($uri);
        return $this->successResponse($search);
    }

    public function searchValidation(Request $request){
        return $this->validate($request, [
            'created' => 'required|date|before:today',
            'language' => 'in:rails,javascript,css,html,shell,dockerfile,python,typescript,php',
//            'sort' => 'required',
//            'order' => 'required',
            'per_page' => 'in:10,50,100',
        ]);
    }
    public function uriBuilder($request){
        $query = new Query($request->created, $request->language);
        $sort = new Sorting($request->sort, $request->order);
        $filter = new Filtering($request->per_page,$request->page);

        $search = new SearchURLBuilder($query, $sort, $filter);
        return $search->toURL();
    }

/*
    public function uriBuilder($request){
        $uri = "?q=";

        $date = "1999-01-01";
        if (isset($request['created'])){
            $date = $request['created'];
        }
        $uri .= "date:>".$date;

        $language = null;
        if (isset($request['language'])){
            $language = $request['language'];
        }
        if ($language){
            $uri .= "+language:".$language;
        }


        $sort = 'stars';
        if (isset($request['sort'])){
            $sort = $request['sort'];
        }
        $uri .= "&sort=".$sort;

        $order = 'desc';
        if (isset($request['order'])){
            $order = $request['order'];
        }
        $uri .= "&order=".$order;


        $per_page = 10;
        if (isset($request['per_page'])){
            $per_page = $request['per_page'];
        }
        $uri .= "&per_page=".$per_page;

        return $uri;
    }
*/
    //
}
