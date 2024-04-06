<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Users;

use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Company",
 *     description="Operaciones relacionadas con Company"
 * )
 */
class CompanyController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         try {
//             $challenges = Company::with('user')->get();
//             return response()->json($challenges, 200);
//         } catch (\Exception $e) {
//             return response()->json(['error' => 'Error al obtener los desafíos: ' . $e->getMessage()], 500);
//         }
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }

{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @OA\Get(
     *     path="/api/company/page/{id}",
     *     summary="Obtiene todos los companies",
     *     tags={"Company"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de companies")
     * )
     */
    public function index($page)
    {
        try {
            $perPage = 10;
            $offset = ($page - 1) * $perPage;
            $company = Company::offset($offset)
                ->limit($perPage)
                ->get();
            return response()->json($company, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los desafíos: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @OA\Post(
     *     path="/api/company",
     *     summary="Crea un nuevo company",
     *     tags={"Company"}, 
     *     @OA\Schema(type="integer"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="location", type="string"),
     *             @OA\Property(property="image_path", type="string"),
     *             @OA\Property(property="industry", type="string"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="company creado exitosamente")
     * )
     */
    public function store(Request $request)
    {
        $userId = $request->user_id; 
        $existingUser = Users::find($userId);
        if (!$existingUser) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $company = new Company();
        $company->name = $request->name;
        $company->location = $request->location;
        $company->industry = $request->industry;
        $company->image_path = $request->image_path;
        $company->user_id = $request->user_id;
        $company->save();

        return response()->json($company, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *    
     * @OA\Get(
     *     path="/api/company/{id}",
     *     summary="Obtiene el company por ID",
     *     tags={"Company"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de companies")
     * )      
     * 
     */
    public function show($id)
    {
        return Company::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     * @OA\Put(
     *     path="/api/company/{id}",
     *     summary="Actualiza un company existente",
     *     tags={"Company"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del company a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="location", type="string"),
     *             @OA\Property(property="image_path", type="string"),
     *             @OA\Property(property="industry", type="string"),
     *             @OA\Property(property="user_id", type="int"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="company actualizado exitosamente"),
     *     @OA\Response(response="404", description="company no encontrado"),
     *     @OA\Response(response="422", description="Error de validación")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $company = Company::findOrFail($id);

            if ($request->has('user_id')) {
                $userId = $request->user_id; 
                $existingUser = Users::find($userId);
                if (!$existingUser) {
                    return response()->json(['error' => 'company no encontrado'], 404);
                }
                $company->user_id = $userId;
            }
            if ($request->has('name')) {
                $company->name = $request->name;
            }
            if ($request->has('image_path')) {
                $company->image_path = $request->image_path;
            }
            if ($request->has('industry')) {
                $company->industry = $request->industry;
            }
            if ($request->has('location')) {
                $company->location = $request->location;
            }

            $company->save();
            return response()->json($company, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'challenge no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el challenge'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *     path="/api/company/{id}",
     *     summary="Elimina un company existente",
     *     tags={"Company"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del company a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="company eliminado exitosamente"),
     *     @OA\Response(response="404", description="company no encontrado")
     * )
     */
    public function destroy($id)
    {
        $user = Company::destroy($id);
        return $user;
    }
}
