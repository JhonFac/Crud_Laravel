<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;

/**
 * @OA\Tag(
 *     name="Usuarios",
 *     description="Operaciones relacionadas con usuarios"
 * )
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * 
     * @OA\Get(
     *     path="/api/users/page/{id}",
     *     summary="Obtiene todos los usuarios",
     *     tags={"Usuarios"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de usuarios")
     * )
     */
    public function index($page)
    {

        try {
            $perPage = 10;
            $offset = ($page - 1) * $perPage;
            $users = Users::offset($offset)
                ->limit($perPage)
                ->get();
            return response()->json($users, 200);
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
     *     path="/api/users",
     *     summary="Crea un nuevo usuario",
     *     tags={"Usuarios"}, 
     *     @OA\Schema(type="integer"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="image_path", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Usuario creado exitosamente")
     * )
     */
    public function store(Request $request)
    {
        $existingUser = Users::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json($existingUser, 200);
        }

        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image_path = $request->image_path;
        $user->save();

        return response()->json($user, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *    
     * @OA\Get(
     *     path="/api/users/{id}",
     *     summary="Obtiene el usuario por ID",
     *     tags={"Usuarios"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Numero de la pagina",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Listado de usuarios")
     * )      
     * 
     */
    public function show($id)
    {
        return Users::findOrFail($id);
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
     *     path="/api/users/{id}",
     *     summary="Actualiza un usuario existente",
     *     tags={"Usuarios"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del usuario a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="image_path", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Usuario actualizado exitosamente"),
     *     @OA\Response(response="404", description="Usuario no encontrado"),
     *     @OA\Response(response="422", description="Error de validación")
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Users::findOrFail($id);
            // Verificar si el correo electrónico está siendo modificado y si el nuevo correo existe
            if ($request->has('email') && $request->email !== $user->email && Users::where('email', $request->email)->exists()) {
                return response()->json(['error' => 'El correo electrónico ya está en uso por otro usuario'], 422);
            }

            if ($request->has('name')) {
                $user->name = $request->name;
            }
            if ($request->has('image_path')) {
                $user->image_path = $request->image_path;
            }
            $user->save();
            return response()->json($user, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Elimina un usuario existente",
     *     tags={"Usuarios"}, 
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del usuario a eliminar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Usuario eliminado exitosamente"),
     *     @OA\Response(response="404", description="Usuario no encontrado")
     * )
     */
    public function destroy($id)
    {
        $user = Users::destroy($id);
        return $user;
    }
}
