<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Song;
use Illuminate\Validation\Rule;

class EditSong extends FormRequest
{
    public function authorize()
{
    return true;
}

/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
public function rules()
{
    return [
        'title' => 'required|max:100',
        'artist' => 'required|max:100',
    ];
}

public function attributes()
{
    return [
        'title' => 'タイトル',
        'artist' => 'アーティスト名',
    ];
}

public function messages()
{
    return [
        'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
    ];
}


}
