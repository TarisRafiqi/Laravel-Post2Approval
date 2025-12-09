<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
      'title', 
      'author', 
      'slug', 
      'body', 
      'uid_approve_1', 
      'status_1', 
      'uid_approve_2', 
      'status_2'];

   public function approver1()
   {
      return $this->belongsTo(User::class, 'uid_approve_1');
   }

   public function approver2()
   {
      return $this->belongsTo(User::class, 'uid_approve_2');
   }
}

?>