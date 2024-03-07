<?php

namespace App\Core\Controller;

use App\Core\Repository\RepositoryInterface;

class SearchController extends Controller
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        try {
            $data = $this->repository->all();
            return response()->json(
                ['data' => $data]
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()]
            );
        }
    }

    public function findById(string $id)
    {
        try {
            $item = $this->repository->findById($id);
            return response()->json(
                ['item' => $item]
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['error' => $th->getMessage()]
            );
        }
    }
}
