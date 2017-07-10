<?php
 
namespace Pratik\Slider\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'title'=>'required',
            'slide'=>'required',


        ];
    } 

     public function messages()
    {
        return [
            'title.required'=>'Enter Slider Title',
            'slide.required'=>'Please Select Image',


        ];
    }
}
