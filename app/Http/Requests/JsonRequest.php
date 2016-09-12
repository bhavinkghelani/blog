<?php

namespace App\Http\Requests;


class JsonRequest extends Request
{
    public function response(array $errors)
    {
        return \Response::json(['success' => false, 'errors' => $errors]);
    }
}