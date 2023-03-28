<?php

namespace App\Http\Requests;

use App\Models\Album;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $albumId = $this->route()->album;

        if (!$albumId){
            return 1;
        }
        $album = Album::findOrFail($albumId);
        if(Gate::denies('manage-album', $album)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route()->album;
        $ret = [
            'album_name' => ['required'],
            'description' => 'required',
            // 'user_id' => 'required'
        ];

        if($id){
            $ret['album_name'][] = Rule::unique('albums')->ignore($id);

        }else{
            $ret['album_thumb'] = 'required|image';
            $ret['album_name'][] = Rule::unique('albums');
        }
        return $ret;
    }
}
