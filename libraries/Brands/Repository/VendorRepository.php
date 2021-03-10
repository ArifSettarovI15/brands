<?php


namespace App\Modules\Brands\Repository;


use App\Modules\Brands\Models\ShopVendors;

class VendorRepository
{
    public function new_vendor($request)
    {
        $vendor = ShopVendors::create($request);

        return $vendor;
    }

    public function edit_vendor($request, $vendor_id)
    {
        $vendor = ShopVendors::find($vendor_id);
        $vendor->fill($request)->save();

        return $vendor;
    }

    public function get_vendors($request, bool $paginate = false, int $per_page = 0)
    {
        $vendors = ShopVendors::query();

        isset($request->vendor_status) ? $vendors->orderBy('vendor_id', 'DESC')
                                         : $vendors->orderBy('vendor_id','ASC');

        isset($request->vendor_name) ? $vendors->where('vendor_name', 'LIKE', $request->vendor_name.'%'):null;
        isset($request->vendor_status) ? $vendors->where('vendor_name','=', $request->vendor_status):null;


        if ($paginate) {
            if (!$per_page) {
                return ['Укажите количество объектов на странице'];
            }
            $result = $vendors->paginate($per_page);
        } else {
            $result = $vendors->get();
        }

        return $result;
    }

    public function get_vendor($id)
    {
        $vendor = ShopVendors::where('vendor_id', $id)->firstOrFail();

        return $vendor;
    }

    public function delete_vendor($id)
    {
        $vendor = ShopVendors::where('vendor_id', $id)->first();

        if (!$vendor) {
            return response()->json(['Нет бренда с таким идентификатором']);
        } else {
            return $vendor->delete();
        }
    }
}
