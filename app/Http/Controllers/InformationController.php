<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    const __PKG__ = 'admin.site.';
    const __CLAZZ__ = 'information';
    const __TABLE__ = 'informations';
    const err_insert_invalid = self::__CLAZZ__.'-E001';
    const err_insert_failure = self::__CLAZZ__.'-E002';
    const err_delete_failure = self::__CLAZZ__.'-E003';

    protected $clazz = self::__CLAZZ__;
    protected $table = self::__TABLE__;
    protected $list_view = self::__PKG__.self::__CLAZZ__.'.list';
    protected $detail_view = self::__PKG__.self::__CLAZZ__.'.detail';

    public function __construct()
    {
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $this->checkMenuAuth(null, true);

        parent::index($request);

        $item = null;
        $items_count = DB::table($this->table)->count();
        if (isset($items_count) && $items_count > 0)
        {
            $item = Information::find(1);
        }

        return view($this->detail_view)->with([
            'menus' => $this->getLeftMenu(),
            'items_count' => $items_count,
            'item' => $item
        ]);
    }

    //-------------------------------------------
    public function store(Request $request)
    {
        $this->beginTransaction();

        try
        {
            $id = $request['id'];
            if ( !empty($id) )
            {
                $item = Information::find($id);
                $item->id = $id;
            }
            else
            {
                $item = new Information();
            }

            $item->housing      = $request->housing;
            $item->construct    = $request->construct;
            $item->leisure      = $request->leisure;
            $item->civil        = $request->civil;
            $item->hf_age       = $request->hf_age;
            $item->hf_project   = $request->hf_project;
            $item->hf_amt       = $request->hf_amt;
            $item->hf_amt_en    = $request->hf_amt_en;
            $item->cf_age       = $request->cf_age;
            $item->cf_project   = $request->cf_project;
            $item->cf_amt       = $request->cf_amt;
            $item->cf_amt_en    = $request->cf_amt_en;
            $item->ce_age       = $request->ce_age;
            $item->ce_project   = $request->ce_project;
            $item->ce_amt       = $request->ce_amt;
            $item->ce_amt_en    = $request->ce_amt_en;
            $item->lb_age       = $request->lb_age;
            $item->lb_count     = $request->lb_count;
            $item->lb_amt       = $request->lb_amt;
            $item->lb_amt_en    = $request->lb_amt_en;
            $item->ent_age      = $request->ent_age;
            $item->ent_count    = $request->ent_count;
            $item->ent_amt      = $request->ent_amt;
            $item->ent_amt_en   = $request->ent_amt_en;
            $item->created_id   = $this->getUserId();
            $item->updated_id   = $this->getUserId();

            $this->logger_insert();

            //사용자 id 넣기 추가.
            $item->save();

            $this->commit();
        }
        catch(Exception $e)
        {
            return $this->handle_error(self::err_insert_failure, $e->getMessage());
        }
        finally
        {
            $this->endTransaction();
        }

        return $this->handle_ok("등록되었습니다.");
    }

}
