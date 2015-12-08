<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\PriorityRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\BugRepository;

class BugController extends Controller
{
    private $bugRepository;

    public function __construct(BugRepository $bugRepository)
    {
        $this->bugRepository = $bugRepository;
    }

    public function index(Request $request)
    {
        return view(
            'bugs.index',
            [
                'bugs' => $this->bugRepository->fetchAll()
            ]
        );
    }

    public function add(Request $request)
    {
        $priorityRepository = new PriorityRepository();
        $productCategoryRepository = new ProductCategoryRepository();
        $productRepository = new ProductRepository();

        return view(
            'bugs.add',
            [
                'priorities' => $priorityRepository->fetchAll(),
                'productCategories' => $productCategoryRepository->fetchAllActive(),
                'products' => $productRepository->fetchAllActive(),
            ]
        );
    }

    public function save(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'priority' => 'required|exists:priorities,id',
                'product_category' => 'required|exists:product_categories,id',
                'product' => 'required|exists:products,id',
            ]
        );

        $request->user()->reports()->create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'priority_id' => $request->priority,
                'product_id' => $request->product
            ]
        );

        return redirect('/bugs');
    }
}
