<?php

namespace App\Service;

use Exception;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
   public function store($data){
      try{ 
         DB::beginTransaction();  
         if(isset($data['tag_ids'])){
         $tagIds=$data['tag_ids'];
         unset($data['tag_ids']);
         }
          // dd($data);
         $data['preview_image']=Storage::disk('public')->put('/images', $data['preview_image']);
         $data['main_image']=Storage::disk('public')->put('/images', $data['main_image']);
         // dd($data);
         $post=Post::firstOrCreate($data);
         if(isset($data['tag_ids'])){
         $post->tags()->attach($tagIds);
         }
         DB::commit();
     } catch(Exception $exception) {
         DB::rollback();
         abort(500);
     }   
   }
   public function update($data,$post){
      try{
         DB::beginTransaction();
         if(isset($data['tag_ids'])){
            $tagIds=$data['tag_ids'];
            unset($data['tag_ids']);
         }
        // dd($data);
         if (isset($data['preview_image'])){
         $data['preview_image']=Storage::disk('public')->put('/images', $data['preview_image']);
         }
         if(isset($data['main_image'])){
         $data['main_image']=Storage::disk('public')->put('/images', $data['main_image']);
         }
         // dd($data);
         $post=Post::firstOrCreate($data);
         $post->update($data);
         if(isset($data['tag_ids'])){
         $post->tags()->sync($tagIds);
         }
         DB::commit();
      } catch (Exception $exception){
         DB::rollback();
         abort(500);
      }
      return $post;
   }
}
