<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\FileController;

class FileControllerTest extends TestCase
{
    public function testUpload()
    {
       $picture = UploadedFile::fake()->image('farhan.jpg');

       $this->post('/file/upload', [
           'picture' => $picture
       ])->assertSeeText("OK farhan.jpg");
    }
}
