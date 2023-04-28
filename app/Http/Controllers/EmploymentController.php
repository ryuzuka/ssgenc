<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    const __PKG__ = 'main.';
    const __CLAZZ__ = 'information';

    protected $clazz = self::__CLAZZ__;
    protected $list_view = self::__PKG__.'ko.'.self::__CLAZZ__.'.if_05_04';
    protected $detail_view = self::__PKG__.'ko.'.self::__CLAZZ__.'.if_05_04_dt';

    public function __construct()
    {
    }

    //-------------------------------------------
    public function index(Request $request)
    {
        $items = $this->getItems();

        return view($this->list_view)->with([
            'items' => $items
        ]);
    }

    //-----------------------------------------
    public function getItems()
    {
        $user = env('ORACLE_USERNAME');
        $pwd = env('ORACLE_PASSWORD');
        $dsn = env('ORACLE_HOST').'/'.env('ORACLE_SID');

        $res = array();

        $conn = oci_connect($user, $pwd, $dsn, 'US7ASCII');
        if (!$conn)
        {
            $e = oci_error();
            return null;
        }

        $stid = oci_parse($conn, "select * from IF_DA0_RECUINFO");
        oci_execute($stid);

        while($items = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
        {
            $row = null;
            foreach($items as $key=>$val)
            {
                $row[$key] = iconv('euckr', 'utf8', $val);
            }

            array_push($res, $row);
        }

        oci_free_statement($stid);
        oci_close($conn);

        return json_encode($res);
    }

    // //-----------------------------------------
    // public function getItems_emul()
    // {
    //     $data =
    //     '[
    //         {"NOTINM": "(주)신세계건설 신입사원 모집1", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집2", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집3", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집4", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집5", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집6", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집7", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집8", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"},
    //         {"NOTINM": "(주)신세계건설 신입사원 모집9", "NOTISTDT": "20210927", "NOTICLDT": "20211231", "RECSTDT": "20210927", "RECCLDT": "21221231", "RECSTTM": "0900", "RECCLTM": "1800", "RECRTP": "신입", "NOTINO": "6459"}
    //     ]';

    //     return $this->handle_ok("OK", ["list"=>json_encode($data)]);
    // }
}
