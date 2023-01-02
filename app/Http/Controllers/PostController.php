<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;

/**
 * @OA\Tag(
 *     name="Posts",
 *     description="POST API"
 * )
 */
/**
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="authentication",
 * )
 */

class PostController extends Controller
{
    public function __construct(private PostService $service)
    {
    }

    /**
     * @OA\Get(
     *  path="/api/posts",
     *  tags={"Posts"},
     *  security={{ "authentication": {} }},
     *  summary="Function to list all posts",
     *  @OA\Response(
     *         response="200",
     *         description="Service to show all posts data",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={{
     *                         "id": "74c6da7c-eeb6-491a-86e2-b54fe0f7472f",
     *                         "title": "post de prueba actualizado 1",
     *                         "description": "descripcion de prueba actualizada",
     *                         "created_at": "2022-08-09 15:47:45",
     *                         "updated_at": "2022-08-09 15:52:59"
     *                     }}
     *                 )
     *             )
     *         }
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        return $this->service->get();
    }

    /**
     * @OA\Post(
     *  path="/api/posts",
     *  tags={"Posts"},
     *  summary="Function to create a new post",
     *  security={{ "authentication": {} }},
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="title",
     *                  description="Post title",
     *                  example="Swagger post title",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  description="Post description",
     *                  example="Swagger post description",
     *                  type="string"
     *              )
     *          )
     *      )
     *  ),
     *  @OA\Response(
     *      response="201",
     *      description="Post created",
     *  ),
     *  @OA\Response(
     *      description="Service create a new post",
     *      response="200",
     *      content={
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  example={
     *                      "id": "74c6da7c-eeb6-491a-86e2-b54fe0f7472f",
     *                      "title": "post de prueba actualizado 1",
     *                      "description": "descripcion de prueba actualizada",
     *                      "created_at": "2022-08-09 15:47:45",
     *                      "updated_at": "2022-08-09 15:52:59"
     *                  }
     *              )
     *          )
     *   }
     *  ),
     *  @OA\Response(
     *      response="default",
     *      description="Ha ocurrido un error."
     *  )
     * )
     */
    public function store(PostRequest $request)
    {
        return $this->service->store($request);
    }

    /**
     * @OA\Get(
     *  path="/api/posts/{id}",
     *  tags={"Posts"},
     *  security={{ "authentication": {} }},
     *  summary="Function to find a post by id",
     *  @OA\Parameter(
     *       name="id",
     *       description="id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="string",
     *           example="74c6da7c-eeb6-491a-86e2-b54fe0f7472f"
     *       )
     *  ),
     *  @OA\Response(
     *      description="Service to find post data",
     *      response="200",
     *      content={
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  example={
     *                      "id": "74c6da7c-eeb6-491a-86e2-b54fe0f7472f",
     *                      "title": "post de prueba actualizado 1",
     *                      "description": "descripcion de prueba actualizada",
     *                      "created_at": "2022-08-09 15:47:45",
     *                      "updated_at": "2022-08-09 15:52:59"
     *                  }
     *              )
     *          )
     *   }
     *  ),
     *  @OA\Response(
     *      response="default",
     *      description="Ha ocurrido un error."
     *  )
     * )
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * @OA\Put(
     *  path="/api/posts/{id}",
     *  tags={"Posts"},
     *  security={{ "authentication": {} }},
     *  summary="Function to update a post",
     *  @OA\Parameter(
     *       name="id",
     *       description="id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="string",
     *           example="74c6da7c-eeb6-491a-86e2-b54fe0f7472f"
     *       )
     *  ),
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="title",
     *                  description="Post title",
     *                  example="Swagger post title",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  description="Post description",
     *                  example="Swagger post description",
     *                  type="string"
     *              )
     *          )
     *      )
     *  ),
     *  @OA\Response(
     *      description="Service create a new post",
     *      response="200",
     *      content={
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  example={
     *                      "id": "74c6da7c-eeb6-491a-86e2-b54fe0f7472f",
     *                      "title": "post de prueba actualizado 1",
     *                      "description": "descripcion de prueba actualizada",
     *                      "created_at": "2022-08-09 15:47:45",
     *                      "updated_at": "2022-08-09 15:52:59"
     *                  }
     *              )
     *          )
     *   }
     *  ),
     *  @OA\Response(
     *      response="default",
     *      description="Ha ocurrido un error."
     *  )
     * )
     */
    public function update($id, PostRequest $request)
    {
        return $this->service->update($id, $request);
    }

    /**
     * @OA\Delete(
     *  path="/api/posts/{id}",
     *  tags={"Posts"},
     *  security={{ "authentication": {} }},
     *  summary="Function to find a post by id",
     *  @OA\Parameter(
     *       name="id",
     *       description="id",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="string",
     *           example="74c6da7c-eeb6-491a-86e2-b54fe0f7472f"
     *       )
     *  ),
     *  @OA\Response(
     *      response="200",
     *      description="Post eliminated",
     *  ),
     *  @OA\Response(
     *      response="default",
     *      description="Ha ocurrido un error."
     *  )
     * )
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
