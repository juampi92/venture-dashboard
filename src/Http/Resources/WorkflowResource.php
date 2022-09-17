<?php

namespace Sassnowski\Venture\Dashboard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Sassnowski\Venture\Models\Workflow;

/**
 * @mixin Workflow
 */
class WorkflowResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            ...$this->resource->toArray(),
            'isFinished' => $this->isFinished(),
            'definition' => WorkflowDefinitionResource::make($this->resource->jobs),
            'relations' => WorkflowRelationsResource::make($this->resource->jobs),
            'status' => WorkflowStatusResource::make($this->resource->jobs),
        ];
    }
}
