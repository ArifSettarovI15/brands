<?php


namespace App\Modules\Brands\Models;


use App\Models\BaseModel;

use App\Modules\Files\Repositories\FilesRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int|null $per_page)
 * @method static where()
 * @method static create($request)
 * @method static find($id)

 */
class ShopVendors extends BaseModel
{
    protected $table = 'shop_vendors';
    protected $primaryKey = "vendor_id";


    public $timestamps = false;
    protected $fillable = [
        'vendor_pop',
        'vendor_new',
        'vendor_status',
        'vendor_name',
        'vendor_url',
        'vendor_icon',
        'vendor_bg',
        'vendor_letter',
    ];


    public function getQueueableId()
    {
        return $this->vendor_id;
    }

    public function getVendorIconAttribute($vendor_icon){
        return [ 'id' =>$vendor_icon, 'url'=>FilesRepository::getFile($vendor_icon)];
    }

    public function getVendorBgAttribute($vendor_bg){
        return ['id'=>$vendor_bg, 'url'=>FilesRepository::getFile($vendor_bg)];
    }

}
