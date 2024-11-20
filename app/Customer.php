<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
     /**
     * Get the parent node.
     */
    public function parent()
    {
        return $this->belongsTo(Customer::class, 'ref_id');
    }

    /**
     * Get the children nodes.
     */
    public function children()
    {
        return $this->hasMany(Customer::class, 'ref_id');
    }

    /**
     * Recursively find the root node.
     */
    public function getRoot()
    {
        if (!$this->parent) {
            return $this;
        }
        return $this->parent->getRoot();
    }

    public function getLevel()
    {
        $level = 0;
        $parent = $this;

        while ($parent->parent) {
            $parent = $parent->parent;
            $level++;
        }
        
        return $level;
    }

    public function getParentLevel()
    {
        if (!$this->parent) {
            return 0;
        } else {
            return $this->parent->getParentLevel() + 1;
        }
    }

    public function getDescendantIds()
    {
        $descendants = collect();

        foreach ($this->children as $child) {
            $descendants = $descendants->merge($child->getDescendantIds());
        }

        return $descendants->push($this->id);
    }

}
