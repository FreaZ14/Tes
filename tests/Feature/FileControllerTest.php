<?php

namespace Tests\Feature;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Testing\FileFactory;
use Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\File\UploadedFile as FjpUploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    public function testUpload(): void
    {
        $picture = UploadedFile::fake()->image(name : 'test.jpg', width: 100, height: 100);

        $this->post(uri: '/file/upload', data: [
            'picture' => $picture

        ])->assertSeeText(value: "OKtest.jpg");
    }
}
