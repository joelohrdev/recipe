<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $title
 * @property-read string $description
 * @property-read int $servings
 * @property-read int $prep_time
 * @property-read int $cook_time
 * @property-read array<string> $tags
 * @property-read array<string> $ingredients
 * @property-read array<string> $instructions
 * @property-read CarbonInterface $created_at
 * @property-read CarbonInterface $updated_at
 */
final class Recipe extends Model
{
    /** @use HasFactory<RecipeFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'title' => 'string',
            'description' => 'string',
            'servings' => 'integer',
            'prep_time' => 'integer',
            'cook_time' => 'integer',
            'tags' => 'array',
            'ingredients' => 'array',
            'instructions' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
