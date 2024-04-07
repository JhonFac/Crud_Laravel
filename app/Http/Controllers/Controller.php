<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="CRUD Laravel ",
 *     version="1.0.0",
 *     description="API para administrar multimples servicios y relaciones entre tablas",
 *     @OA\Contact(
 *         email="jhonfredyaya04@gmail.com"
 *     ),
 *     @OA\License(
 *         name="Repocitorio",
 *         url="https://github.com/JhonFac/Crud_Laravel.git"
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
