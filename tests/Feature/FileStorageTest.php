<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
       $filesystem = Storage::disk("local");

       $filesystem->put("file.txt", "Farhan Assyauqi");

       $content = $filesystem->get("file.txt");

       self::assertEquals("Farhan Assyauqi", $content);
    }
}
