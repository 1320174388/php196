<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\data_address_province;
use App\Models\data_rest;

class ShopController extends Controller
{
    public function register(){

    	// 获取所有省份信息
    	$province = data_address_province::get(); 
		// 获取当前省的信息
    	$pro_addr = data_address_province::find(1); 
    	// 获取所有城市的信息
    	$city = $pro_addr->data_address_city()->get(); 
    	// 获取当前城市的信息
    	$city_addr = $pro_addr->data_address_city()->first();
		// 获取所有区县的信息
    	$town = $city_addr->data_address_town()->get(); 

    	return view('shop.register',['province'=>$province,'city'=>$city,'town'=>$town,'town'=>$town]);
    }

    public function doreg(Request $request){

        $this->validate($request,[
            'name' => 'required|max:20',
            'nameid' => 'required|max:4',
            'numberid' => 'required|min:18|max:18',
            'phone' => 'required|min:11|max:11',
            'introduce' => 'required',
        ],[
            'name.required' => '请输入店铺名称',
            'name.max' => '请输入一个正经店名!',
            'nameid.required' => '请输入真实姓名',
            'nameid.max' => '请输入真实姓名',
            'numberid.required' => '请输入合法身份证号',
            'numberid.min' => '请输入合法身份证号',
            'numberid.max' => '请输入合法身份证号',
            'phone.required' => '请输入正确手机号码',
            'phone.min' => '请输入正确手机号码',
            'phone.max' => '请输入正确手机号码',
            'introduce.required' => '请输入店铺详情',
        ]);

        $data = $request->except('_token');
        
        $rest = new data_rest;
        $rest->name = $data['name'];
        $rest->user_id = $data['user_id'];
        $rest->cityCode = $data['cityCode'];
        $rest->nameid = $data['nameid'];
        $rest->numberid = $data['numberid'];
        $rest->phone = $data['phone'];
        $rest->introduce = $data['introduce'];
        $res = $rest->save();

        if($res){
            return '等待审核';
        }

    }

    public function numberID(){

        //----------------------------------
        // 身份证实名认证 － 聚合数据
        // 在线接口文档：http://www.juhe.cn/docs/103
        //----------------------------------
         
        header('Content-type:text/html;charset=utf-8');

        //配置您申请的appkey
        $appkey = "idcard=420104198905015713&realname=%E7%8E%8B%E9%9D%9E%E5%90%9F";

        //************1.真实姓名和身份证号码判断是否一致************
        $url = "http://op.juhe.cn/idcard/query";
        $params = array(
              "idcard" => "3303291989********",//身份证号码
              "realname" => "东好帅",//真实姓名
              "key" => $appkey,//应用APPKEY(应用详细页查询)
        );
        $paramstring = http_build_query($params);
        $content = juhecurl($url,$paramstring);
        $result = json_decode($content,true);
        if($result){
            if($result['error_code']=='0'){
                if($result['result']['res'] == '1'){
                    echo "身份证号码和真实姓名一致";
                }else{
                    echo "身份证号码和真实姓名不一致";
                }
                #print_r($result);
            }else{
                echo $result['error_code'].":".$result['reason'];
            }
        }else{
            echo "请求失败";
        }
        //**************************************************

         
        /**
         * 请求接口返回内容
         * @param  string $url [请求的URL地址]
         * @param  string $params [请求的参数]
         * @param  int $ipost [是否采用POST形式]
         * @return  string
         */
        function juhecurl($url,$params=false,$ispost=0){
            $httpInfo = array();
            $ch = curl_init();
         
            curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
            curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
            curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
            curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            if( $ispost )
            {
                curl_setopt( $ch , CURLOPT_POST , true );
                curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
                curl_setopt( $ch , CURLOPT_URL , $url );
            }
            else
            {
                if($params){
                    curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
                }else{
                    curl_setopt( $ch , CURLOPT_URL , $url);
                }
            }
            $response = curl_exec( $ch );
            if ($response === FALSE) {
                //echo "cURL Error: " . curl_error($ch);
                return false;
            }
            $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
            $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
            curl_close( $ch );
            return $response;
        }
    }
}
