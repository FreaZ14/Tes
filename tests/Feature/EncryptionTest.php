<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt; 
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    public function testEncryption(): void
    {
       $encrypt = Crypt::encrypt(value: 'Farhan Assyauqi');
       var_dump(value: $encrypt);

       $decrypt = Crypt::decrypt(payload: $encrypt);

       self::assertEquals('Farhan Assyauqi', actual: $decrypt);
    }
}
