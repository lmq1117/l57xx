<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @SWG\Swagger(
 *     @OA\Info(title="XX接口说明文档", version="0.1")
 * )
 */
class SwaggerController extends Controller
{
    /**
     * @OA\Post(
     *     path="/show",
     *     tags={"XXAPI"},
     *     summary="获取时间接口",
     *     description="获取时间接口1",
     *     operationId="TimeShow",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用户授权",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(name="user_id",in="query",description="用户ID",required=true,@OA\Schema(type="int")),
     *     @OA\Response(
     *         response=200,
     *         description="操作成功返回"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="发生错误"
     *     )
     * )
     */
    public function show()
    {
        echo date('Y-m-d H:i:s', time());
    }

    /**
     * @OA\Get(
     *     path="/hello",
     *     tags={"XXAPI"},
     *     summary="说你好接口",
     *     description="说你好接口1",
     *     operationId="SayHello",
     *     deprecated=false,
     *     @OA\Parameter(
     *         name="access_token",
     *         in="query",
     *         description="用户授权",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="操作成功返回"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="发生错误"
     *     )
     * )
     */
    public function hello()
    {
        echo "hello";
    }
}
