<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlatformSettingsRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'type' => ['required', 'string'],
        ];
        if ($this->input('type') === 'trello') {
            $rules['apiKey'] = ['required', 'string'];
            $rules['apiToken'] = ['required', 'string'];
            $rules['boardToken'] = ['required', 'string'];
        }

        return $rules;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'type.required' => 'The platform type is required.',
            'type.string' => 'The platform type must be a string.',

            'apiKey.required' => 'The API key is required for Trello platform.',
            'apiKey.string' => 'The API key must be a string for Trello platform.',

            'apiToken.required' => 'The API token is required for Trello platform.',
            'apiToken.string' => 'The API token must be a string for Trello platform.',

            'boardToken.required' => 'The board token is required for Trello platform.',
            'boardToken.string' => 'The board token must be a string for Trello platform.',
        ];
    }
}
