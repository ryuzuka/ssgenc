<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    const E001  = -1;
    const E002  = -2;
    const E003  = -3;
    const E004  = -4;
    const E006  = -6;

    const MAX_SIZE = 50*1024*1024; //한개의 파일당 최대 50MB

    public static $valid_ext = array('png','jpeg','jpg','gif','bmp','tif','tiff','pdf','doc','docx','zip');
    public static $valid_type
                    = array(
                        'image/bmp',
                        'image/tif',
                        'image/tiff',
                        'image/gif',
                        'image/jpg',
                        'image/jpeg',
                        'image/png',
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/x-zip-compressed' //for test
                    );

    public function file_size($size)
    {
        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");

        if ($size == 0)
        {
            return('n/a');
        }
        else
        {
            return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }
    }

    //파일 토큰을 얻는다.
    public function getToken()
    {
        //토큰은 일자별로 생성하고, 당일내 동일한
        //파일에대한 생성은 하지 않음 => 무조건 당일내 생성하도록 수정.
        //YYYYMMDD 일자 리턴 됨.
        return date("Ymd");
    }

    //-----------------------------------------
    //파일 업로드 구조 변경으로 재 구현.
    //TODO : 파일업로드 해킹 방지 요건 => 파일 타입과 확장자 모두 체크
    //1) 1차로 nginx에서 설정한다.
    //2) 이 곳에서 둘다 체크한다.
    //3) 파일 크기 제한도 설정
    // 파일타입도 조작이 가능하니까, 주의할것.
    // 그리고 가급적 같은 서버가 아닌 파일 서버를 별도로 두는 것을 추천한다.
    // 검증로직은 가급적 서버에 두자 => 클라이언트는 기본적으로 브라우저 개발툴을 이용해 조작이 가능핟.
    // - 클라이언트엔 민감한 데이터를 절대 Plain하게 넣지 않는다.
    // - 데이터 유효성 검사가 필요한 경우 서버에서 처리하도록 한다.
    public function check_validate(Request $request)
    {
        $file_count = $request['file_count'];
        if( !isset($file_count) && $file_count==0)
        {
            return 0;
        }

        //확장자 검증
        for($i=0; $i<$file_count; $i++)
        {
            $ext = $request['file_ext'.$i];
            if( !in_array($ext, self::$valid_ext) )
            {
                return self::E002;
            }
        }

        //실제파일명에서 검사
        $files = $request->file();
        foreach($files as $file) {
          $name = $file->getClientOriginalName();
          if (preg_match("/[\/<>!@#$%^&*+~]/", $name)) return self::E006;

          $ext = $file->getClientOriginalExtension();
          if (!in_array($ext, self::$valid_ext)) {
            return self::E002;
          }
        }

        //파일타입 검증
        for($i=0; $i<$file_count; $i++)
        {
            $type = $request['file_type'.$i];
            if( !in_array($type, self::$valid_type) )
            {
                return self::E003;
            }
        }

        //파일size 검증
        for($i=0; $i<$file_count; $i++)
        {
            $size = $request['file_size'.$i];
            if( $size > self::MAX_SIZE )
            {
                return self::E004;
            }
        }

        return 0;
    }

    //-----------------------------------------
    //파일 업로드 구조 변경으로 재 구현.
    public function getErrMsg($code, Request $request)
    {
        $lang = $this->getLanguage();
        $message = ($lang=='ko')?'알 수 없는 오류':'unknown error.';

        $file_count = $request['file_count'];
        if( !isset($file_count) && $file_count==0)
        {
            return $message;
        }

      if (self::E006 == $code) {
        return ($lang == 'ko') ? '허용되지 않는 파일명 입니다.' : 'file name are not allowed.';
      }

        //확장자 검증
        if ($code == self::E002)
        {
            for($i=0; $i<$file_count; $i++)
            {
                $ext = $request['file_ext'.$i];
                if( !in_array($ext, self::$valid_ext) )
                {
                    return $ext.(($lang=='ko')?' 확장자는 허용되지 않습니다.':' file extentions are not allowed.');
                }
            }
        }
        //파일타입 검증
        else if ($code == self::E003)
        {
            for($i=0; $i<$file_count; $i++)
            {
                $type = $request['file_type'.$i];
                if( !in_array($type, self::$valid_type) )
                {
                    return $type.(($lang=='ko')?' 파일타입은 허용되지 않습니다.':' file types are not allowed.');
                }
            }
        }
        //파일size 검증
        else if ($code == self::E004)
        {
            for($i=0; $i<$file_count; $i++)
            {
                $size = $request['file_size'.$i];
                if( $size > self::MAX_SIZE )
                {
                    return (($lang=='ko')?
                    '최대 '.$this->file_size(self::MAX_SIZE).' 이상은 허용되지 않습니다.':
                    'A maximum of '.$this->file_size(self::MAX_SIZE).' or more is not allowed.'
                    );
                }
            }
        }

        return $message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = File::all();

        return view('files.index', [
            'files' => $files
        ]);
    }

    //-----------------------------------------
    public function update(Request $request)
    {
        $validate = $this->check_validate($request);
        if ($validate < 0)
        {
            return $validate;
        }

        //기본적으로 브라우저에서 먼저삭제를 하더라도
        //updateImpl에서 체크해서 update/insert가 선택 실행 됨.
        $file_id = $this->updateImpl($request);
        if ( !$file_id )
        {
            return 0;
        }

        return $file_id;
    }

    //-----------------------------------------
    //지정된 파일아이디의 모든 정보를 삭제하는 매소드
    public function delete($file_id)
    {
        $result = 0;

        if (isset($file_id))
        {
            $files = File::where('file_id', $file_id)->get();
            foreach($files as $f)
            {
                $this->removeFile($f->file_nm_uuid);
            }

            //삭제된 레코드 개수가 리턴된다.
            $result = File::where('file_id', $file_id)->delete();
        }

        return $result;
    }

    //-----------------------------------------
    //지정된 파일아이디의 모든 정보를 삭제하는 매소드
    //FIXME => 마지막 첨부파일이 삭제될 경우, attach_id 초기화하는 기능 오류
    public function deleteOne(Request $request)
    {
        $result = 0;

        $this->beginTransaction();

        $file_id = 0;
        $file_view_id = 0;

        try
        {
            $file_id = $request['file_id'];
            $file_view_id = $request['file_view_id'];
            if ( isset($file_id) )
            {
                $file = File::where(['file_id'=>$file_id, 'file_view_id'=>$file_view_id])->first();
                if(isset($file))
                {
                    File::where(['file_id'=>$file_id, 'file_view_id'=>$file_view_id])->delete();
                    $this->removeFile($file->file_nm_uuid);

                    $this->commit();
                }
            }
        }
        catch(Exception $e)
        {
            return $this->handle_error('file-E007', '삭제에 실패했습니다.');
        }
        finally
        {
            $this->endTransaction();

            //지우고 난 후, 재 확인
            $file = File::where('file_id', $file_id)->first();
            if (isset($file))
            {
                $file_id = $file->file_id;
            }
            else
            {
                $file_id = 0;
            }
        }

        //삭제가 정상적으로 처리되면, file_id를 리턴해야하고,
        //모두 삭제된 경우는 0을 리턴해야 함.
        return $this->handle_ok("삭제 되었습니다.", ['file_id'=>$file_id]);
    }

    //-----------------------------------------
    //지정된 파일을 폴더에서 제거하는 매소드
    public function removeFile($file_nm)
    {
        $path = storage_path('files');
        $dst_path = $path . '\\' . $file_nm;

        if (file_exists($dst_path))
        {
            unlink($dst_path);
        }
    }

    //-----------------------------------------
    // 첨부파일을 download로 복사하고,
    // 임시생성 파일토큰을 리턴한다.
    // (임시파일들은 daily 단위로 삭제된다.)
    // 섬네일 뷰 여부 정리.
    public function show($file_id)
    {
        if ( isset($file_id) )
        {
            $files = File::where('file_id', $file_id)->get();

            //파일토큰 생성.
            $file_token = $this->getToken().'-'.$file_id;

            foreach($files as $file)
            {
                $src_path = storage_path('files/'.$file->file_nm_uuid);
                $dst_path = public_path('download/'.$file_token.'_'.$file->file_nm);
                // if (file_exists($src_path) && !file_exists($dst_path))
                // if (file_exists($src_path))
                {
                    @copy($src_path, $dst_path);
                }
            }

            return ['file_token'=>$file_token, 'files'=>$files];
        }

        return null;
    }

    //-----------------------------------------
    function downloadList($file_id)
    {
        if ( isset($file_id) )
        {
            $files = File::where('file_id', $file_id)->get();

            //파일토큰 생성.
            $file_token = $this->getToken().'-'.$file_id;

            $items_file = array();

            foreach($files as $file)
            {
                $arrFile = array();

                $path = 'download/'.$file_token.'_'.$file->file_nm;

                $src_path = storage_path('files/'.$file->file_nm_uuid);
                $dst_path = public_path($path);

                if (!file_exists($src_path))
                {
                    continue;
                }

                //파일이 없을 경우만 생성 => 무조건 생성으로 변경.
                //if ( !file_exists($dst_path) )
                {
                    copy($src_path, $dst_path);
                }

                $arrFile['file_id'] = $file->file_id;
                $arrFile['file_seq'] = $file->file_seq;
                $arrFile['file_view_id'] = $file->file_view_id;
                $arrFile['file_token'] = $file_token;
                $arrFile['file_nm'] = $file->file_nm;
                $arrFile['file_text'] = $file->file_text;   //대체 텍스트
                $arrFile['file_path'] = $path;  //[주의] 파일 모델의 file_path가 아니다.

                array_push($items_file, $arrFile);
            }

            return $items_file;
        }

        return null;
    }

    //-----------------------------------------
    public function insert(Request $request)
    {
        $validate = $this->check_validate($request);
        if ($validate < 0)
        {
            return $validate;
        }

        $file_id = 0;

        try
        {
            $file_id = File::max('file_id');
            if ( !isset($file_id) )
            {
                $file_id = 1;
            }
            else
            {
                $file_id++;
            }

            if( $request->file() )
            {
                $i = 0;
                foreach($request->file() as $f)
                {
                    $name = time().rand(1, 100).'_'.$i.'.'.$request['file_ext'.$i];
                    $f->move(storage_path('files'), $name);

                    $file = new File();
                    $file->file_id = $file_id;
                    $file->file_seq = $i+1;
                    $file->file_nm = $request['file_nm'.$i];
                    $file->file_ext = $request['file_ext'.$i];
                    $file->file_nm_uuid = $name;
                    $file->file_size = $request['file_size'.$i];
                    $file->file_view_id = $request['file_view_id'.$i];
                    $file->file_text = (!is_null($request['file_text'.$i]))?$request['file_text'.$i]:'';
                    $file->useflag = 'Y';
                    $file->save();
                    $i++;
                }
            }
            else
            {
                $file_id = 0;
            }
        }
        catch(Exception $e)
        {
            Log::debug($e->getMessage());
        }

        return $file_id;
    }

    //-----------------------------------------
    public function updateImpl(Request $request)
    {
        $file_id = null;

        try
        {
            $file_id = $request['file_id'];
            if ( isset($file_id) && $file_id > 0 )
            {
                if( $request->file() )
                {
                    $i = 0;
                    foreach($request->file() as $f)
                    {
                        $name = time().rand(1, 100).'_'.$i.'.'.$request['file_ext'.$i];

                        $file_view_id = $request['file_view_id'.$i];
                        $file = File::where(['file_id'=>$file_id, 'file_view_id'=>$file_view_id])->first();
                        if( isset($file) )
                        {
                            //기존 파일을 삭제해야 한다.
                            $this->removeFile($file->file_nm_uuid);

                            File::where(['file_id'=>$file_id, 'file_view_id'=>$file_view_id])
                                ->update([
                                    'file_nm_uuid' => $name,
                                    'file_nm' => $request['file_nm'.$i],
                                    'file_size' => $request['file_size'.$i],
                                    'file_ext' => $request['file_ext'.$i],
                                    'file_text' => (!is_null($request['file_text'.$i]))?$request['file_text'.$i]:''
                                ]);
                        }
                        else
                        {
                            $file = new File();
                            $file->file_id = $file_id;

                            //업데이트 이므로 맨 마지막에 넣어야 한다.
                            $item_seq = File::select(DB::raw('max(file_seq) as file_seq'))
                                        ->where('file_id', $file_id)->first();
                            $file->file_seq = $item_seq->file_seq+1;
                            $file->file_view_id = $request['file_view_id'.$i];
                            $file->useflag = 'Y';
                            $file->file_nm = $request['file_nm'.$i];
                            $file->file_ext = $request['file_ext'.$i];
                            $file->file_nm_uuid = $name;
                            $file->file_size = $request['file_size'.$i];
                            $file->file_text = (!is_null($request['file_text'.$i]))?$request['file_text'.$i]:'';
                            $file->save();
                        }

                        $f->move(storage_path('files'), $name);
                        $i++;
                    }
                }
                else
                {
                    //대체텍스트만 변경되는 경우 처리
                    //이 경우는 이미지 정보와 같이 와야하기 때문에, 처리할 방법이 없다.
                }
            }
            else
            {
                $file_id = $this->insert($request);
            }
        }
        catch(Exception $e)
        {
        }
        finally
        {
        }

        return $file_id;
    }

    //-----------------------------------------
    function uploadZip(Request $request)
    {
        if( $request->file() )
        {
            $i = 0;
            foreach($request->file() as $f)
            {
                $name = $request['file_nm'.$i];
                $f->move(storage_path('files'), $name);

                $i++;
            }
        }

        return $this->handle_ok("배포파일을 업로드했습니다.");
    }

    /**
     * Download file from given URL.
     */
    public function download(string $url)
    {
        $info = pathinfo($url);
        $filename = $info['basename'];
        $this->createTemporaryFile($filename);
        $this->client->get($url, ['sink' => $this->getTemporaryFileLocation($filename)]);

        return $this->getTemporaryFileLocation($filename);
    }

    //-----------------------------------------
    function downloadFile(Request $request)
    {
        $file_name = $request->file_nm;
        return response()->download(storage_path('files/'.$file_name))->header('Content-Type', 'image/gif');
    }
}
