<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait SoftDeleteWithUser
{
    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootSoftDeleteWithUser()
    {
        static::deleting(function ($model) {
            if (!$model->isForceDeleting()) {
                $model->deleted_by = Auth::id();
                $model->save();
            }
        });
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function runSoftDelete()
    {
        $query = $this->setKeysForSaveQuery($this->newModelQuery());

        $time = $this->freshTimestamp();

        $columns = [$this->getDeletedAtColumn() => $this->fromDateTime($time)];
        
        // Tambahkan deleted_by
        $columns['deleted_by'] = Auth::id();

        $this->{$this->getDeletedAtColumn()} = $time;
        $this->deleted_by = Auth::id();

        if ($this->timestamps && ! is_null($this->getUpdatedAtColumn())) {
            $this->{$this->getUpdatedAtColumn()} = $time;
            $columns[$this->getUpdatedAtColumn()] = $this->fromDateTime($time);
        }

        $query->update($columns);

        $this->syncOriginalAttributes(array_keys($columns));
    }
}
