<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property $id
 * @property $medicine_id
 * @property $date
 * @property $start
 * @property $end
 * @property $updated_at
 * @property $created_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{

  static $rules = [
    'medicine_id' => 'required',
    'date' => 'required',
    'start' => 'required',
    'end' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['medicine_id', 'date', 'start', 'end', 'count'];


  public function medicine()
  {
    return $this->belongsTo(Medicine::class)->select('id', 'name');
  }
}
