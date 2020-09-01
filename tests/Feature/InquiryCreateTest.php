<?php

namespace Tests\Feature;

use App\Inquiry;
use App\Mail\InquiryCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class InquiryCreateTest extends TestCase
{
    use DatabaseTransactions;

    public function testValidationFail() {
        $response = $this->postJson(route('inquiry.store'), ['name' => 'Sally', 'email' => '', 'phone' => '', 'message' => '']);

        $response
            ->assertStatus(422)
            ->assertJson([
                'errors' => true,
            ]);
    }

    public function testValidationPass() {
        $response = $this->postJson(route('inquiry.store'), ['name' => 'Sally', 'email' => 'sally@test.com', 'phone' => '5555555555', 'message' => 'test']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created_at' => true,
            ]);
    }

    public function testMailSent() {
        Mail::fake();

        $response = $this->postJson(route('inquiry.store'), ['name' => 'Sally', 'email' => 'sally@test.com', 'phone' => '5555555555', 'message' => 'test']);
        
        // Assert a specific type of mailable was dispatched meeting the given truth test...
        Mail::assertSent(InquiryCreated::class, function ($mail) use ($response) {
            $mail->build();
            return $mail->hasTo('devtest@worksite.ca');
        });
    }
}
