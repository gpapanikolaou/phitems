<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');

use App\Exceptions\NotAbleToGetDataException;
use App\Models\Factories\PornstarFactory;
use App\Utils\Paginate;
use App\Utils\PornstarsDataService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __construct(private PornstarsDataService $pornstarsDataService)
    {
    }

    public function index(Request $request)
    {
        try {
            $pornstarsData = $this->pornstarsDataService->getPornstars();
        } catch (NotAbleToGetDataException $exception) {
            return view('show', ['paginatedItems' => [], 'error' => $exception->getMessage()]);
        }

        $pornstars = array_map(fn($item) => PornstarFactory::fromResponse($item), $pornstarsData['items']);

        if ($request->has('search') && !is_null($request->get('search'))) {
            $searchTerm = $request->get('search', '');
            $pornstars = array_filter($pornstars, fn($pornstar) => str_contains($pornstar->name, $searchTerm));
        }

        $pornstarsPaginated = Paginate::paginate($pornstars, 10);

        return view('index', ['paginatedItems' => $pornstarsPaginated]);
    }
}
