<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class CommentsFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/comments';
  protected $postData = [
      "comment" => 'Comment 1',
  ];

  protected $putDataInvalid = [
    "scope" => 'comment',
    "comment" => 1231231,
  ];

  protected $putDataValid = [
    "comment" => '[UPDATED] Comment 1',
  ];

  use ResourceFeatureTestCase;
}
