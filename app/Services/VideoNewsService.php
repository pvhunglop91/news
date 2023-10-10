<?php

namespace App\Services;

use App\Repositories\VideoNewsRepository;
use App\Models\VideoNews;

class VideoNewsService
{
    protected $videoNewsRepository;

    public function __construct(VideoNewsRepository $videoNewsRepository)
    {
        $this->videoNewsRepository = $videoNewsRepository;
    }

    public function all()
    {
        return $this->videoNewsRepository->all();
    }

    public function findOrFail($id)
    {
        return $this->videoNewsRepository->findOrFail($id);
    }

    public function create($request)
    {
        return $this->videoNewsRepository->create($request->all());
    }

    public function update($request, $id)
    {
        return $this->videoNewsRepository->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->videoNewsRepository->delete($id);
    }
}
