<?php

namespace Tests\Feature;
 use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersApiTest extends TestCase
{
    
    public function it_returns_users_data_from_all_providers()
    {
        // Create some test JSON files for data providers
        $dataProviderX = json_encode(['parentAmount' => 200, 'Currency' => 'USD']);
        $dataProviderY = json_encode(['balance' => 300, 'currency' => 'AED']);

        file_put_contents(public_path('files/DataProviderX.json'), $dataProviderX);
        file_put_contents(public_path('files/DataProviderY.json'), $dataProviderY);

        $response = $this->getJson('/api/v1/users');

        // Assert the response status
        $response->assertOk();

        $response->assertJsonStructure([
            '*' => [
                'parentAmount',
                'Currency',
                'balance',
                'currency',
            ],
        ]);

        // Clean up test files
        unlink(public_path('files/DataProviderX.json'));
        unlink(public_path('files/DataProviderY.json'));
    }


    
}
