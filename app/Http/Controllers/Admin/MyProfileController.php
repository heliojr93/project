<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    //以下を追加
    public function index(){
        return view('admin.home');
    }
    
    public function action_upload(){
        // このアップロードのカスタム設定
        $config = array(
        	'path' => DOCROOT.'files',
        	'randomize' => true,
        	'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );
        
        // $_FILES 内のアップロードされたファイルを処理する
        Upload::process($config);
        
        // 有効なファイルがある場合
        if (Upload::is_valid())
        {
        	// 設定にしたがって保存する
        	Upload::save();
        
        	// モデルを呼び出してデータベースを更新する
        	//Model_Uploads::add(Upload::get_files());
        }
        
        // エラーを処理する
        foreach (Upload::get_errors() as $file)
        {
        	// $file はファイル情報の配列
        	// $file['errors'] は発生したエラーの内容を含む配列で、
        	// 配列の要素は 'error' と 'message' を含む配列
        }
                
        return View::forge('admin.home');
    }
}
