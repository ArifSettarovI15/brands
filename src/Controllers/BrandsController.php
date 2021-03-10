<?php

namespace App\Modules\Brands\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Modules\Brands\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Modules\Brands\Repository\VendorRepository;

class BrandsController extends Controller
{
    public $repo;

    protected $casts = [
        'vendor_icon' => "123",
    ];
    public function __construct(Request $request)
    {
        $this->repo = new VendorRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request)
    {
        $brands = $this->repo->get_vendors($request,true,2);

        if(isset($request->page) and $request->page > $brands->lastPage())
        {
            return abort(404);
        }
        
        if ($request->ajax()){
            $content = ['html' =>view('components.table-cat-body', compact('brands'))->render(),
                        'paging'=>view('components.paging',['paginator'=>$brands])->render()
                        ];
            return $content;
        }
        return view('Brands::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Брэенды";

        return view('Brands::add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $new = $this->repo->new_vendor($request->all());

        if ($new->vendor_id){
            return response()->json(['Новый бренд успешно создан']);
        }
        else{
            return response()->json([$new]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $info = $this->repo->get_vendor($id);

        return view('Brands::add', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePostRequest $request, $id)
    {

        $vendor = $this->repo->edit_vendor($request->all(), $id);
        if ($vendor){
            return response()->json(['Бренд успешно обновлен']);
        }
        else{
            return response()->json(['Ошибка изменения бренда']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted = $this->repo->delete_vendor($id);
        return $deleted;
    }
}
