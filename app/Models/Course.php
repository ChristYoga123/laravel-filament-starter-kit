<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use InteractsWithMedia;
    
    protected $guarded = ['id'];

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function mentors()
    {
        return $this->belongsToMany(User::class, 'course_mentors', 'course_id', 'mentor_id')->withPivot('id');
    }

    public function courseChapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'course_technologies', 'course_id', 'technology_id')->withPivot('id');
    }

    public function courseKeyPoints()
    {
        return $this->hasMany(CourseKeypoint::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('course-thumbnail')
            ->singleFile();
    }
}
